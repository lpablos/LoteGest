<?php

namespace App\Http\Controllers;

use DB;
use App\Models\User;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.cliente.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (view()->exists('pages.cliente.add')) {

            $corredores = User::select('id', DB::raw('CONCAT(nombre, primer_apellido) AS full_name'))->where('role_id', 4)->get();

            return view('pages.cliente.add', compact('corredores'));
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
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        //
    }
}
