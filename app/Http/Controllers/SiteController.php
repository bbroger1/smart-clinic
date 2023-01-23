<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;
use App\Models\Doctor;

use App\Http\Requests\GetAreasDoctors;

class SiteController extends Controller
{
    protected Area $area;
    protected Doctor $doctor;

    public function __construct(Area $area, Doctor $doctor)
    {
        $this->area = $area;
        $this->doctor = $doctor;
    }

    public function step01()
    {
        return view('site.index', [
            'areaOptions' => $this->area->getAllAreas(),
        ]);
    }

    public function step02(GetAreasDoctors $request) 
    {
        $request->validated();

        return view('site.index', [
            'doctors' => $this->doctor->getDoctorsWithArea($request->get('area'))
        ]);
    }
}
