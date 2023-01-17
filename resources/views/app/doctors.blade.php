@extends('app.layout.base')

@section ('title', 'doctors')

@section ('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('css/doctor.css') }}" />
@endsection

@section ('body')
<div class="app grid">
    <button class="button-menu" aria-label="Botão para abrir menu">
        <i class="fa-solid fa-bars"></i>
    </button>

    @include ('app.layout.partials.menu')

    <main class="main">
        <h2 class="title">Medicos cadastrados</h2>

        {{-- @component('app.layout.components.message', ['op' => $op, 'message' => $message])
        @endcomponent --}}

        <div>
            @component('app.layout.components.doctor-table', ['doctors' => $doctors])
            @endcomponent
        </div>

        <div class="buttons">
            <div>
                <button class="change-page" id="old-page">Anterior</button>
            </div>

            <p class="page-count">1</p>

            <div>
                <button class="change-page" id="next-page">Proxima</button>
            </div>
        </div>
    </main>

    @if ($view > 0)
        @component('app.layout.components.doctor-information', ['doctor' => $doctors[ ($view - 1) % 12 ]])
        @endcomponent
    @endif
</div>

<script type="text/javascript" src="{{ asset('script/menu.js') }}"></script>
<script type="text/javascript" src="{{ asset('script/doctors.js') }}"></script>
@endsection