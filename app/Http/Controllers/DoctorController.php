<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Genre;
use App\Models\Area;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

use Illuminate\Support\Facades\DB;

use App\Http\Requests\StoreDoctor;

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

        $view = $request->get('view');
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


    public function create(StoreDoctor $request) 
    {   
        $user = Doctor::create($request->validated());
        return redirect()->route('app.register-doctor', ['op' => 'success']);
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
