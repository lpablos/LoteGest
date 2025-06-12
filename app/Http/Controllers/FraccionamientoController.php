<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fraccionamiento;
use App\Models\Proyecto;
use App\Models\CatTipoPredio;
use Illuminate\Support\Facades\Log;
use DB, Session;
use App\Helpers\Helper;

class FraccionamientoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $fraccionamientos = Fraccionamiento::orderByDesc('id')->get();
        $proyectos=Proyecto::all();
        $tpPredio = CatTipoPredio::all();
        if (view()->exists('pages.gestion-fraccionamientos.index')) {
            return view('pages.gestion-fraccionamientos.index', compact('fraccionamientos','proyectos','tpPredio'));
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
        // dd($request->all());
        $validated = $request->validate([
            'nombre'          => 'required|string|max:255',
            'imagen'          => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'reponsable'      => 'nullable|string|max:255', 
            'propietaria'     => 'nullable|string|max:255',
            'superficie'      => 'nullable|numeric|min:0',
            'ubicacion'       => 'nullable|string|max:255',
            'observaciones'   => 'nullable|string',
            'proyecto_id'     => 'required|exists:proyectos,id',
            // 'tipo_predios_id' => 'required|exists:proyectos,id',
            'manzanas'        => 'required|array|min:1',
            
            
        ]);
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
            $fraccionamiento->reponsable = Helper::capitalizeFirst($validated['reponsable']);
            $fraccionamiento->propietaria = Helper::capitalizeFirst($validated['propietaria']);
            $fraccionamiento->superficie = $validated['superficie'];
            $fraccionamiento->ubicacion = Helper::capitalizeFirst($validated['ubicacion']);
            $fraccionamiento->proyecto_id = $validated['proyecto_id'];
            $fraccionamiento->tipo_predios_id = $request->tipo_predios_id;
            $fraccionamiento->observaciones = Helper::capitalizeFirst($validated['observaciones']);
            $fraccionamiento->save();

            foreach ($request->manzanas as $manzana) {
                $fraccionamiento->manzanas()->create([
                    'num_manzana' => $manzana['num_manzana'],
                    'colinda_norte' => $manzana['colinda_norte'],
                    'colinda_sur' => $manzana['colinda_sur'],
                    'colinda_este' => $manzana['colinda_este'],
                    'colinda_oeste' => $manzana['colinda_oeste'],
                ]);
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
        // dd("Esto es lo que se pasa", $request->all());
        $validated = $request->validate([
            'nombre'          => 'required|string|max:255',
            'imagen'          => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'reponsable'      => 'nullable|string|max:255', 
            'propietaria'     => 'nullable|string|max:255',
            
            'superficie'      => 'nullable|numeric|min:0',
            'ubicacion'       => 'nullable|string|max:255',
            'observaciones'   => 'nullable|string',
            'proyecto_id'     => 'required|exists:proyectos,id',
            'tipo_predios_id'     => 'required|exists:proyectos,id',
        ]);
         DB::beginTransaction();
        try {
            if ($request->hasFile('imagen')) {
                $file = $request->file('imagen');
                $filename = 'fracc_' . time() . '.' . $file->getClientOriginalExtension(); // ejemplo: fracc_1717288000.jpg
                $path = $file->storeAs('fraccionamientos', $filename, 'public');
                $validated['imagen'] = $path;
            }
            $fraccionamiento = Fraccionamiento::find($id);
            $fraccionamiento->nombre = Helper::capitalizeFirst($validated['nombre']);
            $fraccionamiento->imagen = $validated['imagen'];
            $fraccionamiento->reponsable = Helper::capitalizeFirst($validated['reponsable']);
            $fraccionamiento->propietaria = Helper::capitalizeFirst($validated['propietaria']);
            $fraccionamiento->superficie = $validated['superficie'];
            $fraccionamiento->ubicacion = Helper::capitalizeFirst($validated['ubicacion']);
            $fraccionamiento->proyecto_id = $validated['proyecto_id'];
            $fraccionamiento->tipo_predios_id = $validated['tipo_predios_id'];
            $fraccionamiento->observaciones = Helper::capitalizeFirst($validated['observaciones']);
            $fraccionamiento->save();
            //   foreach ($request->manzanas as $manzana) {
            //     $fraccionamiento->manzanas()->create([
            //         'num_manzana' => $manzana['num_manzana'],
            //         'colinda_norte' => $manzana['colinda_norte'],
            //         'colinda_sur' => $manzana['colinda_sur'],
            //         'colinda_este' => $manzana['colinda_este'],
            //         'colinda_oeste' => $manzana['colinda_oeste'],
            //     ]);
            // }
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
}
