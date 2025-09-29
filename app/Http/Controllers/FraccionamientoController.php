<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fraccionamiento;
use App\Models\Lote;
// use App\Models\Proyecto;
use Illuminate\Support\Facades\Storage;
use App\Models\CatTipoPredio;
use Illuminate\Support\Facades\Log;
use DB, Session;
use App\Helpers\Helper;
use App\Models\Manzana;

class FraccionamientoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $fraccionamientos = Fraccionamiento::orderByDesc('id')->get();
        $tpPredio = CatTipoPredio::all();
        if (view()->exists('pages.gestion-fraccionamientos.index')) {
            return view('pages.gestion-fraccionamientos.index', compact('fraccionamientos','tpPredio'));
        }
        return abort(404);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        //dd("HOla aqi vista Fraccionamiento");
        if (view()->exists('pages.gestion-fraccionamiento.create')) {
            return view('pages.gestion-fraccionamiento.create');
        }
        return abort(404);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $validated = $request->validate( 
            $this->fraccRules(),
            $this->fraccMessages()
        );
        DB::beginTransaction();
        try {
            if (isset($validated['imagen'])) {
                if ($request->hasFile('imagen')) {
                    $file = $request->file('imagen');
                    $filename = 'fracc_' . time() . '.' . $file->getClientOriginalExtension(); // ejemplo: fracc_1717288000.jpg
                    $path = $file->storeAs('fraccionamientos', $filename, 'public');
                    $validated['imagen'] = $path;
                } 
            }
            
            
            $fraccionamiento = new Fraccionamiento();
            $fraccionamiento->nombre = Helper::capitalizeFirst($validated['nombre']);
            $fraccionamiento->imagen = $validated['imagen'] ?? null;
            $fraccionamiento->responsable = Helper::capitalizeFirst($validated['responsable']);
            $fraccionamiento->propietaria = Helper::capitalizeFirst($validated['propietaria']);
            $fraccionamiento->tipo_predios_id = $request->tipo_predios_id;
            $fraccionamiento->superficie = $validated['superficie'];
            $fraccionamiento->ubicacion = Helper::capitalizeFirst($validated['ubicacion']);
            $fraccionamiento->viento1 = Helper::capitalizeFirst($validated['viento1']);
            $fraccionamiento->viento2 = Helper::capitalizeFirst($validated['viento2']);
            $fraccionamiento->viento3 = Helper::capitalizeFirst($validated['viento3']);
            $fraccionamiento->viento4 = Helper::capitalizeFirst($validated['viento4']);
            $fraccionamiento->observaciones = Helper::capitalizeFirst($validated['observaciones']);
            $fraccionamiento->save();
            
            // dd($request->all());
            foreach ($request->manzana as $key => $man) {
                
                $numManzana = $key + 1;
                $manzana = new Manzana;
                $manzana->precio_contado = $man['precio_contado'] ?? null;
                $manzana->precio_credito = $man['precio_credito'] ?? null;
                $manzana->enganche = $man['enganche'] ?? null;
                $manzana->mensualidades = $man['mensualidades'] ?? null;
                $manzana->num_lotes = $man['nLote'];
                $manzana->num_manzana = $numManzana;
                $manzana->fraccionamiento_id = $fraccionamiento->id;
                $manzana->save();
                for ($i=1; $i <= $man['nLote']; $i++) { 
                    $lote = new Lote;
                    $lote->num_lote = $i;    
                    $lote->disponibilidad_id = 2;
                    $lote->manzana_id = $manzana->id;
                    $lote->save();
                }
               
            }
            
            DB::commit();
            Session::flash('success', 'Fraccionamiento fue registrado');
            return redirect()->route('fraccionamiento.index');

        } catch (\Throwable $th) {

            Log::error('Error guardar Fraccionamiento: ' . $th->getMessage());
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
        
        $fraccionamiento = Fraccionamiento::find($id);
        
        if (view()->exists('pages.gestion-fraccionamiento.edit')) {
            return view('pages.gestion-fraccionamiento.edit', compact('fraccionamiento'));
        }
        return abort(404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validated = $request->validate(
            $this->fraccRules(),
            $this->fraccMessages()
        );
        DB::beginTransaction();
        try {
            $fraccionamiento = Fraccionamiento::find($id);
           
            if ($request->hasFile('imagen')) {
                // 1. Eliminar imagen previa si existe
                if ($fraccionamiento->imagen && Storage::disk('public')->exists($fraccionamiento->imagen)) {
                    Storage::disk('public')->delete($fraccionamiento->imagen);
                }

                // 2. Guardar la nueva imagen
                $file     = $request->file('imagen');
                $filename = 'fracc_' . time() . '.' . $file->getClientOriginalExtension();
                $path     = $file->storeAs('fraccionamientos', $filename, 'public');

                // Asignar la ruta al array de datos validados
                // $validated['imagen'] = $path;
                $fraccionamiento->imagen = $path;
            }
            $fraccionamiento->nombre = Helper::capitalizeFirst($validated['nombre']);
            $fraccionamiento->manzanas = $validated['manzanas'];
            $fraccionamiento->reponsable = Helper::capitalizeFirst($validated['reponsable']);
            $fraccionamiento->propietaria = Helper::capitalizeFirst($validated['propietaria']);
            $fraccionamiento->superficie = $validated['superficie'];
            $fraccionamiento->ubicacion = Helper::capitalizeFirst($validated['ubicacion']);
            $fraccionamiento->tipo_predios_id = $validated['tipo_predios_id'];
            $fraccionamiento->observaciones = Helper::capitalizeFirst($validated['observaciones']);
            $fraccionamiento->update();
           
            DB::commit();
            Session::flash('success', 'Fraccionamiento fue actualizados');
            return redirect()->route('fraccionamiento.index');
        } catch (\Throwable $th) {
            Log::error('Error guardar Fraccionamiento: ' . $th->getMessage());
            DB::rollBack();
            return back()->withErrors(['Error' => substr($th->getMessage(), 0, 150)]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try {
            $fraccionamiento = Fraccionamiento::find($id);            
            $proyecto_id = $fraccionamiento->proyecto_id;
            $fraccionamiento->delete();
            return redirect()->route('proyecto.fraccionamientos', ['proyecto' => $proyecto_id])->with('success', 'Fraccionamiento eliminado correctamente');
        } catch (\Throwable $th) {
            Log::error('Error al eliminar el fraccionamiento: ' . $th->getMessage());
            return redirect()->back()->with('error', 'No se pudo eliminar el fraccionamiento. Intenta más tarde.');
        }
    }

    public function createFraccionamiento(string $id)
    {
        
        $proyecto_id = $id;
        if (view()->exists('pages.gestion-fraccionamiento.create')) {
            return view('pages.gestion-fraccionamiento.create',compact('proyecto_id'));
        }
        return abort(404);
    }


    public function lotes(string $id){
        $fraccionamiento = Fraccionamiento::find($id);
        $proyecto = Proyecto::find($fraccionamiento->proyecto_id);
        $lotes = $fraccionamiento->lotes;
        //dd("Estas en el listado de lotes del proyecto y su fraccionamieto", $lotes);
        if (view()->exists('pages.gestion-fraccionamiento.lotes')) {
            return view('pages.gestion-fraccionamiento.lotes', compact('lotes','fraccionamiento','proyecto'));
        }
        return abort(404);
    }

     private function fraccRules(): array
    {
        return [
            'nombre'          => 'required|string|max:255',
            'imagen'          => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'responsable'      => 'nullable|string|max:255', 
            'propietaria'     => 'nullable|string|max:255',
            'superficie'      => 'nullable|numeric|min:0',
            'viento1'         => 'nullable|string|max:255',
            'viento2'         => 'nullable|string|max:255',
            'viento3'         => 'nullable|string|max:255',
            'viento4'         => 'nullable|string|max:255',
            'ubicacion'       => 'nullable|string|max:255',
            'manzanas'        => 'nullable|numeric|min:1',
            'observaciones'   => 'nullable|string',
            'tipo_predios_id' => 'nullable|numeric|min:1',
        ];
    }

    /** Mensajes de error personalizados */
    private function fraccMessages(): array
    {
        return [
            'nombre.required'           => 'El nombre es obligatorio.',
            'nombre.string'             => 'El nombre debe ser un texto válido.',
            'nombre.max'                => 'El nombre no puede exceder :max caracteres.',

            'imagen.image'              => 'La imagen debe ser un archivo de imagen.',
            'imagen.mimes'              => 'Solo se permiten formatos jpg, jpeg, png o webp.',
            'imagen.max'                => 'La imagen no puede superar los 2 MB.',

            'responsable.string'         => 'El responsable debe ser un texto válido.',
            'propietaria.string'        => 'La propietaria debe ser un texto válido.',

            'superficie.numeric'        => 'La superficie debe ser un número.',
            'superficie.min'            => 'La superficie no puede ser negativa.',

            'ubicacion.string'          => 'La ubicación debe ser un texto válido.',

            'manzanas.numeric'          => 'Las manzanas deben ser numéricas.',
            'manzanas.min'              => 'Debe haber al menos una manzana.',

            'observaciones.string'      => 'Las observaciones deben ser un texto válido.',

            'tipo_predios_id.numeric'   => 'El tipo de predio debe ser numérico.',
            'tipo_predios_id.min'       => 'El tipo de predio debe tener al menos valor :min.',
        ];
    }

      public function duplicado(Request $request){
        DB::beginTransaction();
        try {
            $fracc = Fraccionamiento::findOrFail($request->input('id'));
            $nuevoFracc = $fracc->replicate();
            $nuevoFracc->nombre = $fracc->nombre . ' (Réplica)';
            $nuevoFracc->save();
            DB::commit();
            return redirect()->back()->with('success', 'Fraccionamiento Replicado Correctamente');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error('Error al replicar el Fraccionamiento: ' . $th->getMessage());
            return redirect()->back()->with('error', 'No Se Replico. Intenta Mas Tarde');
        }
    
    }
}
