<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:3'],
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O campo :attribute é obrigatório.',
            'email' => 'O email não é valido.',
            'min' => 'O campo :attribute deve ter no minimo 3 caracteres.',
        ];
    }

    public function attributes() 
    {
        return [
            'name' => 'usuario',
            'email' => 'email',
            'password' => 'senha'
        ];
    }
}
