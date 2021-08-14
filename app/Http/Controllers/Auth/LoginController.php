<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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
    // protected $redirectTo = RouteServiceProvider::HOME;

    public function validateLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $email = $request->email;
        $password = $request->password;

        if ($request->remember === null) {
            setcookie('email', $email, 100);
            setcookie('password', $password, 100);
        } else {
            setcookie('email', $email, time() + 60 * 60 * 24 * 100);
            setcookie('password', $password, time() + 60 * 60 * 24 * 100);
        }
    }

    public function redirectTo()
    {
        //SuperAdmin Login
        if (Auth::user()->role_as == 'superadmin') {
            return 'superadmin/dashboard';
        }

        //Admin Login
        if (Auth::user()->role_as == 'admin') {
            return 'admin/dashboard';
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
}
