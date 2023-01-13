<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class DoctorController extends Controller
{
    public function index(Request $request)
    {
        $op = $request->get('op');
        $message = '';

        if (!strcmp($op, 'success'))
            $message = 'Dados do medico cadastrado com sucesso.';

        else
            $message = 'Erro ao cadastrar os dados do medico.';

        return view('app.register-doctor', compact(['op', 'message']));
    }


    public function create(Request $request) 
    {
        $validate = [
            'name'        => 'required|max:20',
            'lastName'    => 'required|max:20',
            'phoneNumber' => 'required|regex:/\(\d{2}\) \d{5}-\d{4}/',
            'cpf'         => 'required|regex:/(\d{3}\.){2}\d{3}-\d{2}/',
            'sexo'        => 'required',
            'city'        => 'required',
            'uf'          => 'required|max:2',
            'area'        => 'required'
        ];

        $feedbacks = [
            'required' => 'O campo :attribute é obrigatório.',

            'name.max' => 'O campo nome deve ter no máximo 20 caracteres.',
            'lastName.max' => 'O campo sobrenome deve ter no máximo 20 caracteres.',
            'uf.max' => 'O campo estado deve ter no máximo 2 caracteres.',
            'phoneNumber.regex' => 'O campo telefone não corresponde ao padrão (00) 00000-0000.',
            'cpf.regex' => 'O campo cpf deve corresponder ao padrão 000.000.000-00.'
        ];

        $request->validate($validate, $feedbacks);
        
        try {
            $user = Doctor::create($request->all());
            return redirect()->route('app.register-doctor', ['op' => 'success']);
        } catch (QueryException $err) {
            return redirect()->route('app.register-doctor', ['op' => 'error']);
        }
    }
}
