<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Genre;
use App\Models\Area;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

use Illuminate\Support\Facades\DB;

class DoctorController extends Controller
{
    public function all(Request $request)
    {
        $page = $request->get('page') ? $request->get('page') - 1 : 0;

        $doctors = DB::table('doctors')
            ->join('areas', 'doctors.area', '=', 'areas.id')
            ->join('genres', 'doctors.genre', '=', 'genres.id')
            ->select('doctors.*', 'areas.area', 'genres.genre')
            ->skip(12 * $page)
            ->take(12)
            ->get();

        $view = ($request->get('view') - 1) % 12;
        return view('app.doctors', compact(['doctors', 'view']));
    }

    
    public function index(Request $request)
    {
        $op = $request->get('op');
        $message = '';

        if (!strcmp($op, 'success'))
            $message = 'Dados do medico cadastrado com sucesso.';

        else
            $message = 'Erro ao cadastrar os dados do medico.';


        $genres = Genre::all();
        $areas = Area::all();
        return view('app.register-doctor', compact(['op', 'message', 'genres', 'areas']));
    }


    public function create(Request $request) 
    {
        $validate = [
            'name'        => 'required|max:20',
            'lastName'    => 'required|max:20',
            'phoneNumber' => 'required|regex:/\(\d{2}\) \d{5}-\d{4}/',
            'cpf'         => 'required|regex:/(\d{3}\.){2}\d{3}-\d{2}/',
            'genre'       => 'required',
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


    public function delete(Request $request)
    {
        $id = $request->get('id');
        Doctor::find($id)->delete();
        return redirect()->route('app.doctors');
    }

    public function reactivate(Request $request)
    {
        $id = $request->get('id');
        Doctor::where('id', $id)->restore();
        return redirect()->route('app.doctors');
    }
}
