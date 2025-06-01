<?php

namespace App\Http\Controllers;

use DB, Session;
use Illuminate\Http\Request;
use App\Models\CatEstatusDisponibilidad;
use Illuminate\Support\Facades\Validator;

class CatEstatusDisponibilidadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $estatusDisponibles = CatEstatusDisponibilidad::select('id', 'nombre', 'descripcion')->get();
        
        return view('pages.cat_estatus_disponibilidad.index', compact('estatusDisponibles'));
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
            return redirect()->route('estatus-disponibilidad.index');
        }

        DB::beginTransaction();

        try {

            $estatus = new CatEstatusDisponibilidad();
            $estatus->nombre = \Helper::capitalizeFirst($request->nombre, "1");
            $estatus->descripcion = $request->descripcion;
            $estatus->save();

            DB::commit();

            Session::flash('success', '¡Estatus registrado!');
            return redirect()->route('estatus-disponibilidad.index');

        }catch (\PDOException $e){
            DB::rollBack();
            return back()->withErrors(['Error' => substr($e->getMessage(), 0, 150)]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(CatEstatusDisponibilidad $catEstatusDisponibilidad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CatEstatusDisponibilidad $catEstatusDisponibilidad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $catEstatusDisponibilidad)
    {
        $input = $request->all();

        $rules = [
            'nombre' => 'required',
            'descripcion' => 'required'
        ];

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            Session::flash('error', '¡Campos obligatorios incompletos!');
            return redirect()->route('estatus-disponibilidad.index');
        }

        DB::beginTransaction();

        try {

            $estatus = CatEstatusDisponibilidad::find($catEstatusDisponibilidad);
            if ($estatus) {
                $estatus->nombre = \Helper::capitalizeFirst($request->nombre, "1");
                $estatus->descripcion = $request->descripcion;
                $estatus->save();
    
                DB::commit();
    
                Session::flash('success', '¡Estatus actualizado!');
            } else {
                Session::flash('error', '¡Estatus no encontrado!');
            }
            return redirect()->route('estatus-disponibilidad.index');

        }catch (\PDOException $e){
            DB::rollBack();
            return back()->withErrors(['Error' => substr($e->getMessage(), 0, 150)]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CatEstatusDisponibilidad $catEstatusDisponibilidad)
    {
        //
    }
}
