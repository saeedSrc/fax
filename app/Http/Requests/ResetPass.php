<?php

namespace App\Http\Requests;

use App\Common\Common;
use Illuminate\Foundation\Http\FormRequest;

class ResetPass extends FormRequest
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
        $common = new Common();
        $this->phone = $common->convert($this->phone);
        return [
            'phone' => ['required', 'exists:users,phone'],
        ];
    }
}
