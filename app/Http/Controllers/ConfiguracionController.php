<?php

namespace App\Http\Controllers;

use App\Models\Configuracion;
use Illuminate\Http\Request;

class ConfiguracionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $configuracion = Configuracion::first();
        return view('pages.configuracion.index', compact('configuracion'));
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
        //
        
        
        if($request->input('id') == null){
            $configuracion = Configuracion::create([
                'nombre_empresa' => $request->input('nombre_empresa'),
                'direccion' => $request->input('direccion'),
                'telefono' => $request->input('telefono'),
                'email' => $request->input('email')
            ]); 
        }else{
            $configuracion = Configuracion::find($request->input('id'));
            $configuracion->update([
                'nombre_empresa' => $request->input('nombre_empresa'),
                'direccion' => $request->input('direccion'),
                'telefono' => $request->input('telefono'),
                'email' => $request->input('email')
            ]); 
        }
        return redirect()->route('configuracion.index')->with('success', 'Configuración guardada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Configuracion $configuracion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Configuracion $configuracion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Configuracion $configuracion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Configuracion $configuracion)
    {
        //
    }
}
