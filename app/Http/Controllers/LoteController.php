<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lote;
use App\Models\Fraccionamiento;
use App\Models\CatEstatus;
use App\Models\CatEstatusDisponibilidad;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use DB, Session;
use App\Helpers\Helper;
use Illuminate\Support\Facades\Storage;

class LoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        
        if (view()->exists('pages.gestion-lotes.index')) {
            $identy = $request->input('identy'); 
            $fraccionamientos = Fraccionamiento::orderBy('nombre', 'desc')->get();
            $fracc = $identy
                ? $fraccionamientos->firstWhere('id', $identy)
                : null;
            
            $estatusDisponibilidad = CatEstatusDisponibilidad::all();

            return view('pages.gestion-lotes.index', compact('fraccionamientos','identy', 'fracc','estatusDisponibilidad'));
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
        
        $validated = $request->validate(  
            $this->loteRules(),
            $this->loteMessages()
        );
        
        DB::beginTransaction();
        try {
            if ($request->hasFile('plano')) {
                $file = $request->file('plano');
                $filename = 'lote_' . time() . '.' . $file->getClientOriginalExtension(); // ejemplo: fracc_1717288000.jpg
                $path = $file->storeAs('plano', $filename, 'public');
                $validated['plano'] = $path;
            }
            $lote = new Lote();
            $lote->num_lote = $validated['num_lote'];
            $lote->medidas_m = Helper::capitalizeFirst($validated['medidas_m']);
            $lote->superficie_m2 = $validated['superficie_m2'];
            $lote->precio_contado = $validated['precio_contado'];
            $lote->precio_credito = $validated['precio_credito'];
            $lote->plano = $validated['plano'];
            $lote->manzana = $validated['manzana'];
            $lote->colinda_norte = Helper::capitalizeFirst($validated['colinda_norte']);
            $lote->colinda_sur = Helper::capitalizeFirst($validated['colinda_sur']);
            $lote->colinda_este = Helper::capitalizeFirst($validated['colinda_este']);
            $lote->colinda_oeste = Helper::capitalizeFirst($validated['colinda_oeste']);
            $lote->observaciones = Helper::capitalizeFirst($validated['observaciones']);
            $lote->cat_estatus_disponibilidad_id = $validated['cat_estatus_disponibilidad_id'];
            $lote->fraccionamiento_id = $validated['fraccionamiento_id'];
            $lote->save();
            DB::commit();
            Session::flash('success', 'Lote fue registrado');
            return back();
        } catch (\Throwable $th) {
            Log::error('Error guardar el lote: ' . $th->getMessage());
            DB::rollBack();
            return back()->withErrors(['Error' => substr($th->getMessage(), 0, 150)]);
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
        $lote = Lote::find($id);
        if (view()->exists('pages.gestion-lotes.edit')) {
            return view('pages.gestion-lotes.edit', compact('lote'));
        }
        return abort(404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
       $validated = $request->validate( 
            $this->loteRules(),
            $this->loteMessages()
        );
        DB::beginTransaction();
        try {

            $lote = Lote::find($id);
            if ($request->hasFile('plano')) {
                // 1. Eliminar imagen previa si existe
                if ($lote->plano && Storage::disk('public')->exists($lote->plano)) {
                    Storage::disk('public')->delete($lote->plano);
                }

                // 2. Guardar la nueva imagen
                $file     = $request->file('plano');
                $filename = 'lote_' . time() . '.' . $file->getClientOriginalExtension();
                $path     = $file->storeAs('plano', $filename, 'public');

                // Asignar la ruta al array de datos validados
                $lote->plano = $path;
            }
            $lote->num_lote = $validated['num_lote'];
            $lote->medidas_m = Helper::capitalizeFirst($validated['medidas_m']);
            $lote->superficie_m2 = $validated['superficie_m2'];
            $lote->precio_contado = $validated['precio_contado'];
            $lote->precio_credito = $validated['precio_credito'];
            $lote->manzana = $validated['manzana'];
            $lote->colinda_norte = Helper::capitalizeFirst($validated['colinda_norte']);
            $lote->colinda_sur = Helper::capitalizeFirst($validated['colinda_sur']);
            $lote->colinda_este = Helper::capitalizeFirst($validated['colinda_este']);
            $lote->colinda_oeste = Helper::capitalizeFirst($validated['colinda_oeste']);
            $lote->observaciones = Helper::capitalizeFirst($validated['observaciones']);
            $lote->cat_estatus_disponibilidad_id = $validated['cat_estatus_disponibilidad_id'];
            $lote->fraccionamiento_id = $validated['fraccionamiento_id'];
            $lote->update();
            DB::commit();
            Session::flash('success', 'Lote fue actualizado');
            return back();
        } catch (\Throwable $th) {
            Log::error('Error actualizar el lote: ' . $th->getMessage());
            DB::rollBack();
            return back()->withErrors(['Error' => substr($th->getMessage(), 0, 150)]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $lote = Lote::find($id);       
            $lote->delete();
            return redirect()->back()->with('success', 'Lote eliminado correctamente');
        } catch (\Throwable $th) {
            Log::error('Error al eliminar el Lote: ' . $th->getMessage());
            return redirect()->back()->with('error', 'No se pudo eliminar el Lote. Intenta más tarde.');
        }
    }

     public function createLote(string $id)
    {
        // Este id Es para ponerlo ne le hide del form y asocarlo el lote al fraccionamiento        
        $fraccionamiento_id = $id;
        if (view()->exists('pages.gestion-lotes.create')) {
            return view('pages.gestion-lotes.create',compact('fraccionamiento_id'));
        }
        return abort(404);
    }



     private function loteRules(): array
    {
        return [
            'num_lote'                         => ['required', 'string'],
            'medidas_m'                        => ['required', 'string'],
            'superficie_m2'                    => ['required', 'numeric', 'min:1'],
            'precio_contado'                   => ['nullable', 'numeric', 'min:0'],
            'precio_credito'                   => ['nullable', 'numeric', 'min:0'],
            'plano'                            => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp'],
            'manzana'                          => ['required', 'numeric', 'min:1'],
            'colinda_norte'                    => ['nullable', 'string'],
            'colinda_sur'                      => ['nullable', 'string'],
            'colinda_este'                     => ['nullable', 'string'],
            'colinda_oeste'                    => ['nullable', 'string'],
            'observaciones'                    => ['nullable', 'string'],
            'cat_estatus_disponibilidad_id'    => ['required', 'exists:cat_estatus_disponibilidad,id'],
            'fraccionamiento_id'               => ['required'],
        ];
    }

    private function loteMessages(): array
    {
        return [
            'num_lote.required'                     => 'El número de lote es obligatorio.',
            'num_lote.string'                       => 'El número de lote debe ser texto.',
            'medidas_m.required'                    => 'Las medidas son obligatorias.',
            'superficie_m2.min'                     => 'La superficie debe ser al menos :min m².',
            'precio_contado.min'                    => 'El precio de contado no puede ser negativo.',
            'plano.image'                           => 'El plano debe ser una imagen.',
            'plano.mimes'                           => 'El plano debe ser jpg, jpeg, png o webp.',
            'manzana.min'                           => 'La manzana debe ser al menos :min.',
            'cat_estatus_disponibilidad_id.required'=> 'El estatus de disponibilidad es obligatorio.',
            // [...] completa con el resto.
        ];
    }
}
