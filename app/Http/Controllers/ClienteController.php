<?php

namespace App\Http\Controllers;

use DB, Session;
use App\Models\User;
use App\Models\Compra;
use App\Models\Cliente;
use App\Helpers\Helper;
use App\Models\CatMunicipio;
use Illuminate\Http\Request;
use App\Models\Fraccionamiento;
use App\Models\CatEntidadFederativa;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;
use setasign\Fpdi\Fpdi;


class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Cliente::select('id','no_cliente', 'nombre', 'primer_apellido', 'segundo_apellido', 'created_at')->get();

        return view('pages.cliente.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (view()->exists('pages.cliente.add')) {

            $corredores = User::select('id', DB::raw('CONCAT(nombre, " ", primer_apellido) AS full_name'))->where('role_id', 4)->get();
            $estados = CatEntidadFederativa::select('id', 'nom_estado')->get();
            $mpios = CatMunicipio::select('id', 'nom_mpio')->get();
            $fraccionamientos = Fraccionamiento::select('id', 'nombre')->get();

            return view('pages.cliente.add', compact('corredores', 'estados', 'mpios', 'fraccionamientos'));
        }
        return abort(404);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    
        $input = $request->all();

        $rules = [
            'nombre' => 'required',
            'primer_apellido' => 'required',
            'fecha_nacimiento' => 'required'
        ];

        $validator = Validator::make($input, $rules);
        
        if ($validator->fails()) {
            Session::flash('error', 'Campos obligatorios incompletos');
            return redirect()->route('cliente.create');
        }
        
        DB::beginTransaction();

        try {
            if($request->identy){                
                $cliente = Cliente::find($request->identy);
            }else{
                $cliente = new Cliente();    
            }
            $cliente->no_cliente = $request->no_cliente;
            $cliente->nombre = Helper::capitalizeFirst($request->nombre);
            $cliente->primer_apellido = Helper::capitalizeFirst($request->primer_apellido);
            $cliente->segundo_apellido = Helper::capitalizeFirst($request->segundo_apellido);
            $cliente->telefono = $request->telefono;
            $cliente->fecha_nacimiento = $request->fecha_nacimiento;
            $cliente->email = $request->email;
            $cliente->num_contacto = $request->num_contacto;
            $cliente->parentesco = $request->parentesco;
            if ($request->hasFile('fileIne')) {
                $file = $request->file('fileIne');
                $filename = 'ine_' . time() . '.' . $file->getClientOriginalExtension(); // ejemplo: ine_1717288000.jpg
                $path = $file->storeAs('cliente', $filename, 'public');
            } else {
                $path = null;
            }
            $cliente->url_ine = $path;
            $cliente->save();
            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => '¡Cliente registrado exitosamente!',
                'cliente' => $cliente,
            ]);

        }catch (\PDOException $e){
            DB::rollBack();
            Log::error("Error al guardar cliente: " . $e->getMessage());            
            return response()->json([
                'status' => 'error',
                'message' => 'Hubo un error al guardar el cliente.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        $compras = Compra::select('id', 'num_solicitud','num_solicitud_sistema','fraccionamiento_id','estatus_id','cliente_id','corredor_id')
            ->with([
                'fraccionamiento:id,nombre',
                'estatus:id,nombre',
                'corredor:id,nombre,primer_apellido,segundo_apellido',
                'contrato:id,compra_id,documento_url,created_at',
            ])
            ->where('cliente_id', $cliente->id)
            ->where('estatus_id', 2)
            ->whereHas('fraccionamiento')
            ->get();
        
        if (view()->exists('pages.cliente.compra.index')) {
            return view('pages.cliente.compra.index', compact('cliente', 'compras'));
        }
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        
        if (view()->exists('pages.cliente.edit')) {

            return view('pages.cliente.edit', compact('cliente'));
        }
        return abort(404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente)
    {
        //dd($request->all());
        $input = $request->all();

        $rules = [
            'nombre' => 'required',
            'primer_apellido' => 'required',
            'fecha_nacimiento' => 'required'
        ];

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            Session::flash('error', 'Campos obligatorios incompletos');
            return redirect()->route('cliente.create');
        }

        DB::beginTransaction();

        try {
            $cliente = Cliente::find($cliente->id);

            $cliente->nombre = trim(\Helper::capitalizeFirst($request->nombre, "1"));
            $cliente->primer_apellido = \Helper::capitalizeFirst($request->primer_apellido, "1");
            $cliente->segundo_apellido = (!is_null($request->segundo_apellido) ? \Helper::capitalizeFirst($request->segundo_apellido, "1") : null );
            $cliente->telefono = ($request->telefono == null) ? "Sin Información" : $request->telefono ;
            $cliente->fecha_nacimiento = $request->fecha_nacimiento;
            $cliente->email = $request->email;
            $cliente->num_contacto = ($request->num_contacto == null) ? "Sin Información" : $request->num_contacto;
            $cliente->parentesco = ($request->parentesco == null) ? "Sin Información" : $request->parentesco;
            // if ($request->hasFile('fileIne')) { 
            //         if ($cliente->url_ine && Storage::disk('public')->exists($cliente->url_ine)) {
            //             Storage::disk('public')->delete($cliente->url_ine);
            //         }
            //         $file = $request->file('fileIne');
            //         $filename = 'ine_' . time() . '.' . $file->getClientOriginalExtension(); // ejemplo: ine_1717288000.jpg
            //         $path = $file->storeAs('cliente', $filename, 'public');
            // } else {
            //     $path = null;
            // }

            // if ($request->hasFile('documentos')) {
                
            //     $archivos = $request->file('documentos');

            //     $imagenes = [];
            //     $pdfs = [];

            //     foreach ($archivos as $archivo) {

            //         if (strtolower($archivo->getClientOriginalExtension()) === 'pdf') {
            //             $pdfs[] = $archivo;
            //         } else {
            //             $imagenes[] = $archivo;
            //         }
            //     }

            //     $nombreFinal = 'pago_' . $pago->id . '.pdf';
                
            //     $carpeta = 'public/comprobantes_pagos/';
            //     $rutaStorage = $carpeta . $nombreFinal;
            //     $rutaFinal = storage_path('app/' . $rutaStorage);

            //     if (!Storage::exists($carpeta)) {
            //         Storage::makeDirectory($carpeta);
            //     }

            //     // SOLO IMAGENES
            //     if (count($imagenes) > 0 && count($pdfs) == 0) {

            //         $html = '<html><body style="margin:0;padding:0;">';

            //         foreach ($imagenes as $img) {

            //             $base64 = base64_encode(file_get_contents($img->getRealPath()));

            //             $html .= '
            //             <div style="page-break-after: always;">
            //                 <img src="data:image/jpeg;base64,' . $base64 . '" style="width:100%;">
            //             </div>';
            //         }

            //         $html .= '</body></html>';

            //         $pdf = Pdf::loadHTML($html)->setPaper('a4', 'portrait');

            //         Storage::put($rutaStorage, $pdf->output());
            //     }

            //     // SOLO PDF
            //     elseif (count($pdfs) > 0 && count($imagenes) == 0) {

            //         $fpdi = new \setasign\Fpdi\Fpdi();

            //         foreach ($pdfs as $archivo) {

            //             $pageCount = $fpdi->setSourceFile($archivo->getRealPath());

            //             for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {

            //                 $template = $fpdi->importPage($pageNo);
            //                 $size = $fpdi->getTemplateSize($template);

            //                 $fpdi->AddPage($size['orientation'], [$size['width'], $size['height']]);
            //                 $fpdi->useTemplate($template);
            //             }
            //         }

            //         $fpdi->Output($rutaFinal, 'F');
            //     }

            //     // GUARDAR RUTA
            //     $pago->comprobante_url = 'comprobantes_pagos/' . $nombreFinal;
            //     $pago->save();
            // }
            // $cliente->url_ine = $path;
            // $cliente->save();
            if ($request->hasFile('fileIne')) {

                // 🧹 1. ELIMINAR ARCHIVO ANTERIOR SI EXISTE
                if ($cliente->url_ine && Storage::disk('public')->exists($cliente->url_ine)) {
                    Storage::disk('public')->delete($cliente->url_ine);
                }

                // 📥 2. OBTENER ARCHIVO
                $archivo = $request->file('fileIne');

                // 📂 3. DEFINIR NOMBRE Y RUTAS
                $nombreFinal = 'ine_' . $cliente->id . '_' . time() . '.pdf';
                $carpeta = 'public/ine/';
                $rutaStorage = $carpeta . $nombreFinal;
                $rutaFinal = storage_path('app/' . $rutaStorage);

                // 📁 4. CREAR CARPETA SI NO EXISTE
                if (!Storage::exists($carpeta)) {
                    Storage::makeDirectory($carpeta);
                }

                // 🔍 5. VALIDAR TIPO DE ARCHIVO
                $extension = strtolower($archivo->getClientOriginalExtension());

                // =========================================================
                // 🖼️ CASO 1: ES IMAGEN → CONVERTIR A PDF
                // =========================================================
                if (in_array($extension, ['jpg', 'jpeg', 'png', 'webp'])) {

                    $base64 = base64_encode(file_get_contents($archivo->getRealPath()));

                    $html = '
                    <html>
                        <body style="margin:0;padding:0;">
                            <div>
                                <img src="data:image/' . $extension . ';base64,' . $base64 . '" style="width:100%;">
                            </div>
                        </body>
                    </html>';

                    $pdf = Pdf::loadHTML($html)->setPaper('a4', 'portrait');

                    Storage::put($rutaStorage, $pdf->output());
                }

                // =========================================================
                // 📄 CASO 2: ES PDF → NORMALIZAR (REESCRIBIR)
                // =========================================================
                elseif ($extension === 'pdf') {

                    $fpdi = new Fpdi();

                    $pageCount = $fpdi->setSourceFile($archivo->getRealPath());

                    for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {

                        $template = $fpdi->importPage($pageNo);
                        $size = $fpdi->getTemplateSize($template);

                        $fpdi->AddPage($size['orientation'], [$size['width'], $size['height']]);
                        $fpdi->useTemplate($template);
                    }

                    $fpdi->Output($rutaFinal, 'F');
                }

                // =========================================================
                // ❌ CASO 3: FORMATO NO PERMITIDO
                // =========================================================
                else {
                    return back()->with('error', 'Formato de archivo no permitido. Solo imágenes o PDF.');
                }

                // 💾 6. GUARDAR RUTA EN BD (SIN "public/")
                $cliente->url_ine = 'ine/' . $nombreFinal;
            }

            $cliente->save();

            DB::commit();

            Session::flash('success', '¡Cliente actualizado!');
            return back()->with('success', 'Cliente actualizado correctamente');
            // return redirect()->route('cliente.index');

        }catch (\PDOException $e){
            DB::rollBack();
            dd($e);
            return back()->withErrors(['Error' => substr($e->getMessage(), 0, 150)]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();        
        return redirect()->route('cliente.index');
    }

    public function verContrato($idCliente) {
        
        $compras = Compra::select('id', 'num_solicitud','num_solicitud_sistema','fraccionamiento_id','estatus_id','cliente_id','corredor_id')
                ->with([
                    'fraccionamiento:id,nombre',
                    // 'estatus:id,nombre',
                    // 'cliente:id,nombre,primer_apellido,segundo_apellido',
                    'corredor:id,nombre,primer_apellido,segundo_apellido',
                    // 'contrato:id,compra_id,documento_url,created_at',
                ])
                ->where('cliente_id', $idCliente)
                ->where('estatus_id', 3)
                ->whereHas('fraccionamiento')
                ->get();
        $cliente = Cliente::find($idCliente);
        $nombreCompleto = $cliente
                        ? trim("{$cliente->nombre} {$cliente->primer_apellido} {$cliente->segundo_apellido}")
                        : '';
        if (view()->exists('pages.cliente.contrato.index')) {
            return view('pages.cliente.contrato.index',compact('compras', 'nombreCompleto'));
        }
        return abort(404);
    }

    public function continue($solicitudSys)
    {
        
        if (view()->exists('pages.cliente.add')) {

            $corredores = User::select('id', DB::raw('CONCAT(nombre, " ", primer_apellido) AS full_name'))->where('role_id', 4)->get();
            $estados = CatEntidadFederativa::select('id', 'nom_estado')->get();
            $mpios = CatMunicipio::select('id', 'nom_mpio')->get();
            $fraccionamientos = Fraccionamiento::select('id', 'nombre')->get();

            $datosCompra = Compra::where('num_solicitud_sistema',$solicitudSys)->with([
                            'corredor',
                            'estado',
                            'municipio',
                            'fraccionamiento',
                            'cliente',
                            'compralotelinderos.lindero',
                            'compralotelinderos.lote.manzana',
                            'contrato'
                        ])->get();

                        // dd($datosCompra);
                // dd($datosCompra);
            return view('pages.cliente.add', compact('corredores', 'estados', 'mpios', 'fraccionamientos', 'datosCompra'));
        }
        return abort(404);
    }


    public function nuevaCompra($idCliente)
    {
        
        if (view()->exists('pages.cliente.add')) {

            $corredores = User::select('id', DB::raw('CONCAT(nombre, " ", primer_apellido) AS full_name'))->where('role_id', 4)->get();
            $estados = CatEntidadFederativa::select('id', 'nom_estado')->get();
            $mpios = CatMunicipio::select('id', 'nom_mpio')->get();
            $fraccionamientos = Fraccionamiento::select('id', 'nombre')->get();
            $datosCliente = Cliente::find($idCliente);
            
            return view('pages.cliente.add', compact('corredores', 'estados', 'mpios', 'fraccionamientos','datosCliente'));
        }
        return abort(404);
    }

    public function mostrarDocumentoCliente($id)
    {
        $cliente = Cliente::findOrFail($id);

        if (!$cliente->url_ine) {
            abort(404, 'El cliente no tiene documento.');
        }

        $ruta = storage_path('app/public/' . $cliente->url_ine);

        if (!file_exists($ruta)) {
            abort(404, 'El documento no existe.');
        }

        return response()->file($ruta);
    }
    // public function mostrarDocumentoCliente($id)
    // {
    //     $cliente = Cliente::findOrFail($id);

    //     // Validar que exista documento
    //     if (!$cliente->url_ine) {
    //         abort(404, 'El cliente no tiene documento.');
    //     }

    //     // Construir ruta física
    //     $ruta = storage_path('app/public/' . $cliente->url_ine);

    //     // Validar existencia del archivo
    //     if (!file_exists($ruta)) {
    //         abort(404, 'El documento no existe.');
    //     }

    //     // Retornar archivo (PDF inline)
    //     return response()->file($ruta, [
    //         'Content-Type' => 'application/pdf',
    //     ]);
    // }
}
