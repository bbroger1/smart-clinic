<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Query;
use App\Models\Notification;

class AgendaController extends Controller
{
    private Query $query;
    private Notification $notification;

    public function __construct(Query $query, Notification $notification) {
        $this->query = $query;
        $this->notification = $notification;
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

    public function confirm(int $id) {
        $name = $this->query->confirm($id);
        $this->notification->store("A consulta do $name foi confirmada.");

        return redirect()->route('app.agenda');
    }

    public function cancel(int $id) {
        $name = $this->query->cancel($id);
        $this->notification->store("A consulta  do $name foi cancelada.");

        return redirect()->route('app.agenda');
    }
}
