<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Query;
use App\Models\Notification;
use App\Models\BlockedDay;

class AgendaController extends Controller
{
    private Query $query;
    private Notification $notification;

    public function __construct(Query $query, Notification $notification) {
        $this->query = $query;
        $this->notification = $notification;
    }

    public function index(Request $request, BlockedDay $blockedDay) {
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
            'blockedDays' => $blockedDay->get($date),
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

    public function lockDay(Request $request, BlockedDay $blockedDay) {
        $validated = $request->validate([
            'date' => 'required'
        ]);

        $blockedDay->store($validated["date"]);
        return redirect()->route('app.agenda');
    }


    public function unlockDay(Request $request, BlockedDay $blockedDay)
    {
        $blockedDay->freeDay($request->input('date'));
        return redirect()->back();
    }
}
