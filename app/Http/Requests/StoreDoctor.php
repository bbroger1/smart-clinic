<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDoctor extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'        => ['required', 'max:20'],
            'lastName'    => ['required', 'max:20'],
            'phoneNumber' => ['required', 'regex:/\(\d{2}\) \d{5}-\d{4}/'],
            'cpf'         => ['required', 'regex:/(\d{3}\.){2}\d{3}-\d{2}/'],
            'genre'       => ['required', 'exists:genres,id'],
            'city'        => ['required'],
            'uf'          => ['required', 'max:2'],
            'area'        => ['required', 'exists:areas,id']
        ];
    }

    public function messages() 
    {
        return [
            'required'           => 'O campo :attribute é obrigatório.',
            'exists'             => 'O valor do campo é invalido',
            'name.max'           => 'O campo nome deve ter no máximo 20 caracteres.',
            'lastName.max'       => 'O campo sobrenome deve ter no máximo 20 caracteres.',
            'uf.max'             => 'O campo estado deve ter no máximo 2 caracteres.',
            'phoneNumber.regex'  => 'O campo telefone não corresponde ao padrão (00) 00000-0000.',
            'cpf.regex'          => 'O campo cpf deve corresponder ao padrão 000.000.000-00.',
        ];
    }

    public function attributes()
    {
        return [
            'name'        => 'nome',
            'lastName'    => 'sobrenome',
            'phoneNumber' => 'telefone',
            'genre'       => 'genero',
            'city'        => 'cidade',
            'uf'          => 'estado',
        ];
    }
}
