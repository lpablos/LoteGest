<?php

namespace App\Http\Controllers;

use DB;
use Session;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::select('id', 'nombre')->get();
        
        return view('pages.roles.index', compact('roles'));
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
        ];

        $messages = [
            'nombre.required'   => 'El nombre del perfil es obligatorio',
        ];

        $validator = Validator::make($input, $rules, $messages);

        if ($validator->fails()) {
            Session::flash('error', 'El nombre del perfil es obligatorio');
            return redirect()->route('perfiles.index');
        }

        DB::beginTransaction();

        try {

            $rol = new Role();
            $rol->nombre = $nombre = \Helper::capitalizeFirst($request->nombre, "1");
            $rol->save();

            DB::commit();
            Session::flash('success', 'Rol registrado');

            return redirect()->route('perfiles.index');

        }catch (\PDOException $e){
            DB::rollBack();
            return back()->withErrors(['Error' => substr($e->getMessage(), 0, 150)]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $role)
    {
        $input = $request->all();

        $rules = [
            'nombre' => 'required',
        ];

        $messages = [
            'nombre.required'   => 'El nombre del perfil es obligatorio',
        ];

        $validator = Validator::make($input, $rules, $messages);

        if ($validator->fails()) {
            Session::flash('error', 'El nombre del perfil es obligatorio');
            return redirect()->route('perfiles.index');
        }

        DB::beginTransaction();

        try {

            $rol = Role::find($role);
            if ($rol) {
                $rol->nombre = $nombre = \Helper::capitalizeFirst($request->nombre, "1");
                $rol->save();
    
                DB::commit();
                Session::flash('success', '¡Rol actualizado!');
            } else {
                Session::flash('error', '¡Rol no encontrado!');
            }

            return redirect()->route('perfiles.index');

        }catch (\PDOException $e){
            DB::rollBack();
            return back()->withErrors(['Error' => substr($e->getMessage(), 0, 150)]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        //
    }
}
