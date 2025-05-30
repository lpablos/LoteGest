<?php

namespace App\Http\Controllers;

use DB, Session;
use App\Models\CatEstatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CatEstatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $estatus = CatEstatus::select('id', 'nombre', 'descripcion')->get();
        
        return view('pages.estatus.index', compact('estatus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $rules = [
            'nombre' => 'required',
            'descripcion' => 'required'
        ];

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            Session::flash('error', '¡Campos obligatorios incompletos!');
            return redirect()->route('estatus.index');
        }

        DB::beginTransaction();

        try {

            $estatus = new CatEstatus();
            $estatus->nombre = \Helper::capitalizeFirst($request->nombre, "1");
            $estatus->descripcion = $request->descripcion;
            $estatus->save();

            DB::commit();

            Session::flash('success', '¡Estatus registrado!');
            return redirect()->route('estatus.index');

        }catch (\PDOException $e){
            DB::rollBack();
            return back()->withErrors(['Error' => substr($e->getMessage(), 0, 150)]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(CatEstatus $catEstatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CatEstatus $catEstatus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $catEstatus)
    {
        $input = $request->all();

        $rules = [
            'nombre' => 'required',
            'descripcion' => 'required'
        ];

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            Session::flash('error', '¡Campos obligatorios incompletos!');
            return redirect()->route('estatus.index');
        }

        DB::beginTransaction();

        try {

            $estatus = CatEstatus::find($catEstatus);
            if ($estatus) {
                $estatus->nombre = \Helper::capitalizeFirst($request->nombre, "1");
                $estatus->descripcion = $request->descripcion;
                $estatus->save();
    
                DB::commit();
    
                Session::flash('success', '¡Estatus actualizado!');
            } else {
                Session::flash('error', '¡Estatus no encontrado!');
            }
            return redirect()->route('estatus.index');

        }catch (\PDOException $e){
            DB::rollBack();
            return back()->withErrors(['Error' => substr($e->getMessage(), 0, 150)]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CatEstatus $catEstatus)
    {
        //
    }
}
