<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        // 🔹 Modificar sesión
        Session::put('role_id', $user->role_id);
        Session::put('tipo', $user->nombre);
        Session::put('nombre_usuario', $user->name);

        // 🔹 Redireccionar según rol

        return match ($user->role_id) {
            1 => redirect()->route('fraccionamiento.index'),
            2 => redirect()->route('fraccionamiento.index'),
            3 => redirect()->route('cliente.index'),
            4 => redirect()->route('cliente.index'),
            default => redirect()->route('login'),
        };       
    }
}
