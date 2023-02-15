@extends('app.layout.base')

@section('title', 'Home')

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/query.css') }}" />
@endsection
    
@section('body')
    <div class="app grid">
        <button class="button-menu" aria-label="Botão para abrir menu">
            <i class="fa-solid fa-bars"></i>
        </button>

        @include('layout.partials.menu')

        <main class="main">
            <h1 class="title">Dashboard</h1>

            @component('app.layout.components.banner', [ 'username' => $_SESSION['user'] ])
            @endcomponent
            @component('app.layout.components.finance', [
                'querysCount' => $queryCount,
                'doctorsCount' => $doctorsCount,
                'confimedQuery' => $confimedQuery
            ])
            @endcomponent
            

            <section class="notification">
                <h2 class="title">Notificação</h2>

                <div>

                    @if (count($notifications) > 0)

                    @foreach ($notifications as $notification)
                        @component('app.layout.components.notification', [
                            'message' => $notification->message,
                        ])
                        @endcomponent
                    @endforeach

                    @else
                    <div class="message-empty">
                        <p class="message-icon">
                            <i class="fa-solid fa-circle-info"></i>
                        </p>
                        <p class="message-text">Sem notificações!</p>
                    </div>
                    @endif
                </div>
            </section>
        </main>

        <div class="little-agenda">
            <h2 class="title">Agenda</h2>

            @include('layout.partials.small-calendar')

            @if (count($querys) > 0)
            @component('app.layout.components.query', [
                'query' => $querys, 
                'hidden' => true,
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
        </div>
    </div>

    <script src="{{ asset('script/menu.js') }}" type="text/javascript"></script>
    <script src="{{ asset('script/calendar.js') }}" type="text/javascript"></script>
@endsection