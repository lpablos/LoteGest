<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (view()->exists('pages.usuario.index')) {
            $usuarios = User::leftJoin('cat_estatus', 'users.estatus_id', 'cat_estatus.id')
                            ->leftJoin('roles', 'users.role_id', 'roles.id')
                            ->select(
                                'users.id',
                                'users.nombre',
                                'users.primer_apellido',
                                'users.segundo_apellido',
                                'users.email',
                                'users.fecha_registro',
                                'users.estatus_id',
                                'cat_estatus.nombre as estatus',
                                'roles.nombre as rol',
                            )->orderByDesc('id')
                            ->get();

            return view('pages.usuario.index', compact('usuarios'));
        }
        return abort(404);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (view()->exists('pages.usuario.add')) {
            
            $roles = Role::select('id', 'nombre')->get();

            return view('pages.usuario.add', compact('roles'));
        }
        return abort(404);
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
