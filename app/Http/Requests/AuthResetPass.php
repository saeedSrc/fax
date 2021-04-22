<?php

namespace App\Http\Requests;

use App\Http\Controllers\UserController;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AuthResetPass extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $code = app('App\Http\Controllers\UserController')->getSession('authentication_code');
        $expired_time = app('App\Http\Controllers\UserController')->getSession('auth_code_expired_at');
        return [
            'reset_pass_code' => ['required',  Rule::in([$code])],
            'auth_code_time_sent' =>["lt: $expired_time"],
            'reset_password' => ['required', 'min:6', 'is_not_persian', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/'],
        ];
    }
}
