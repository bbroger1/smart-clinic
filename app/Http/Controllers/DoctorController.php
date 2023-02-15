<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Doctor;
use App\Models\Genre;
use App\Models\Area;

use App\Http\Requests\StoreDoctor;
use App\Http\Requests\DoctorParams;

class DoctorController extends Controller
{
    protected Doctor $doctor;
    protected Genre $genre;
    protected Area $area;


    function __construct(Doctor $doctor, Genre $genre, Area $area)
    {
        $this->doctor = $doctor;
        $this->genre  = $genre;
        $this->area   = $area;
    }


    public function all(Request $request)
    {
        return view('app.doctor.index', [
            'doctors' => $this->doctor->getAllDoctors(), 
            'view' => $request->get('view')
        ]);
    }

    
    public function index(Request $request)
    {
        return view('app.doctor.create', [
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

    public function edit(int $id)
    {
        return view('app.doctor.edit', [
            'doctor'   => $this->doctor->findDoctor($id),
            'genres'   => $this->genre->getAllGenres(), 
            'areas'    => $this->area->getAllAreas()
        ]);
    }

    public function update(StoreDoctor $request, int $id)
    {
        $this->doctor->updateDoctor($request->validated(), $id);
        return redirect()->route('app.doctors');
    }
}
