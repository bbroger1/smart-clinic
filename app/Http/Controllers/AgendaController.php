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
        
        $monthNames = [
            '01' => 'Janeiro',
            '02' => 'Fevereiro',
            '03' => 'Março',
            '04' => 'Abril',
            '05' => 'Maio',
            '06' => 'Junho',
            '07' => 'Julho',
            '08' => 'Agosto',
            '09' => 'Setembro',
            '10' => 'Outubro',
            '11' => 'Novembro',
            '12' => 'Dezembro'
        ];

        $temp = explode('-', $date);
        $time = mktime(0, 0, 0, $temp[1], $temp[2], $temp[0]);

        $dayWeekNumber = date('N', mktime(0, 0, 0, $temp[1], 1, $temp[0]));
        $daysCount = date('t', $time);
        
        $firstDayDate = date('Y-m-d', mktime(0, 0, 0, $temp[1], 1, $temp[0]));
        $lastDayDate = date('Y-m-d', mktime(0, 0, 0, $temp[1], $daysCount + 1, $temp[0]));
        $day = 1 - $dayWeekNumber;


        return view('app.agenda', [
            'querys' => $this->query->getQueryOfDate($date),
            'amountDate' => $date,
            'day' => $day,
            'firstDay' => $firstDayDate,
            'lastDay' => $lastDayDate,
            'days' => $temp[2],
            'month' => $temp[1],
            'year' => $temp[0],
            'monthName' => $monthNames[$temp[1]]
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
