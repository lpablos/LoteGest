<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compra;
use App\Models\User;
use App\Models\Pago;
use Barryvdh\DomPDF\Facade\Pdf;
use setasign\Fpdi\Fpdi;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PagoController extends Controller
{
    //
    public function index($solicitud)
    {
        
        $compra = Compra::where('num_solicitud_sistema', $solicitud)->firstOrFail() ;  
        $contrato = $compra->contrato()->first(); 
        $cliente = $compra->cliente()->first();     
        $pagos = $compra->pagos()->orderBy('fecha_pago', 'desc')->get();
        $numPagos = count($pagos);
        $totalPagos = $pagos->sum('monto');
        $saldoActual = $compra->total_venta - $totalPagos;
        return view('pages.pagos.index', compact('compra', 'contrato', 'cliente', 'pagos', 'numPagos', 'totalPagos', 'saldoActual'));
    }

    public function create($solicitud)
    {

        $compra = Compra::where('num_solicitud_sistema', $solicitud)->firstOrFail();
        $usuarios = User::all();
        // dd($usuarios);
        $contrato = $compra->contrato()->first(); 
        $cliente = $compra->cliente()->first();     
        return view('pages.pagos.add', compact('compra', 'contrato', 'cliente', 'usuarios'));
    }



    public function store(Request $request, $solicitud)
    {
        try {
            // Conecta la lap pporfa
            //si yaaaaa byeeeeee
            // sale bsitos 

            $request->validate([
                'fecha_pago' => 'required|date',
                'concepto' => 'required',
                'metodo_pago' => 'required',
                'monto' => 'required|numeric|min:1',
                'documentos.*' => 'file|mimes:jpg,jpeg,png,webp,pdf|max:20480'
            ]);

            $compra = Compra::where('num_solicitud_sistema', $solicitud)->firstOrFail();

            // =============================
            // OBTENER ÚLTIMO PAGO
            // =============================

            $ultimoPago = $compra->pagos()->orderBy('id','desc')->first();

            $saldoActual = $ultimoPago ? $ultimoPago->saldo_despues : $compra->total_venta;

            // =============================
            // VALIDAR MONTO
            // =============================

            if ($request->monto > $saldoActual) {

                return redirect()
                    ->route('pagos.index', ['solicitud' => $solicitud])
                    ->with('error', 'El monto excede el saldo pendiente.');
            }

            // =============================
            // CALCULAR SALDO
            // =============================

            $saldoDespues = $saldoActual - $request->monto;

            // =============================
            // GENERAR FOLIO
            // =============================

            $ultimoFolio = Pago::max('id') + 1;
            $folioRecibo = 'REC-' . str_pad($ultimoFolio, 6, '0', STR_PAD_LEFT);

            // =============================
            // CREAR PAGO
            // =============================

            $pago = $compra->pagos()->create([
                'fecha_pago' => $request->fecha_pago,
                'concepto' => $request->concepto,
                'metodo_pago' => $request->metodo_pago,
                'monto' => $request->monto,
                'saldo_despues' => $saldoDespues,
                'compra_id' => $compra->id,
                'folio_recibo' => $folioRecibo,
                'referencia' => $request->referencia,
                'observaciones' => $request->observaciones,
                'recibido_por' => auth()->id(),
            ]);

            // =============================
            // SUBIR DOCUMENTOS
            // =============================
                // dd($request->all());
            if ($request->hasFile('documentos')) {
                
                $archivos = $request->file('documentos');

                $imagenes = [];
                $pdfs = [];

                foreach ($archivos as $archivo) {

                    if (strtolower($archivo->getClientOriginalExtension()) === 'pdf') {
                        $pdfs[] = $archivo;
                    } else {
                        $imagenes[] = $archivo;
                    }
                }

                $nombreFinal = 'pago_' . $pago->id . '.pdf';
                
                $carpeta = 'public/comprobantes_pagos/';
                $rutaStorage = $carpeta . $nombreFinal;
                $rutaFinal = storage_path('app/' . $rutaStorage);

                if (!Storage::exists($carpeta)) {
                    Storage::makeDirectory($carpeta);
                }

                // SOLO IMAGENES
                if (count($imagenes) > 0 && count($pdfs) == 0) {

                    $html = '<html><body style="margin:0;padding:0;">';

                    foreach ($imagenes as $img) {

                        $base64 = base64_encode(file_get_contents($img->getRealPath()));

                        $html .= '
                        <div style="page-break-after: always;">
                            <img src="data:image/jpeg;base64,' . $base64 . '" style="width:100%;">
                        </div>';
                    }

                    $html .= '</body></html>';

                    $pdf = Pdf::loadHTML($html)->setPaper('a4', 'portrait');

                    Storage::put($rutaStorage, $pdf->output());
                }

                // SOLO PDF
                elseif (count($pdfs) > 0 && count($imagenes) == 0) {

                    $fpdi = new \setasign\Fpdi\Fpdi();

                    foreach ($pdfs as $archivo) {

                        $pageCount = $fpdi->setSourceFile($archivo->getRealPath());

                        for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {

                            $template = $fpdi->importPage($pageNo);
                            $size = $fpdi->getTemplateSize($template);

                            $fpdi->AddPage($size['orientation'], [$size['width'], $size['height']]);
                            $fpdi->useTemplate($template);
                        }
                    }

                    $fpdi->Output($rutaFinal, 'F');
                }

                // GUARDAR RUTA
                $pago->comprobante_url = 'comprobantes_pagos/' . $nombreFinal;
                $pago->save();
            }

            return redirect()
                ->route('pagos.show', ['solicitud' => $solicitud, 'pago' => $pago->id])
                ->with('success', 'Pago registrado exitosamente.');

        } catch (\Throwable $th) {

            return redirect()
                ->route('pagos.index', ['solicitud' => $solicitud])
                ->with('error', 'Error al registrar el pago.');
        }
    }

    public function show($solicitud, $pagoId)
    {
        $compra = Compra::where('num_solicitud_sistema', $solicitud)->firstOrFail();
        $pago = Pago::findOrFail($pagoId);
        $contrato = $compra->contrato()->first(); 
        $cliente = $compra->cliente()->first();     
        $usuarios = User::all();
        return view('pages.pagos.edit', compact('compra', 'contrato', 'cliente', 'pago', 'usuarios'));
    }

    public function update(Request $request, $solicitud, $pagoId)
    {
        try {

            $request->validate([
                'fecha_pago' => 'required|date',
                'concepto' => 'required',
                'metodo_pago' => 'required',
                'monto' => 'required|numeric|min:1',
                'documentos.*' => 'file|mimes:jpg,jpeg,png,webp,pdf|max:20480'
            ]);

            $compra = Compra::where('num_solicitud_sistema', $solicitud)->firstOrFail();
            $pago = Pago::findOrFail($pagoId);

            // =============================
            // ACTUALIZAR DATOS
            // =============================

            $pago->update([
                'fecha_pago' => $request->fecha_pago,
                'concepto' => $request->concepto,
                'metodo_pago' => $request->metodo_pago,
                'monto' => $request->monto,
                'referencia' => $request->referencia,
                'observaciones' => $request->observaciones,
                'recibido_por' => auth()->id(),
            ]);
            
            // =============================
            // SI SUBE NUEVOS DOCUMENTOS
            // =============================

            if ($request->hasFile('documentos')) {

                // eliminar archivo anterior

                if ($pago->comprobante_url) {

                    $rutaAnterior = 'public/' . $pago->comprobante_url;

                    if (Storage::exists($rutaAnterior)) {
                        Storage::delete($rutaAnterior);
                    }
                }

                $archivos = $request->file('documentos');
                
                $imagenes = [];
                $pdfs = [];

                foreach ($archivos as $archivo) {

                    if (strtolower($archivo->getClientOriginalExtension()) === 'pdf') {
                        $pdfs[] = $archivo;
                    } else {
                        $imagenes[] = $archivo;
                    }
                }
                
                $nombreFinal = 'pago_' . $pago->id . '.pdf';

                $carpeta = 'public/comprobantes_pagos/';
                $rutaStorage = $carpeta . $nombreFinal;
                $rutaFinal = storage_path('app/' . $rutaStorage);
                
                if (!Storage::exists($carpeta)) {
                    Storage::makeDirectory($carpeta);
                }

                // =============================
                // SOLO IMAGENES *****
                // =============================

                if (count($imagenes) > 0 && count($pdfs) == 0) {

                    $html = '<html><body style="margin:0;padding:0;">';

                    foreach ($imagenes as $img) {

                        $base64 = base64_encode(file_get_contents($img->getRealPath()));

                        $html .= '
                        <div style="page-break-after: always;">
                            <img src="data:image/jpeg;base64,' . $base64 . '" style="width:100%;">
                        </div>';
                    }

                    $html .= '</body></html>';

                    $pdf = Pdf::loadHTML($html)->setPaper('a4', 'portrait');

                    Storage::put($rutaStorage, $pdf->output());
                }

                // =============================
                // SOLO PDF
                // =============================

                elseif (count($pdfs) > 0 && count($imagenes) == 0) {

                    $fpdi = new \setasign\Fpdi\Fpdi();

                    foreach ($pdfs as $archivo) {

                        $pageCount = $fpdi->setSourceFile($archivo->getRealPath());

                        for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {

                            $template = $fpdi->importPage($pageNo);
                            $size = $fpdi->getTemplateSize($template);

                            $fpdi->AddPage($size['orientation'], [$size['width'], $size['height']]);
                            $fpdi->useTemplate($template);
                        }
                    }

                    $fpdi->Output($rutaFinal, 'F');
                }

                // =============================
                // GUARDAR RUTA
                // =============================

                $pago->comprobante_url = 'comprobantes_pagos/' . $nombreFinal;
                $pago->save();
            }

            return redirect()
                ->route('pagos.show', ['solicitud' => $solicitud, 'pago' => $pago->id])
                ->with('success', 'Pago actualizado exitosamente.');

        } catch (\Throwable $th) {

            return redirect()
                ->route('pagos.show', ['solicitud' => $solicitud, 'pago' => $pagoId])
                ->with('error', 'Error al actualizar el pago.');
        }
    }
}
