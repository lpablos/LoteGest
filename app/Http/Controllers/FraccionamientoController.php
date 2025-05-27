<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fraccionamiento;
use Illuminate\Support\Facades\Log;

class FraccionamientoController extends Controller
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
        $validated = $request->validate([
            'proyecto' => ['required', 'exists:proyectos,id'],
            'nombre' => ['required', 'string', 'max:255'],
            'superficie_m2' => ['required', 'numeric', 'min:0'],
            'cantidad_lotes' => ['required', 'integer', 'min:0'],
            'uso_predominante' => ['required', 'in:Habitacional,Comercial,Mixto'],
            'etapa' => ['nullable', 'string', 'max:255'],
            'servicios_disponibles' => ['nullable', 'array'],
            'servicios_disponibles.*' => ['string', 'max:100'],
            'observaciones' => ['nullable', 'string'],
        ]);
        try {
            $fraccionamiento = new Fraccionamiento();
            $fraccionamiento->proyecto_id = $validated['proyecto'];
            $fraccionamiento->nombre = $validated['nombre'];
            $fraccionamiento->superficie_m2 = $validated['superficie_m2'];
            $fraccionamiento->cantidad_lotes = $validated['cantidad_lotes'];
            $fraccionamiento->uso_predominante = $validated['uso_predominante'];
            $fraccionamiento->etapa = $validated['etapa'];
            $fraccionamiento->servicios_disponibles = $request->input('servicios_disponibles');
            $fraccionamiento->observaciones = $validated['observaciones'];
            $fraccionamiento->save();
            return redirect()->route('proyecto.fraccionamientos',['proyecto' =>$validated['proyecto']])->with('success', 'Se registro correctamente el fraccionamiento');
        } catch (\Throwable $th) {
            Log::error('Error al guardar cliente: ' . $th->getMessage());
            return redirect()->back()->with('error', 'No se pudo guardar el fraccionamiento. Intenta más tarde.');
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

    public function createFraccionamiento(string $id)
    {
        $proyecto = $id;
        if (view()->exists('pages.gestion-fraccionamiento.create')) {
            return view('pages.gestion-fraccionamiento.create',compact('proyecto'));
        }
        return abort(404);
    }
}
