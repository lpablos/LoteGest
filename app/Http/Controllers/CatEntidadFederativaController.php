<?php

namespace App\Http\Controllers;

use DB, Session;
use App\Models\CatEntidadFederativa;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class CatEntidadFederativaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $entidades = CatEntidadFederativa::select('id', 'nom_estado')->get();
        
        return view('pages.cat_entidades_federativas.index', compact('entidades'));
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
    public function show(CatEntidadFederativa $catEntidadFederativa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CatEntidadFederativa $catEntidadFederativa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CatEntidadFederativa $catEntidadFederativa)
    {
        $input = $request->all();

        $rules = [
            'nombre' => 'required'
        ];

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            Session::flash('error', 'El nombre es requerido');
            return redirect()->route('entidades-federativas.index');
        }

        $existe = CatEntidadFederativa::where('nom_estado', $request->nombre)->first();
        // dd($existe);
        if ($existe) {
            Session::flash('error', '¡El nombre ingresado ya se encuentra registrado!');
            return redirect()->route('entidades-federativas.index');
        }

        DB::beginTransaction();

        try {
            $entidad = CatEntidadFederativa::find($id);
            $entidad->nom_estado = trim(\Helper::capitalizeFirst($request->nombre, "1"));
            $entidad->save();
    
            DB::commit();

            Session::flash('success', 'Entidad actualizada!');
            
            return redirect()->route('entidades-federativas.index');

        }catch (\PDOException $e){
            DB::rollBack();
            return back()->withErrors(['Error' => substr($e->getMessage(), 0, 150)]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CatEntidadFederativa $catEntidadFederativa)
    {
        //
    }
}
