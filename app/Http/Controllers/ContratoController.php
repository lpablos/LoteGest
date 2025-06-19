<?php

namespace App\Http\Controllers;

use App\Models\Fraccionamiento;
use App\Models\CatEstatusDisponibilidad;
use Illuminate\Http\Request;

class ContratoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        if (view()->exists('pages.gestion-lotes.index')) {
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
        //
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
