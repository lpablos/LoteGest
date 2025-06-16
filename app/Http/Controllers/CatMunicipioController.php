<?php

namespace App\Http\Controllers;

use DB, Session;
use App\Models\CatMunicipio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CatMunicipioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $municipios = CatMunicipio::select('id', 'nom_mpio')->get();
        
        return view('pages.cat_municipios.index', compact('municipios'));
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
    public function show(CatMunicipio $catMunicipio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CatMunicipio $catMunicipio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();

        $rules = [
            'nombre' => 'required'
        ];

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            Session::flash('error', 'El nombre es requerido');
            return redirect()->route('municipios.index');
        }

        $existe = CatMunicipio::where('nom_mpio', $request->nombre)->first();
        // dd($existe);
        if ($existe) {
            Session::flash('error', '¡El nombre ingresado ya se encuentra registrado!');
            return redirect()->route('municipios.index');
        }

        DB::beginTransaction();

        try {
            $mpio = CatMunicipio::find($id);
            $mpio->nom_mpio = trim(\Helper::capitalizeFirst($request->nombre, "1"));
            $mpio->save();
    
            DB::commit();

            Session::flash('success', '¡Municipio actualizado!');
            
            return redirect()->route('municipios.index');

        }catch (\PDOException $e){
            DB::rollBack();
            return back()->withErrors(['Error' => substr($e->getMessage(), 0, 150)]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CatMunicipio $catMunicipio)
    {
        //
    }
}
