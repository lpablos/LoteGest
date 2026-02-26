<?php

namespace App\Http\Controllers;

use App\Models\Fraccionamiento;
use App\Models\CatEstatusDisponibilidad;
use Illuminate\Http\Request;
use DB, Session;
use Illuminate\Support\Facades\Log;
use App\Models\Contrato;
use App\Models\Compra;
use Barryvdh\DomPDF\Facade\Pdf;
use setasign\Fpdi\Fpdi;
use Illuminate\Support\Facades\Storage;

class ContratoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if (view()->exists('pages.contratos.index')) {
            /*
            $identy = $request->input('identy') && 1; 
            $fraccionamientos = Fraccionamiento::orderBy('nombre', 'desc')->get();
            $fracc = $identy
                ? $fraccionamientos->firstWhere('id', $identy)
                : null; 
            */   
            // $fracc = Fraccionamiento::orderBy('nombre', 'desc')->get();
            
            // $estatusDisponibilidad = CatEstatusDisponibilidad::all();
           $compras = Compra::select(
                        'compras.id',
                        'compras.num_solicitud',
                        'compras.num_solicitud_sistema',
                        'compras.fraccionamiento_id',
                        'compras.estatus_id',
                        'compras.cliente_id',
                        'compras.corredor_id'
                    )
                    ->leftJoin('contratos as c', 'c.compra_id', '=', 'compras.id')
                    ->with([
                        'fraccionamiento:id,nombre',
                        'estatus:id,nombre',
                        'cliente:id,nombre,primer_apellido,segundo_apellido',
                        'corredor:id,nombre,primer_apellido,segundo_apellido',
                        'contrato:id,compra_id,codigo_valido_contrato,created_at',
                    ])
                    ->where('compras.estatus_id', 3)
                    ->orderBy('c.created_at', 'desc')
                    ->get();
            return view('pages.contratos.index', compact('compras'));
        }
        return abort(404);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        DB::beginTransaction();
        try {
                 
            if(!$request->filled('id_contrato_asc')){
                $contrato = new Contrato();
            }else{
                $contrato = Contrato::findOrFail($request['id_contrato_asc']);
            }            
            // dd($request->all());
            $contrato->vendedor_propietario_asc = $request['vendedor_propietario_asc'];
            $contrato->vendedor_representante_asc = $request['vendedor_representante_asc'];
            $contrato->comprador_nombre_completo_asc = $request['comprador_nombre_completo_asc'];
            $contrato->propietarios_familia_asc = $request['propietarios_familia_asc'];
            $contrato->ubicacion_escritura_asc = $request['ubicacion_escritura_asc'];
            $contrato->ubicacion_zona_asc = $request['ubicacion_zona_asc'];
            $contrato->municipio_estado_asc = $request['municipio_estado_asc'];
            $contrato->textoContrato = $request['textoContrato'];
            $contrato->textoContratoSegunda = $request['textoContratoSegunda'];
            $contrato->fecha_asc_dato = $request['fecha_asc_dato'];
            $contrato->representante_firma = $request['representante_firma'];
            $contrato->comprador_firma = $request['comprador_firma'];
            $contrato->observaciones = $request['observaciones'];
            $contrato->compra_id = $request['compra_id'];
            $contrato->denominado_como_asc = $request['denominado_como_asc'];
            $contrato->html_tablas = $request['html_tablas'];
            $contrato->save();
            DB::commit();
            return response()->json([
                'status' => 'success',
                'message' => '¡Contrato Vista Previa se registro exitosamente!',
                'contrato' => $contrato,
            ]);
        } catch (\PDOException $e) {
            DB::rollBack();
            Log::error("Error al guardar cliente: " . $e->getMessage());    
            return response()->json([
                'status' => 'error',
                'message' => 'Hubo un error al guardar el contrato.',
                'error' => $e->getMessage(),
            ], 500);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // 
        
        if (view()->exists('pages.contratos.contrato')) {
            /*
            $identy = $request->input('identy') && 1; 
            $fraccionamientos = Fraccionamiento::orderBy('nombre', 'desc')->get();
            $fracc = $identy
                ? $fraccionamientos->firstWhere('id', $identy)
                : null; 
            */

            $fracc = Fraccionamiento::orderBy('nombre', 'desc')->get();
            
            $estatusDisponibilidad = CatEstatusDisponibilidad::all();

            return view('pages.contratos.contrato', compact('fracc','estatusDisponibilidad'));
        }
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }




    public function contratoFirmado(Request $request)
    {
        $request->validate([
            'documentos.*' => 'required|file|mimes:jpg,jpeg,png,webp,pdf'
        ]);

        $contrato = Contrato::findOrFail($request->contrato_id);        
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

        $nombreFinal = 'contrato_' . $contrato->id . '.pdf';

        // 🔥 AQUÍ DEFINIMOS BIEN LA CARPETA
        $carpeta = 'public/contratosdigital/';
        $rutaStorage = $carpeta . $nombreFinal;
        $rutaFinal = storage_path('app/' . $rutaStorage);

        // Crear carpeta si no existe
        if (!Storage::exists($carpeta)) {
            Storage::makeDirectory($carpeta);
        }

        // 🔥 SOLO IMÁGENES
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

        // 🔥 SOLO PDFs
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

        else {
            return response()->json([
                'error' => 'No se pueden mezclar imágenes y PDFs'
            ], 422);
        }

        // 🔥 GUARDAMOS RUTA CORRECTA EN BD
        $contrato->digital_url = 'contratosdigital/' . $nombreFinal;
        $contrato->save();

        return response()->json([
            'success' => true,
            'url' => asset('storage/' . $contrato->digital_url)
        ]);
    }


    
    public function obtenerDocumentoAsociado($contratoId)
    {
        $contrato = Contrato::find($contratoId);
        
        if ($contrato && $contrato->digital_url) {
            return response()->json([
                'success' => true,
                'url' => asset('storage/' . $contrato->digital_url)
            ]);
        }

        return response()->json([
            'success' => false
        ]);
    }

}
