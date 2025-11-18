<?php

namespace App\Http\Controllers;

use App\Models\Fraccionamiento;
use App\Models\CatEstatusDisponibilidad;
use Illuminate\Http\Request;
use DB, Session;
use Illuminate\Support\Facades\Log;
use App\Models\Contrato;

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

            $fracc = Fraccionamiento::orderBy('nombre', 'desc')->get();
            
            $estatusDisponibilidad = CatEstatusDisponibilidad::all();

            return view('pages.contratos.index', compact('fracc','estatusDisponibilidad'));
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
}
