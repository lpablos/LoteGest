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
            $usuarios = User::withTrashed()
                            ->leftJoin('cat_estatus', 'users.estatus_id', 'cat_estatus.id')
                            ->leftJoin('roles', 'users.role_id', 'roles.id')
                            ->select(
                                'users.id',
                                'users.nombre',
                                'users.primer_apellido',
                                'users.segundo_apellido',
                                'users.email',
                                'users.fecha_registro',
                                'users.estatus_id',
                                'users.updated_at',
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
        $input = $request->all();

        $rules = [
            'nombre' => 'required',
            'primer_apellido' => 'required',
            'email' => 'required|email|unique:users,email',
            'telefono' => 'required',
        ];

        $messages = [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'primer_apellido.required' => 'El primer apellido es obligatorio.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico no tiene un formato válido.',
            'email.unique' => 'El correo electrónico ya está registrado, intenta con otro.',
            'telefono.required' => 'El número de teléfono es obligatorio.',
        ];
        
        $validator = Validator::make($input, $rules, $messages);

        if ($validator->fails()) {
            $mensaje = $validator->errors()->first(); // toma el primer mensaje personalizado
            Session::flash('error', $mensaje);
            return redirect()->route('usuarios.create')->withInput();
        }

        DB::beginTransaction();
            if (isset($request->imagenPerfil)) {
                if ($request->hasFile('imagenPerfil')) {
                    $file = $request->file('imagenPerfil');
                    $filename = 'perfil_' . time() . '.' . $file->getClientOriginalExtension();
                    $path = $file->storeAs('usuarios', $filename, 'public');
                } 
            }

        try {
            $usuario = new User();
            $usuario->nombre = trim(\Helper::capitalizeFirst($request->nombre, "1"));
            $usuario->primer_apellido = \Helper::capitalizeFirst($request->primer_apellido, "1");
            $usuario->segundo_apellido = (!is_null($request->segundo_apellido) ? \Helper::capitalizeFirst($request->segundo_apellido, "1") : null );
            $usuario->email = $request->email;
            $usuario->email_verified_at = now();
            $usuario->password = Hash::make("12345678");
            $usuario->dob = '2024-04-01';
            $usuario->avatar = ($request->imagenPerfil == null) ? 'SIN INFORMACIÓN' : $path;
            $usuario->role_id = $request->rol_id;
            $usuario->fecha_registro = now();
            $usuario->telefono = ($request->telefono == null) ? 'SIN INFORMACIÓN' : $request->telefono;
            $usuario->seudonimo = ($request->seudonimo == null) ? 'SIN INFORMACIÓN' : $request->seudonimo;
            $usuario->estatus_id = 1;
            $usuario->save();

            if ($request->rol_id != 4) {    
                $datosPersonales = new UsuarioDatosPersonales();
                $datosPersonales->edad = ($request->edad == null) ? 'SIN INFORMACIÓN' : $request->edad;
                $datosPersonales->domicilio = ($request->domicilio == null) ? 'SIN INFORMACIÓN' : $request->domicilio;
                $datosPersonales->enfermedades = ($request->enfermedades == null) ? 'SIN INFORMACIÓN' : $request->enfermedades;
                $datosPersonales->fecha_nacimiento = $request->fecha_nacimiento;
                $datosPersonales->tipo_sangre = ($request->tipo_sangre == null) ? 'SIN INFORMACIÓN' : $request->tipo_sangre;
                $datosPersonales->fecha_laboral = $request->fecha_inicio_laboral;
                $datosPersonales->num_contacto = ($request->num_contacto == null) ? 'SIN INFORMACIÓN' : $request->num_contacto;
                $datosPersonales->parentesco = ($request->parentesco == null) ? 'SIN INFORMACIÓN' : $request->parentesco;
                $datosPersonales->usuario_id = $usuario->id;
                $datosPersonales->save();
            }

            DB::commit();

            Session::flash('success', '¡Usuario registrado exitosamente!');
            return redirect()->route('usuarios.index');

        } catch (\PDOException $e) {
            DB::rollBack();

            $error = $e->getMessage();
            dd($error);
            if (str_contains($error, 'Duplicate entry') && str_contains($error, 'users_email_unique')) {
                // Mensaje claro para toastr
                Session::flash('error', 'El correo ingresado ya está registrado. Por favor usa uno diferente.');
            } else {
                // Mensaje genérico si es otro error
                Session::flash('error', 'Ocurrió un error al registrar el usuario: ' . substr($error, 0, 150));
            }

            return redirect()->route('usuarios.create')->withInput();
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
        $usuario = User::withTrashed()->leftJoin('usuario_datos_personales as udp', 'users.id', 'udp.usuario_id', )
                                    ->select(
                                                'users.id',
                                                'users.nombre',
                                                'users.primer_apellido',
                                                'users.segundo_apellido',
                                                'users.email',
                                                'users.role_id',
                                                'users.estatus_id',
                                                'users.telefono',
                                                'users.seudonimo',
                                                'udp.edad',
                                                'udp.domicilio',
                                                'udp.enfermedades',
                                                'udp.fecha_nacimiento',
                                                'udp.tipo_sangre',
                                                'udp.fecha_laboral',
                                                'udp.num_contacto',
                                                'udp.parentesco',
                                            )->where('users.id', $id)->first();
        // dd($usuario);
        $roles = Role::select('id', 'nombre')->get();

        return view('pages.usuario.edit', compact('usuario', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, string $id)
    // {
    //     $input = $request->all();

    //     $rules = [
    //         'nombre' => 'required',
    //         'primer_apellido' => 'required',
    //         'email' => 'required|email|unique:users,email,' . $id, // 👈 Evita duplicados
    //         'telefono' => 'required'
    //     ];

    //     $messages = [
    //         'nombre.required' => 'El campo nombre es obligatorio.',
    //         'primer_apellido.required' => 'El primer apellido es obligatorio.',
    //         'email.required' => 'El correo electrónico es obligatorio.',
    //         'email.email' => 'El correo electrónico no tiene un formato válido.',
    //         'email.unique' => 'El correo electrónico ya está registrado, intenta con otro.',
    //         'telefono.required' => 'El número de teléfono es obligatorio.',
    //     ];
        
    //     $validator = Validator::make($input, $rules, $messages);

    //     if ($validator->fails()) {
    //         $mensaje = $validator->errors()->first(); // toma el primer mensaje personalizado
    //         Session::flash('error', $mensaje);
    //         return redirect()->route('usuarios.create')->withInput();
    //     }

    //     DB::beginTransaction();

    //     try {
    //         $usuario = User::find($id);

    //         if ($usuario) {

    //             // === Actualizar datos del usuario ===
    //             $usuario->nombre = trim(\Helper::capitalizeFirst($request->nombre, "1"));
    //             $usuario->primer_apellido = \Helper::capitalizeFirst($request->primer_apellido, "1");
    //             $usuario->segundo_apellido = (!is_null($request->segundo_apellido) 
    //                 ? \Helper::capitalizeFirst($request->segundo_apellido, "1") 
    //                 : null
    //             );

    //             $usuario->email = $request->email;

    //             if ($request->password != null) {
    //                 $usuario->password = Hash::make($request->password);
    //             }

    //             $usuario->telefono = $request->telefono ?? 'SIN INFORMACIÓN';
    //             $usuario->seudonimo = $request->seudonimo ?? 'SIN INFORMACIÓN';
    //             $usuario->save();


    //             // === Actualizar datos personales si el rol lo requiere ===
    //             if ($usuario->role_id != 4) {

    //                 $datosPersonales = UsuarioDatosPersonales::where('usuario_id', $usuario->id)->first();

    //                 if ($datosPersonales) {
    //                     $datosPersonales->edad = $request->edad ?? 'SIN INFORMACIÓN';
    //                     $datosPersonales->domicilio = $request->domicilio ?? 'SIN INFORMACIÓN';
    //                     $datosPersonales->enfermedades = $request->enfermedades ?? 'SIN INFORMACIÓN';
    //                     $datosPersonales->fecha_nacimiento = $request->fecha_nacimiento;
    //                     $datosPersonales->tipo_sangre = $request->tipo_sangre ?? 'SIN INFORMACIÓN';
    //                     $datosPersonales->fecha_laboral = $request->fecha_inicio_laboral;
    //                     $datosPersonales->num_contacto = $request->num_contacto ?? 'SIN INFORMACIÓN';
    //                     $datosPersonales->parentesco = $request->parentesco ?? 'SIN INFORMACIÓN';
    //                     $datosPersonales->save();
    //                 }
    //             }

    //             DB::commit();
    //             Session::flash('success', '¡Usuario actualizado exitosamente!');

    //         } else {

    //             DB::rollBack();
    //             Session::flash('error', 'Error: el usuario no fue encontrado.');
    //         }

    //         return redirect()->route('usuarios.index');

    //     } catch (\PDOException $e) {
    //         DB::rollBack();

    //         Session::flash('error', 'Ocurrió un error al actualizar el usuario. Intente nuevamente.');

    //         // Opcional: guardar en logs
    //         // Log::error($e->getMessage());

    //         return redirect()->route('usuarios.edit', ["usuario" => $id])->withInput();
    //     }
    // }
    
    public function update(Request $request, string $id)
    {
        $input = $request->all();

        // === VALIDACIÓN ===
        $rules = [
            'nombre'           => 'required',
            'primer_apellido'  => 'required',
            'email'            => 'required|email|unique:users,email,' . $id,
            'telefono'         => 'required',
        ];

        $messages = [
            'nombre.required'          => 'El nombre es obligatorio.',
            'primer_apellido.required' => 'El primer apellido es obligatorio.',
            'email.required'           => 'El correo electrónico es obligatorio.',
            'email.email'              => 'El correo electrónico no tiene un formato válido.',
            'email.unique'             => 'El correo electrónico ya está registrado.',
            'telefono.required'        => 'El número de teléfono es obligatorio.',
        ];

        $validator = Validator::make($input, $rules, $messages);

        if ($validator->fails()) {
            $mensaje = $validator->errors()->first();
            Session::flash('error', $mensaje);

            return redirect()
                ->route('usuarios.edit', ['usuario' => $id]) // 👈 REGRESAR A EDIT
                ->withInput();
        }

        // === INICIA TRANSACCIÓN ===
        DB::beginTransaction();

        try {
            $usuario = User::find($id);

            if (!$usuario) {
                DB::rollBack();
                Session::flash('error', 'El usuario no fue encontrado.');
                return redirect()->route('usuarios.index');
            }

            // === ACTUALIZAR DATOS ===
            $usuario->nombre = trim(\Helper::capitalizeFirst($request->nombre, "1"));
            $usuario->primer_apellido = \Helper::capitalizeFirst($request->primer_apellido, "1");
            $usuario->segundo_apellido = $request->segundo_apellido
                ? \Helper::capitalizeFirst($request->segundo_apellido, "1")
                : null;

            $usuario->email = $request->email;

            if ($request->password) {
                $usuario->password = Hash::make($request->password);
            }

            $usuario->telefono = $request->telefono ?? 'SIN INFORMACIÓN';
            $usuario->seudonimo = $request->seudonimo ?? 'SIN INFORMACIÓN';
            $usuario->save();

            // === ACTUALIZAR DATOS PERSONALES (SI NO ES CLIENTE) ===
            if ($usuario->role_id != 4) {
                $datosPersonales = UsuarioDatosPersonales::where('usuario_id', $usuario->id)->first();
                
                if ($datosPersonales) {
                    $datosPersonales->edad             = $request->edad ?? 'SIN INFORMACIÓN';
                    $datosPersonales->domicilio        = $request->domicilio ?? 'SIN INFORMACIÓN';
                    $datosPersonales->enfermedades     = $request->enfermedades ?? 'SIN INFORMACIÓN';
                    $datosPersonales->fecha_nacimiento = $request->fecha_nacimiento;
                    $datosPersonales->tipo_sangre      = $request->tipo_sangre ?? 'SIN INFORMACIÓN';
                    $datosPersonales->fecha_laboral    = $request->fecha_inicio_laboral;
                    $datosPersonales->num_contacto     = $request->num_contacto ?? 'SIN INFORMACIÓN';
                    $datosPersonales->parentesco       = $request->parentesco ?? 'SIN INFORMACIÓN';
                    $datosPersonales->save();
                }
            }

            DB::commit();
            Session::flash('success', '¡Usuario actualizado exitosamente!');

            return redirect()->route('usuarios.index');

        } catch (\PDOException $e) {

            DB::rollBack();
            Session::flash('error', 'Ocurrió un error al actualizar el usuario. Intente nuevamente.');

            // Log::error($e->getMessage());

            return redirect()
                ->route('usuarios.edit', ['usuario' => $id])
                ->withInput();
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
