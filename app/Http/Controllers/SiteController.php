<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;

use App\Http\Requests\GetAreasDoctors;

class SiteController extends Controller
{
    protected Area $area;

    public function __construct(Area $area)
    {
        $this->area = $area;
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
            'options' => 'ok'
        ]);
    }
}
