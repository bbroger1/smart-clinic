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

        <div>
            @component('app.layout.components.doctor-table', [
                'doctors' => [
                    0 => [
                        'id' => 1,
                        'name' => 'Edmar Sousa',
                        'phoneNumber' => '(00) 00000-0000'
                    ],
                    1 => [
                        'id' => 2,
                        'name' => 'Edinho',
                        'phoneNumber' => '(88) 88888-9000'
                    ]
                ]
            ])
            @endcomponent
        </div>
    </main>

    @component('app.layout.components.doctor-information', [
        'id' => 1,
        'name' => 'Edmar Sousa',
        'status' => 'Ativo',
        'phoneNumber' => '(00) 00000-0000',
        'sexo' => 'Masculino',
        'city' => 'Ocara',
        'uf' => 'CE',
        'area' => 'neurocirurgião'
    ])
    @endcomponent
</div>

<script type="text/javascript" src="{{ asset('script/menu.js') }}"></script>
<script type="text/javascript" src="{{ asset('script/doctors.js') }}"></script>
@endsection