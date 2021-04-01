<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Cookie;
use App\Models\RoundcubeAutoLogin;

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
//        $request->session()->forget('roundcube_sessid');
//        $request->session()->forget('roundcube_sessauth');
        Cookie::forget('roundcube_sessauth');
        Cookie::forget('roundcube_sessid');


        $rc = new RoundcubeAutoLogin(config('constants.ufax_domain'));
        $rc->logout();
        $this->middleware('guest')->except('logout');
    }
}
