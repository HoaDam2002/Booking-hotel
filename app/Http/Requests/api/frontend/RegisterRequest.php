<?php

namespace App\Http\Requests\api\frontend;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.\@return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules()
    {
        return [
            'name'=>'required|max:191',
            'password'=>'required|confirmed|min:6',
            'email' => 'required|email|unique:users',
        ];
    }

    public function attributes(){
        return[
            'name' => 'Your name',
            'email' => 'Your email address',
            'password' => 'Password',
        ];
    }
}
