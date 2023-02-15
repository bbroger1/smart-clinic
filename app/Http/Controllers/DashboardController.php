<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Query;
use App\Models\Notification;
use App\Models\doctor;

class DashboardController extends Controller
{
    private Query $query;
    private Notification $notification;
    private Doctor $doctors;

    public function __construct(Query $query, Notification $notification, Doctor $doctors) {
        $this->query = $query;
        $this->notification = $notification;
        $this->doctors = $doctors;
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

        return view('app.index', [
            'querys'        => $this->query->getQueryOfDate($date),
            'notifications' => $this->notification->getNotifications(),
            'queryCount'    => $this->query->countNumberQuery(),
            'doctorsCount'  => $this->doctors->countAllDoctors(),
            'confimedQuery' => $this->query->countConfimedQuerys(),
        ]);
    }
}
