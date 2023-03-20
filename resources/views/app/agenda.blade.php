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

                @component('layout.partials.large-calendar', [
                    'route' => 'app.agenda',
                    'amountDate' => $amountDate,
                    'blockedDays' => $blockedDays,
                    'params' => []
                ])

                    <form method="POST" action="{{ route('app.lock-day') }}">
                        @csrf
                        
                        <input type="hidden" name="date" value="{{ $amountDate }}" />

                        <button 
                            type="submit"
                            aria-label="Botão para bloquear dia" 
                            class="lock-button green">
                                <i class="fa-solid fa-lock"></i>
                                Bloquear dia
                        </button>
                    </form>
                @endcomponent
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
