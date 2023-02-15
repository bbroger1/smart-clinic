<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'email' => ['required', 'email'],
            'password' => ['required'],
        ];
    }

    public function messages() 
    {
        return [
            'required' => 'O campo :attribute é obrigatório.',
            'email' => 'O valor do campo email é inválido.',
        ];
    }

    public function attributes() 
    {
        return [
            'email' => 'email',
            'password' => 'senha',
        ];
    }
}
