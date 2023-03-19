@extends('app.layout.base')

@section('title', 'Agenda')

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/agenda.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/calendar.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/query.css') }}" />
@endsection

@section('body')
    <div class="app">
        <button class="button-menu" aria-label="Botão para abrir menu">
            <i class="fa-solid fa-bars"></i>
        </button>

        <div class="grid">
            @include('layout.partials.menu')
    
            <main class="main container">
                <h2 class="title">Agenda</h2>

                <div class="large-calendar">
                    <div class="calendar-header">
                        <h3 id="calendar-title">{{ $year }} {{ $monthName }}</h3>
                
                        <div class="row">
                            <a 
                                href="{{ route('app.agenda', [ 'year' => $year, 'month' => $month - 1, 'day' => $days ]) }}"
                                aria-label="Botão para mudar para proximo mes" 
                                class="header-button" 
                                id="left">
                                    <i class="fa-solid fa-arrow-left"></i>
                            </a>
                
                            <a 
                            href="{{ route('app.agenda', [ 'year' => $year, 'month' => $month + 1, 'day' => $days ]) }}"
                                aria-label="Botão para mudar para proximo mes" 
                                class="header-button" 
                                id="right">
                                    <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                
                    <div class="calendar-body">
                        <table class="table" cellspacing="5">
                            <thead>
                                <tr>
                                    <th>DOM</th>
                                    <th>SEG</th>
                                    <th>TER</th>
                                    <th>QUA</th>
                                    <th>QUI</th>
                                    <th>SEX</th>
                                    <th>SAB</th>
                                </tr>
                            </thead>
                
                            <tbody class="table-body">
                                
                                

                                @for ($week = 0; $week < 6; $week++)
                                    <tr>
                                        @for ($j = 0; $j < 7; $j++)
                                            <td>
                                                @php($date = date('Y-m-d', mktime(0, 0, 0, $month, $day, $year)))

                                                <button 
                                                    class="calendar-day 
                                                        {{ ($date < $firstDay or $date >= $lastDay) ? 'gray' : '' }}
                                                        {{ $date == $amountDate ? 'activate-day' : '' }}">
                                                        {{ date('d', mktime(0, 0, 0, $month, $day, $year)) }}
                                                </button>
                                                
                                            @php($day++)
                                            </td>
                                        @endfor
                                    </tr>
                                @endfor

                            </tbody>
                        </table>
                    </div>
                </div>
            
            </main>
    
            <aside class="querys container">
                <h3 class="title">Consutas do dia</h3>
    
                @if (count($querys) > 0)
                @component('app.layout.components.query', [
                    'query' => $querys,
                    'hidden' => false,
                ])
                @endcomponent

                @else
                <div class="message-empty">
                    <p class="message-icon">
                        <i class="fa-solid fa-circle-info"></i>
                    </p>
                    <p class="message-text">Sem consultas para hoje!</p>
                </div>
                @endif
            </aside>
        </div>
    </div>

    <script type="text/javascript" src="{{ asset('script/menu.js') }}"></script>
@endsection
