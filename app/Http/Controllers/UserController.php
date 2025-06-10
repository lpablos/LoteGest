<?php

namespace App\Http\Controllers;

use DB, Session;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UsuarioDatosPersonales;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (view()->exists('pages.usuario.index')) {
            $usuarios = User::withTrashed()->leftJoin('cat_estatus', 'users.estatus_id', 'cat_estatus.id')
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
                                // dd( $usuarios);
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
        // dd($request->all());
        $input = $request->all();
        
        if ($request->rol_id = 1 || $request->rol_id = 2 || $request->rol_id = 3) {
            $rules = [
                'nombre' => 'required',
                'primer_apellido' => 'required',
                'email' => 'required',
                'telefono' => 'required',
                'fecha_nacimiento' => 'required',
                'fecha_inicio_laboral' => 'required'
            ];    
        }
        
        if ($request->rol_id = 4) {
            // dd('d');
                $rules = [
                    'nombre' => 'required',
                    'primer_apellido' => 'required',
                    'email' => 'required',
                    'telefono' => 'required'
                ];
        }

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            Session::flash('error', 'Campos obligatorios incompletos');
            return redirect()->route('usuarios.create');
        }

        DB::beginTransaction();

        try {
            $usuario = new User();
            $usuario->nombre = trim(\Helper::capitalizeFirst($request->nombre, "1"));
            $usuario->primer_apellido = \Helper::capitalizeFirst($request->primer_apellido, "1");
            $usuario->segundo_apellido = (!is_null($request->segundo_apellido) ? \Helper::capitalizeFirst($request->segundo_apellido, "1") : null );
            $usuario->email = $request->email;
            $usuario->email_verified_at = now();
            $usuario->password = Hash::make("12345678");
            $usuario->dob = '2024-04-01';
            $usuario->avatar = ($request->imagenPerfil == null) ? 'SIN INFORMACIÓN' : $request->imagenPerfil;
            $usuario->role_id = $request->rol_id;
            $usuario->fecha_registro = now();
            $usuario->estatus_id = 1;
            $usuario->save();

            $datosPersonales = new UsuarioDatosPersonales();
            $datosPersonales->telefono = ($request->telefono == null) ? 'SIN INFORMACIÓN' : $request->telefono ;
            $datosPersonales->edad = ($request->edad == null) ? 'SIN INFORMACIÓN' : $request->edad ;
            $datosPersonales->domicilio = ($request->domicilio == null) ? 'SIN INFORMACIÓN' : $request->domicilio ;
            $datosPersonales->enfermedades = ($request->enfermedades == null) ? 'SIN INFORMACIÓN' : $request->enfermedades ;
            $datosPersonales->fecha_nacimiento = $request->fecha_nacimiento;
            $datosPersonales->tipo_sangre = ($request->tipo_sangre == null) ? 'SIN INFORMACIÓN' : $request->tipo_sangre ;
            $datosPersonales->fecha_laboral = $request->fecha_inicio_laboral;
            $datosPersonales->num_contacto = ($request->num_contacto == null) ? 'SIN INFORMACIÓN' : $request->num_contacto ;
            $datosPersonales->parentesco = ($request->parentesco == null) ? 'SIN INFORMACIÓN' : $request->parentesco ;
            $datosPersonales->seudonimo = ($request->seudonimo == null) ? 'SIN INFORMACIÓN' : $request->seudonimo ;
            $datosPersonales->usuario_id = $usuario->id;
            $datosPersonales->save();
            

            DB::commit();

            Session::flash('success', '¡Usuario registrado!');
            return redirect()->route('usuarios.index');

        }catch (\PDOException $e){
            DB::rollBack();
            dd($e);
            return back()->withErrors(['Error' => substr($e->getMessage(), 0, 150)]);
        }
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
        $usuario = User::withTrashed()->select('id', 'nombre', 'primer_apellido', 'segundo_apellido', 'email', 'role_id', 'estatus_id')->where('id', $id)->first();
        $roles = Role::select('id', 'nombre')->get();

        return view('pages.usuario.edit', compact('usuario', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($id);
        $input = $request->all();

        $rules = [
            'nombre' => 'required',
            'primer_apellido' => 'required',
            'email' => 'required',
            'rol_id' => 'required'
        ];

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            Session::flash('error', 'Campos obligatorios incompletos');
            return redirect()->route('usuarios.create');
        }

        DB::beginTransaction();

        try {
            $usuario = User::find($id);
            if ($usuario) {
                $usuario->nombre = trim(\Helper::capitalizeFirst($request->nombre, "1"));
                $usuario->primer_apellido = \Helper::capitalizeFirst($request->primer_apellido, "1");
                $usuario->segundo_apellido = (!is_null($request->segundo_apellido) ? \Helper::capitalizeFirst($request->segundo_apellido, "1") : null );
                $usuario->email = $request->email;
                if ($request->password != null) {
                    $usuario->password = Hash::make($request->password);
                }
                $usuario->role_id = $request->rol_id;
                $usuario->save();
    
                DB::commit();
    
                Session::flash('success', '¡Usuario actualizado!');
            } else {
                Session::flash('error', '¡Usuario NO encontrado!');
            }
            return redirect()->route('usuarios.index');

        }catch (\PDOException $e){
            DB::rollBack();
            return back()->withErrors(['Error' => substr($e->getMessage(), 0, 150)]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $usuario = User::withTrashed()->where('id', $id)->first();
        $estatus = 0;

        if ($usuario != null) {
            if ($usuario->estatus_id == 1) {
                $estatus = 2;
                $msg = '¡Usuario desactivado!';
                $usuario->delete();
            } else {
                $estatus = 1;
                $usuario->deleted_at = null;
                $msg = '¡Usuario activado!';
            }
            $usuario->estatus_id = $estatus;
            $usuario->save();

            if ($usuario) {
                return response()->json(['code' => 200, 'msg' => $msg]);
            }
            return response()->json(['code' => 400, 'msg' => 'Ocurrió un error']);
        }
        return response()->json(['code' => 400, 'msg' => 'Rol no encontrado']);
    }
}
