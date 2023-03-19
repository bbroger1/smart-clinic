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
        date_default_timezone_set('America/Sao_Paulo');

        $day   = $request->input('day');
        $month = $request->input('month');
        $year  = $request->input('year');

        $date = null;

        if ($day && $month && $year)
            $date = date('Y-m-d', mktime(0, 0, 0, $month, $day, $year));

        else
            $date = date('Y-m-d');

        return view('app.agenda', [
            'querys' => $this->query->getQueryOfDate($date),
            'amountDate' => $date,
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
