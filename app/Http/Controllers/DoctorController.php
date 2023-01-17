<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Doctor;
use App\Models\Genre;
use App\Models\Area;
use App\Http\Requests\StoreDoctor;

class DoctorController extends Controller
{
    protected Doctor $doctor;
    protected Genre $genre;
    protected Area $area;


    function __construct(Doctor $doctor, Genre $genre, Area $area)
    {
        $this->doctor = $doctor;
        $this->genre = $genre;
        $this->area = $area;
    }


    public function all(Request $request)
    {
        $page = $request->get('page') ? $request->get('page') - 1 : 0;
        $view = $request->get('view');

        $doctors = $this->doctor->getAllDoctors($page);

        return view('app.doctors', compact(['doctors', 'view']));
    }

    
    public function index(Request $request)
    {
        return view('app.register-doctor', [
            'op'       => $request->get('op'), 
            'message'  => $request->get('message'), 
            'genres'   => $this->genre->getAllGenres(), 
            'areas'    => $this->area->getAllAreas()
        ]);
    }


    public function create(StoreDoctor $request) 
    {   
        $this->doctor->create($request->validated());

        return redirect()->route('app.register-doctor', [
            'op' => 'success', 
            'message' => 'Dados do medico cadastrado com sucesso.'
        ]);
    }


    public function delete(Request $request)
    {
        $this->doctor->deleteDoctorWithId($request->get('id'));
        return redirect()->route('app.doctors');
    }


    public function reactivate(Request $request)
    {
        $this->doctor->reactivateDoctorWithId($request->get('id'));
        return redirect()->route('app.doctors');
    }
}
