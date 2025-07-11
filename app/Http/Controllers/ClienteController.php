<?php

namespace App\Http\Controllers;

use DB, Session;
use App\Models\User;
use App\Models\Cliente;
use App\Models\CatMunicipio;
use App\Models\CatEntidadFederativa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Cliente::select('id', 'nombre', 'primer_apellido', 'segundo_apellido', 'created_at')->get();

        return view('pages.cliente.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (view()->exists('pages.cliente.add')) {

            $corredores = User::select('id', DB::raw('CONCAT(nombre, primer_apellido) AS full_name'))->where('role_id', 4)->get();
            $estados = CatEntidadFederativa::select('id', 'nom_estado')->get();
            $mpios = CatMunicipio::select('id', 'nom_mpio')->get();

            return view('pages.cliente.add', compact('corredores', 'estados', 'mpios'));
        }
        return abort(404);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd("Aqui entra ",$request->all());


        $input = $request->all();

        $rules = [
            'nombre' => 'required',
            'primer_apellido' => 'required',
            'fecha_nacimiento' => 'required'
        ];

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            Session::flash('error', 'Campos obligatorios incompletos');
            return redirect()->route('cliente.create');
        }

        DB::beginTransaction();

        try {
            $cliente = new Cliente();

            $cliente->nombre = trim(\Helper::capitalizeFirst($request->nombre, "1"));
            $cliente->primer_apellido = \Helper::capitalizeFirst($request->primer_apellido, "1");
            $cliente->segundo_apellido = (!is_null($request->segundo_apellido) ? \Helper::capitalizeFirst($request->segundo_apellido, "1") : null );
            $cliente->telefono = ($request->telefono == null) ? "Sin Información" : $request->telefono ;
            $cliente->fecha_nacimiento = $request->fecha_nacimiento;
            $cliente->email = $request->email;
            $cliente->num_contacto = ($request->num_contacto == null) ? "Sin Información" : $request->num_contacto;
            $cliente->parentesco = ($request->parentesco == null) ? "Sin Información" : $request->parentesco;
            if ($request->hasFile('fileIne')) {
                    $file = $request->file('fileIne');
                    $filename = 'ine_' . time() . '.' . $file->getClientOriginalExtension(); // ejemplo: ine_1717288000.jpg
                    $path = $file->storeAs('cliente', $filename, 'public');
            } else {
                $path = null;
            }
            $cliente->url_ine = $path;
            $cliente->save();

            DB::commit();

            Session::flash('success', '¡Cliente registrado!');
            return redirect()->route('cliente.index');

        }catch (\PDOException $e){
            DB::rollBack();
            dd($e);
            return back()->withErrors(['Error' => substr($e->getMessage(), 0, 150)]);
        }
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
        if (view()->exists('pages.cliente.edit')) {

            return view('pages.cliente.edit', compact('cliente'));
        }
        return abort(404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente)
    {
        $input = $request->all();

        $rules = [
            'nombre' => 'required',
            'primer_apellido' => 'required',
            'fecha_nacimiento' => 'required'
        ];

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            Session::flash('error', 'Campos obligatorios incompletos');
            return redirect()->route('cliente.create');
        }

        DB::beginTransaction();

        try {
            $cliente = Cliente::find($cliente->id);

            $cliente->nombre = trim(\Helper::capitalizeFirst($request->nombre, "1"));
            $cliente->primer_apellido = \Helper::capitalizeFirst($request->primer_apellido, "1");
            $cliente->segundo_apellido = (!is_null($request->segundo_apellido) ? \Helper::capitalizeFirst($request->segundo_apellido, "1") : null );
            $cliente->telefono = ($request->telefono == null) ? "Sin Información" : $request->telefono ;
            $cliente->fecha_nacimiento = $request->fecha_nacimiento;
            $cliente->email = $request->email;
            $cliente->num_contacto = ($request->num_contacto == null) ? "Sin Información" : $request->num_contacto;
            $cliente->parentesco = ($request->parentesco == null) ? "Sin Información" : $request->parentesco;
            if ($request->hasFile('fileIne')) {
                    $file = $request->file('fileIne');
                    $filename = 'ine_' . time() . '.' . $file->getClientOriginalExtension(); // ejemplo: ine_1717288000.jpg
                    $path = $file->storeAs('cliente', $filename, 'public');
            } else {
                $path = null;
            }
            $cliente->url_ine = $path;
            $cliente->save();

            DB::commit();

            Session::flash('success', '¡Cliente actualizado!');
            return redirect()->route('cliente.index');

        }catch (\PDOException $e){
            DB::rollBack();
            dd($e);
            return back()->withErrors(['Error' => substr($e->getMessage(), 0, 150)]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        //
    }
}
