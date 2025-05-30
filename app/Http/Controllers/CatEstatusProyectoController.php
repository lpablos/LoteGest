<?php

namespace App\Http\Controllers;

use DB, Session;
use Illuminate\Http\Request;
use App\Models\CatEstatusProyecto;
use Illuminate\Support\Facades\Validator;

class CatEstatusProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $estatusProyectos = CatEstatusProyecto::select('id', 'nombre', 'descripcion')->get();
        
        return view('pages.cat_estatus_proyecto.index', compact('estatusProyectos'));
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
        $input = $request->all();

        $rules = [
            'nombre' => 'required',
            'descripcion' => 'required'
        ];

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            Session::flash('error', '¡Campos obligatorios incompletos!');
            return redirect()->route('estatus-proyectos.index');
        }

        DB::beginTransaction();

        try {

            $estatus = new CatEstatusProyecto();
            $estatus->nombre = \Helper::capitalizeFirst($request->nombre, "1");
            $estatus->descripcion = $request->descripcion;
            $estatus->save();

            DB::commit();

            Session::flash('success', '¡Estatus de proyecto registrado!');
            return redirect()->route('estatus-proyectos.index');

        }catch (\PDOException $e){
            DB::rollBack();
            return back()->withErrors(['Error' => substr($e->getMessage(), 0, 150)]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(CatEstatusProyecto $catEstatusProyecto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CatEstatusProyecto $catEstatusProyecto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $catEstatusProyecto)
    {
        $input = $request->all();

        $rules = [
            'nombre' => 'required',
            'descripcion' => 'required'
        ];

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            Session::flash('error', '¡Campos obligatorios incompletos!');
            return redirect()->route('estatus-proyectos.index');
        }

        DB::beginTransaction();

        try {

            $estatus = CatEstatusProyecto::find($catEstatusProyecto);
            if ($estatus) {
                $estatus->nombre = \Helper::capitalizeFirst($request->nombre, "1");
                $estatus->descripcion = $request->descripcion;
                $estatus->save();
    
                DB::commit();
    
                Session::flash('success', '¡Estatus de proyecto actualizado!');
            } else {
                Session::flash('error', '¡Estatus no encontrado!');
            }
            return redirect()->route('estatus-proyectos.index');

        }catch (\PDOException $e){
            DB::rollBack();
            return back()->withErrors(['Error' => substr($e->getMessage(), 0, 150)]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CatEstatusProyecto $catEstatusProyecto)
    {
        //
    }
}
