<?php

namespace App\Http\Controllers;

use DB, Session;
use App\Models\User;
use App\Models\Compra;
use App\Models\Cliente;
use App\Helpers\Helper;
use App\Models\CatMunicipio;
use Illuminate\Http\Request;
use App\Models\Fraccionamiento;
use App\Models\CatEntidadFederativa;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

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

            $corredores = User::select('id', DB::raw('CONCAT(nombre, " ", primer_apellido) AS full_name'))->where('role_id', 4)->get();
            $estados = CatEntidadFederativa::select('id', 'nom_estado')->get();
            $mpios = CatMunicipio::select('id', 'nom_mpio')->get();
            $fraccionamientos = Fraccionamiento::select('id', 'nombre')->get();

            return view('pages.cliente.add', compact('corredores', 'estados', 'mpios', 'fraccionamientos'));
        }
        return abort(404);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
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
            if($request->identy){                
                $cliente = Cliente::find($request->identy);
            }else{
                $cliente = new Cliente();    
            }
            $cliente->no_cliente = $request->no_cliente;
            $cliente->nombre = Helper::capitalizeFirst($request->nombre);
            $cliente->primer_apellido = Helper::capitalizeFirst($request->primer_apellido);
            $cliente->segundo_apellido = Helper::capitalizeFirst($request->segundo_apellido);
            $cliente->telefono = $request->telefono;
            $cliente->fecha_nacimiento = $request->fecha_nacimiento;
            $cliente->email = $request->email;
            $cliente->num_contacto = $request->num_contacto;
            $cliente->parentesco = $request->parentesco;
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

            return response()->json([
                'status' => 'success',
                'message' => '¡Cliente registrado exitosamente!',
                'cliente' => $cliente,
            ]);

        }catch (\PDOException $e){
            DB::rollBack();
            Log::error("Error al guardar cliente: " . $e->getMessage());            
            return response()->json([
                'status' => 'error',
                'message' => 'Hubo un error al guardar el cliente.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        
        // $compras = Compra::leftJoin('users', 'compras.corredor_id', 'users.id')
        //                     ->select('compras.num_solicitud', 'compras.num_solicitud_sistema', DB::raw('CONCAT(users.nombre," ", users.primer_apellido) AS corredor'))
        //                     ->where('cliente_id', $cliente->id)
        //                     ->where('compras.estatus_id', 2)
        //                     ->get();
        $compras = Compra::with(['cliente','estatus','corredor'])
                    ->where('cliente_id', $cliente->id)
                    ->where('estatus_id', 2)
                    ->get();
        
        if (view()->exists('pages.cliente.compra.index')) {

            return view('pages.cliente.compra.index', compact('cliente', 'compras'));
        }
        return abort(404);
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

    public function verContrato($idCliente) {
        if (view()->exists('pages.cliente.contrato.index')) {

            return view('pages.cliente.contrato.index');
        }
        return abort(404);
    }

    public function continue($solicitudSys)
    {
        
        if (view()->exists('pages.cliente.add')) {

            $corredores = User::select('id', DB::raw('CONCAT(nombre, " ", primer_apellido) AS full_name'))->where('role_id', 4)->get();
            $estados = CatEntidadFederativa::select('id', 'nom_estado')->get();
            $mpios = CatMunicipio::select('id', 'nom_mpio')->get();
            $fraccionamientos = Fraccionamiento::select('id', 'nombre')->get();

            $datosCompra = Compra::where('num_solicitud_sistema',$solicitudSys)->with([
                            'corredor',
                            'estado',
                            'municipio',
                            'fraccionamiento',
                            'cliente',
                            'compralotelinderos.lindero',
                            'compralotelinderos.lote.manzana',
                            'contrato'
                        ])->get();

                        // dd($datosCompra);
                // dd($datosCompra);
            return view('pages.cliente.add', compact('corredores', 'estados', 'mpios', 'fraccionamientos', 'datosCompra'));
        }
        return abort(404);
    }


    public function nuevaCompra($idCliente)
    {
        
        if (view()->exists('pages.cliente.add')) {

            $corredores = User::select('id', DB::raw('CONCAT(nombre, " ", primer_apellido) AS full_name'))->where('role_id', 4)->get();
            $estados = CatEntidadFederativa::select('id', 'nom_estado')->get();
            $mpios = CatMunicipio::select('id', 'nom_mpio')->get();
            $fraccionamientos = Fraccionamiento::select('id', 'nombre')->get();
            $datosCliente = Cliente::find($idCliente);
            
            return view('pages.cliente.add', compact('corredores', 'estados', 'mpios', 'fraccionamientos','datosCliente'));
        }
        return abort(404);
    }
}
