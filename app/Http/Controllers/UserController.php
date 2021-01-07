<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthCode;
use App\Http\Requests\StoreUser;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use League\Flysystem\Config;
use PHPUnit\TextUI\XmlConfiguration\Constant;
use Psy\TabCompletion\Matcher\ConstantsMatcher;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        session(['register-done' => null]);
        session(['auth-req-done' => 'true']);
        session(['auth-done' => 'true']);
        session(['register-form' => true]);
        session(['auth-req-form' => null]);
        session(['auth-form' => null]);
        return view('users.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUser $request)
    {
        User::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Send auth code to user.
     *
     * @param  int $phone
     * @return \Illuminate\Http\Response
     */
    public function PostPhoneAuthenticationForm(Request $request)
    {
        if (!$this->getSession('auth_code_expired_at') || ( $this->getSession('auth_code_expired_at') && $this->getSession('auth_code_expired_at') < time())) { // if code expires
            $code = rand(1001, 9999);
            $expire_at = time() + config('constants.auth_code_expire_time');
            $this->setSession('authentication_code', $code);
            $this->setSession('auth_code_expired_at', $expire_at);
            // TODO send sms method here
        }

        return view('auth.phone_authorize')->with("remaining_time", $this->getRemainingSessionTime('auth_code_expired_at'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $phone
     * @return \Illuminate\Http\Response
     */
    public function GetPhoneAuthenticationForm(Request $request)
    {
        return view('auth.phone_authorize')->with("remaining_time", $this->getRemainingSessionTime('auth_code_expired_at'));
    }

    /**
     * Final rule for user Authentication.
     *
     * @param  int $phone
     * @return \Illuminate\Http\Response
     */
    public function FinalAuthenticate(AuthCode $request)
    {
//        dd(Auth::user()->id);
        User::where('id', Auth::user()->id)->update(['auth_check'=> 1]);
        return redirect('/');

    }

    /**
     * Set user session
     *
     */
    public function setSession($key, $val)
    {
        $key = 'constants.' . $key;
        session([config($key) => $val]);
    }

    /**
     * Get user session.
     *
     */
    public function getSession($key)
    {
        $key = 'constants.' . $key;
       return session(config($key));
    }

    /**
     * Get user remaining session time
     *
     */
    public function getRemainingSessionTime ($key)
    {
        $sessionTime = $this->getSession($key);
        $remainingTime = $sessionTime - time();
        if ($remainingTime < 0) {
            return "00:00";
        }
        return intval($remainingTime / 60) . ':' . intval($remainingTime % 60);
    }
}
