<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto;
use Illuminate\Support\Facades\Log;

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
            $proyectos = Proyecto::select('id','nombre', 'ubicacion', 'estado_actual', 'cantidad_fraccionamientos')
                     ->orderByDesc('id')
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
        if (view()->exists('pages.gestion-proyectos.create')) {
            return view('pages.gestion-proyectos.create');
        }
        return abort(404);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'ubicacion' => 'nullable|string|max:255',
            'latitud' => 'nullable|numeric|between:-90,90',
            'longitud' => 'nullable|numeric|between:-180,180',
            'superficie_total_m2' => 'required|numeric|min:0',
            'cantidad_fraccionamientos' => 'required|integer|min:1',
            'estado_actual' => 'required|in:Planificado,En desarrollo,Finalizado',
            'fecha_inicio' => 'nullable|date',
            'fecha_fin_estimada' => 'nullable|date|after_or_equal:fecha_inicio',
            'responsable_proyecto' => 'nullable|string|max:255',
            'observaciones' => 'nullable|string',
        ]);
        try {
            $proyecto = new Proyecto();
            $proyecto->nombre = $validated['nombre'];
            $proyecto->ubicacion = $validated['ubicacion'];
            $proyecto->latitud = $validated['latitud'];
            $proyecto->longitud = $validated['longitud'];
            $proyecto->superficie_total_m2 = $validated['superficie_total_m2'];
            $proyecto->cantidad_fraccionamientos = $validated['cantidad_fraccionamientos'];
            $proyecto->estado_actual = $validated['estado_actual'];
            $proyecto->fecha_inicio = $validated['fecha_inicio'];
            $proyecto->fecha_fin_estimada = $validated['fecha_fin_estimada'];
            $proyecto->responsable_proyecto = $validated['responsable_proyecto'];
            $proyecto->observaciones = $validated['observaciones'];
            $proyecto->save();
            return redirect()->route('proyectos.index')->with('success', 'Se registro correctamente');
        } catch (\Throwable $th) {
            Log::error('Error al guardar cliente: ' . $th->getMessage());
            return redirect()->back()->with('error', 'No se pudo guardar el proyecto. Intenta más tarde.');
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
        $proyecto = Proyecto::find($id);
        if (view()->exists('pages.gestion-proyectos.edit')) {
            return view('pages.gestion-proyectos.edit', compact('proyecto'));
        }
        return abort(404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'ubicacion' => 'nullable|string|max:255',
            'latitud' => 'nullable|numeric|between:-90,90',
            'longitud' => 'nullable|numeric|between:-180,180',
            'superficie_total_m2' => 'required|numeric|min:0',
            'cantidad_fraccionamientos' => 'required|integer|min:1',
            'estado_actual' => 'required|in:Planificado,En desarrollo,Finalizado',
            'fecha_inicio' => 'nullable|date',
            'fecha_fin_estimada' => 'nullable|date|after_or_equal:fecha_inicio',
            'responsable_proyecto' => 'nullable|string|max:255',
            'observaciones' => 'nullable|string',
        ]);
        try {
            $proyecto = Proyecto::find($id);
            $proyecto->nombre = $validated['nombre'];
            $proyecto->ubicacion = $validated['ubicacion'];
            $proyecto->latitud = $validated['latitud'];
            $proyecto->longitud = $validated['longitud'];
            $proyecto->superficie_total_m2 = $validated['superficie_total_m2'];
            $proyecto->cantidad_fraccionamientos = $validated['cantidad_fraccionamientos'];
            $proyecto->estado_actual = $validated['estado_actual'];
            $proyecto->fecha_inicio = $validated['fecha_inicio'];
            $proyecto->fecha_fin_estimada = $validated['fecha_fin_estimada'];
            $proyecto->responsable_proyecto = $validated['responsable_proyecto'];
            $proyecto->observaciones = $validated['observaciones'];
            $proyecto->save();
            return redirect()->route('proyectos.index')->with('success', 'Se registro actualizado');
        } catch (\Throwable $th) {
            Log::error('Error al eliminar el cliente: ' . $th->getMessage());
            return redirect()->back()->with('error', 'No se pudo actualizar el proyecto. Intenta más tarde.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $proyecto = Proyecto::find($id);
        try {
            return view('pages.gestion-proyectos.edit', compact('proyecto'));
        } catch (\Throwable $th) {
            Log::error('Error al eliminar el cliente: ' . $th->getMessage());
            return redirect()->back()->with('error', 'No se pudo eliminar el proyecto. Intenta más tarde.');
        }
    }

    public function fraccionamientos(string $id){
        $proyecto = Proyecto::find($id);
        $fraccionamientos = $proyecto->fraccionamientos;
        //dd("Esto tiene", $fraccionamientos);
        if (view()->exists('pages.gestion-proyectos.fraccionamientos')) {
            $proyectos = Proyecto::select('id','nombre', 'ubicacion', 'estado_actual', 'cantidad_fraccionamientos')
                     ->orderByDesc('id')
                     ->get();
            return view('pages.gestion-proyectos.fraccionamientos', compact('proyecto','fraccionamientos'));
        }
        return abort(404);
    }
}
