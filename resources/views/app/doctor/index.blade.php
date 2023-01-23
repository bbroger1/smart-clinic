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

    @include ('layout.partials.menu')

    <main class="main">
        <h2 class="title">Medicos cadastrados</h2>

        <div>
            @component('app.doctor.layout.components.doctor-table', [
                'doctors' => $doctors
            ])
            @endcomponent
        </div>

        {{ $doctors->links() }}
    </main>

    @if ($view > 0)
        @component('app.doctor.layout.components.doctor-information', [
            'doctor' => $doctors[ ($view - 1) % 12 ]
        ])
        @endcomponent
    @endif
</div>

<script type="text/javascript" src="{{ asset('script/menu.js') }}"></script>
<script type="text/javascript" src="{{ asset('script/doctors.js') }}"></script>
@endsection