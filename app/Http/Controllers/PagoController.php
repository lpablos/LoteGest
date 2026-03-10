<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compra;
use App\Models\User;
use App\Models\Pago;

class PagoController extends Controller
{
    //
    public function index($solicitud)
    {
        
        $compra = Compra::where('num_solicitud_sistema', $solicitud)->firstOrFail() ;  
        $contrato = $compra->contrato()->first(); 
        $cliente = $compra->cliente()->first();     
        $pagos = $compra->pagos()->orderBy('fecha_pago', 'desc')->get();
        return view('pages.pagos.index', compact('compra', 'contrato', 'cliente', 'pagos'));
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
            
            $request->validate([
                'fecha_pago' => 'required|date',
                'concepto' => 'required',
                'metodo_pago' => 'required',
                'monto' => 'required|numeric|min:1',
            ]);

            $compra = Compra::where('num_solicitud_sistema', $solicitud)->firstOrFail();

            // =============================
            // OBTENER ÚLTIMO PAGO
            // =============================

            $ultimoPago = $compra->pagos()->orderBy('id','desc')->first();
            
            if ($ultimoPago) {
                $saldoActual = $ultimoPago->saldo_despues;
            } else {
                
                $saldoActual = $compra->total_venta;
            }

            
            // =============================
            // VALIDAR QUE NO EXCEDA EL SALDO
            // =============================
            
            if ($request->monto > $saldoActual) {

                return redirect()
                    ->route('pagos.index', ['solicitud' => $solicitud])
                    ->with('error', 'El monto excede el saldo pendiente.');
            }

            // =============================
            // CALCULAR SALDO DESPUES
            // =============================

            $saldoDespues = $saldoActual - $request->monto;
            
            // =============================
            // CALCULAR FOLIO DE RECIBO
            // =============================

            $ultimoFolio = Pago::max('id') + 1;
            
            $folioRecibo = 'REC-' . str_pad($ultimoFolio, 6, '0', STR_PAD_LEFT);
            
            // =============================
            // REGISTRAR PAGO
            // =============================
            // dd($saldoDespues, $folioRecibo);
            $pagoasc = $compra->pagos()->create([
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
            
            return redirect()
                ->route('pagos.show', ['solicitud' => $solicitud, 'pago' => $pagoasc->id])
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
            ]);

            $compra = Compra::where('num_solicitud_sistema', $solicitud)->firstOrFail();
            $pago = Pago::findOrFail($pagoId);
            
            // Actualizar campos editables
            $pago->update([
                'fecha_pago' => $request->fecha_pago,
                'concepto' => $request->concepto,
                'metodo_pago' => $request->metodo_pago,
                'monto' => $request->monto,
                'referencia' => $request->referencia,
                'observaciones' => $request->observaciones,
                'recibido_por' => auth()->id(),
            ]);

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
