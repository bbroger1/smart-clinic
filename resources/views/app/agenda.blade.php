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
            @include('app.layout.partials.menu')
    
            <main class="main container">
                <h2 class="title">Agenda</h2>
                @include('app.layout.partials.large-calendar')
            </main>
    
            <aside class="querys container">
                <h3 class="title">Consutas do dia</h3>
    
                @component('app.layout.components.query', [
                    'query' => [
                        0 => [
                            'user' => 'Edinho Sousa',
                            'doctor' => 'Dr. João Pedro',
                            'hour' => '08:00',
                            'status' => 'canceled'
                        ],
                        1 => [
                            'user' => 'Jose Maria',
                            'doctor' => 'Dr. João Pedro',
                            'hour' => '09:00',
                            'status' => 'confirm'
                        ]
                    ]
                ])
                @endcomponent
            </aside>
        </div>
    </div>

    <script type="text/javascript" src="{{ asset('script/menu.js') }}"></script>
    <script type="text/javascript" src="{{ asset('script/large-calendar.js') }}"></script>
@endsection
