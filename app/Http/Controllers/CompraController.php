<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compra;
use App\Models\CompraLoteLindero;
use App\Models\Lindero;
use App\Models\Lote;
use DB, Session;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
            $compra = new Compra;
            $compra->num_solicitud = $request['num_solicitud'];
            $compra->corredor_id = $request['corredor'];
            $compra->estado_id = $request['entidad_id'];
            $compra->municipio_id = $request['mpio_id'];
            $compra->fraccionamiento_id = $request['fracc_id'];
            $compra->cliente_id = $request['identyCli']; // Hay que agregarlo en el front
            $compra->save();
            
            $totalLotes = count($request['lote']);

            $idLindero;
            $campo = 'individual';

            for ($i=0; $i < $totalLotes - 1;$i++) { 
                
                if($request['viento1'][$i]){
                    
                    $lindero = new Lindero;
                    $lindero->viento1 = $request['viento1'][$i];
                    $lindero->colinda1 = $request['colinda1'][$i];
                    $lindero->viento2 = $request['viento2'][$i];
                    $lindero->colinda2 = $request['colinda2'][$i];
                    $lindero->viento3 = $request['viento3'][$i];
                    $lindero->colinda3 = $request['colinda3'][$i];
                    $lindero->viento4 = $request['viento4'][$i];
                    $lindero->colinda4 = $request['colinda4'][$i];
                    $lindero->save();                    
                    $idLindero = $lindero->id;

                }
               
                if(count($request['viento1']) !== $totalLotes){
                    $campo = 'union';
                }
                // las asociacion de la venta
                $loteLindero = new CompraLoteLindero;
                $loteLindero->compra_id = $compra->id;
                $loteLindero->lote_id = $request['lote'][$i];
                $loteLindero->lindero_id = $idLindero;
                $loteLindero->campo = $campo;
                $loteLindero->descripcion = "demo";
                $loteLindero->save();
                // Se pone como vendido el lote por que ya se vendio
                $loteVendido = Lote::findOrFail($request['lote'][$i]);
                $loteVendido->disponibilidad_id = 1; // Esta vendido;
                $loteVendido->save();  
            }
            DB::commit();
            return response()->json([
                'status' => 'success',
                'message' => 'La compra fue creada exitosamente',
                'compra' => $compra,
            ], 200);
            
            
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            DB::rollBack();
            Log::error('Lote no encontrado durante la transacción', [
                'error' => $e->getMessage(),
            ]);
            return response()->json([
                'status' => 'error',
                'message' => 'Uno o más lotes no fueron encontrados.',
            ], 404);

        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error('Error inesperado en la venta de lotes', [
                'error' => $th->getMessage(),
                'line' => $th->getLine(),
                'file' => $th->getFile(),
                'trace' => $th->getTraceAsString(),
            ]);
            return response()->json([
                'status' => 'error',
                'message' => 'Ocurrió un error al actualizar los lotes.',
                'error' => $th->getMessage(),
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
