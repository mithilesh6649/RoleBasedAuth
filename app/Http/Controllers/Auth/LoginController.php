<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        if (auth()->check() && auth()->user()->role == 1) {
            $this->redirectTo = route("employe.dashboard");
        } elseif (auth()->check() && auth()->user()->role == 2) {
            $this->redirectTo = route("employer.dashboard");
        }
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
}
