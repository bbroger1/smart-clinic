<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;
use App\Models\Doctor;
use App\Models\Genre;
use App\Models\Query;
use App\Models\Notification;

use App\Http\Requests\GetAreasDoctors;
use App\Http\Requests\StoreQuery;

class SiteController extends Controller
{
    protected Area $area;
    protected Doctor $doctor;
    protected Genre $genre;
    protected Query $query;
    protected Notification $notification;

    public function __construct(Area $area, Genre $genre, Doctor $doctor, Query $query, Notification $notification)
    {
        $this->area = $area;
        $this->genre = $genre;
        $this->doctor = $doctor;
        $this->query = $query;
        $this->notification = $notification;
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
            'doctors' => $this->doctor->getDoctorsWithArea($request->get('area')),
            'genres'  => $this->genre->getAllGenres(),
        ]);
    }


    public function create(StoreQuery $request)
    {
        $validatedDate = $request->validated();

        $this->query->store($validatedDate);
        $this->notification->store("O cliente " . $validatedDate['name'] . " quer agendar uma consulta(" . $validatedDate["date"] . ").");
    }
}
