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

            @component('app.layout.components.banner', [ 'username' => 'Edmar Sousa' ])
            @endcomponent
            @component('app.layout.components.finance')
            @endcomponent
            

            <section class="notification">
                <h2 class="title">Notificação</h2>

                <div>
                    @component('app.layout.components.notification', [
                        'message' => 'O cliente Edinho cancelou a consulta (07/01).',
                        'status' => 'Cancelou',
                        'type' => 'canceled'
                    ])
                    @endcomponent

                    @component('app.layout.components.notification', [
                        'message' => 'O cliente Edinho confirmou a consulta (07/01).',
                        'status' => 'Confirmou',
                        'type' => 'confirm'
                    ])
                    @endcomponent

                    @component('app.layout.components.notification', [
                        'message' => 'O cliente Edinho quer agendar uma consulta.',
                        'status' => 'Novo',
                        'type' => 'new'
                    ])
                    @endcomponent
                </div>
            </section>
        </main>

        <div class="little-agenda">
            <h2 class="title">Agenda</h2>

            @include('layout.partials.small-calendar')

            @component('app.layout.components.query', [
                'query' => $querys, 
                'hidden' => true,
            ])
            @endcomponent
        </div>
    </div>

    <script src="{{ asset('script/menu.js') }}" type="text/javascript"></script>
    <script src="{{ asset('script/calendar.js') }}" type="text/javascript"></script>
@endsection