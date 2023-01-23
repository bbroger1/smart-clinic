<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GetAreasDoctors extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'area' => ['required', 'integer', 'exists:areas,id'],
        ];
    }


    public function messages()
    {
        return [
            'required' => 'O campo :attribute é obrigatório.',
            'integer'  => 'O campo deve ter um valor inteiro.',
            'exists'   => 'O valor do campo :attribute não é valido.'
        ];
    }

    public function attributes()
    {
        return [
            'area' => 'area de atuação'
        ];
    }
}
