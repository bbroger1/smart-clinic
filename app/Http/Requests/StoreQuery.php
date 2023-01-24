<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuery extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name'    => ['required', 'min:3', 'max:40'],
            'time'    => ['required'],
            'date'    => ['required', 'date_format:Y-m-d'],
            'email'   => ['required', 'email'],
            'genre'   => ['required', 'exists:genres,id'],
            'doctor'  => ['required', 'exists:areas,id'],
            'message' => ['required', 'max:200'],
        ];
    }


    public function messages()
    {
        return [
            'required' => 'O campo :attribute é obrigatorio.',
            'exists'   => 'Valor de :attribute é invalido.',

            'date.date_format' => 'O campo de data não é valido.',
            'email.email' => 'O email informado não é valido.',
            'name.min'    => 'O campo nome deve ter no minimo 3 caracteres',
            'name.max'    => 'O campo nome deve ter no maximo 40 caracteres.',
            'message.max' => 'O campo deve ter no maximo 200 caracteres',
        ];
    }


    public function attributes()
    {
        return [
            'name'    => 'nome',
            'time'    => 'horario',
            'date'    => 'data',
            'email'   => 'email',
            'genre'   => 'genero',
            'doctor'  => 'doutor',
            'message' => 'mensagem',
        ];
    }
}
