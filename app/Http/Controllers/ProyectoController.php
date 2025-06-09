<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto;
use App\Models\CatEstatusProyecto;
use Illuminate\Support\Facades\Log;
use DB, Session;
use App\Helpers\Helper;

class ProyectoController extends Controller
{
    public function __construct()
    {
        // $this->middleware(['auth', 'verified']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (view()->exists('pages.gestion-proyectos.index')) {
            $proyectos = Proyecto::orderByDesc('id')
                            ->get();
            return view('pages.gestion-proyectos.index', compact('proyectos'));
        }
        return abort(404);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // if (view()->exists('pages.gestion-proyectos.create')) {
        //     return view('pages.gestion-proyectos.create');
        // }
        // return abort(404);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'fecha_inicio' => 'nullable|date',
            'responsable_proyecto' => 'nullable|string|max:255',
            // 'clave' => 'required|string|max:100|unique:proyectos,clave',
            'observaciones' => 'nullable|string',
            // 'estatus_proyecto_id' => 'required|exists:cat_estatus_proyectos,id',
        ]);
        DB::beginTransaction();
        try {            
            $proyecto = new Proyecto();
            $proyecto->nombre =  Helper::capitalizeFirst($validated['nombre']);
            $proyecto->fecha_inicio =  $validated['fecha_inicio'];
            $proyecto->responsable_proyecto =  Helper::capitalizeFirst($validated['responsable_proyecto']);
            // $proyecto->clave =  Helper::capitalizeFirst($validated['clave']);
            $proyecto->observaciones =  Helper::capitalizeFirst($validated['observaciones']);
            // $proyecto->estatus_proyecto_id = $validated['estatus_proyecto_id']; 
            $proyecto->save();
            DB::commit();
            Session::flash('success', 'Proyecto fue registrado');
            return redirect()->route('proyectos.index');
        } catch (\Throwable $th) {
            Log::error('Error guardar proyecto: ' . $th->getMessage());
            DB::rollBack();
            return back()->withErrors(['Error' => substr($th->getMessage(), 0, 150)]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // $proyecto = Proyecto::find($id);
        // if (view()->exists('pages.gestion-proyectos.edit')) {
        //     return view('pages.gestion-proyectos.edit', compact('proyecto'));
        // }
        // return abort(404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'fecha_inicio' => 'nullable|date',
            'responsable_proyecto' => 'nullable|string|max:255',
            // 'clave' => 'required|string|max:100|unique:proyectos,clave',
            'observaciones' => 'nullable|string',
            // 'estatus_proyecto_id' => 'required|exists:cat_estatus_proyectos,id',
        ]);
        DB::beginTransaction();
        try {            
            $proyecto = Proyecto::find($id);            
            $proyecto->nombre = $validated['nombre'];
            $proyecto->fecha_inicio = $validated['fecha_inicio'];
            $proyecto->responsable_proyecto = $validated['responsable_proyecto'];
            $proyecto->observaciones = $validated['observaciones'];
            // $proyecto->estatus_proyecto_id = $validated['estatus_proyecto_id'];     s       
            $proyecto->save();
            DB::commit();
            Session::flash('success', 'Proyecto fue actualizado');
            return redirect()->route('proyectos.index');
        } catch (\Throwable $th) {
            Log::error('Error actualizar proyecto: ' . $th->getMessage());
            DB::rollBack();
            return back()->withErrors(['Error' => substr($e->getMessage(), 0, 150)]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $proyecto = Proyecto::find($id);
            $proyecto->delete();
            return redirect()->route('proyectos.index')->with('success', 'Proyecto eliminado');
        } catch (\Throwable $th) {
            Log::error('Error al eliminar el cliente: ' . $th->getMessage());
            return redirect()->back()->with('error', 'No se pudo eliminar el proyecto. Intenta más tarde.');
        }
    }

    public function fraccionamientos(string $id){
        $proyecto = Proyecto::find($id);
        $fraccionamientos = $proyecto->fraccionamientos;
        if (view()->exists('pages.gestion-proyectos.fraccionamientos')) {
            return view('pages.gestion-proyectos.fraccionamientos', compact('proyecto','fraccionamientos'));
        }
        return abort(404);
    }
}
