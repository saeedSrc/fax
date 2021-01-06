<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUser;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use League\Flysystem\Config;

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUser $request)
    {
        User::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $phone
     * @return \Illuminate\Http\Response
     */
    public function sendAuthCode(Request $request)
    {
        if(!session('auth-code-expire-at') || (session('auth-code-expire-at') && session('auth-code-expire-at') < time() ) ) { // if code expires
            $code = rand(1001, 9999);
            $expire_at = time() + 16;
            session(['auth-code' => $code]);
            session(['auth-code-expire-at' => $expire_at]);
            // TODO send sms method here
        }

        return view('auth.phone_authorize');
    }


}
