<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Query;

class AgendaController extends Controller
{
    private Query $query;

    public function __construct(Query $query) {
        $this->query = $query;
    }

    public function index(Request $request) {
        $day = $request->input('day');
        $month = $request->input('month') + 1;
        $year = $request->input('year');

        $date = null;

        if ($day and $month and $year)
            $date = date('Y-m-d', mktime(0, 0, 0, $month, $day, $year));

        else
            $date = date('Y-m-d');

        return view('app.agenda', [
            'querys' => $this->query->getQueryOfDate($date)
        ]);
    }
}
