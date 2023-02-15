@extends('site.layout.base')


@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('css/calendar.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('css/user.css') }}" />
@endsection

@section('body')
    <div class="app">
        @if (isset($doctors) and count($doctors) == 0)
        <div class="container-message">
            <p class="large-message">Descupe!</p>
            <p class="small-message">Não temos medicos para a area selecionada</p>

            <a href="{{ route('site.step1') }}" class="button-go-back">
                <i class="fa-solid fa-arrow-left"></i> Voltar
            </a>
        </div>
        
        @else
        <main class="container">
            @unless(isset($areaOptions))
            @include('layout.partials.large-calendar')
            @endunless

            <div class="form-container">

                @if (isset($areaOptions))
                <div class="step-one">
                    <h2 class="title">Deseja agendar uma consulta?</h2>

                    <form action="{{ route('site.step2') }}" method="GET">
                        @csrf

                        <div class="row">
                            <div class="col">
                                <label for="area-option" class="label">Selecione a area da consulta:</label>

                                <select name="area" class="input" id="area-option">
                                    <option value="">Selecione a area</option>

                                    @foreach ($areaOptions as $area)
                                        <option value="{{ $area->id }}">{{ $area->area }}</option>
                                    @endforeach

                                </select>
                                @error('area')
                                <p class="error">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="align-button">
                            <button type="submit" class="form-button">
                                Continuar
                            </button>
                        </div>
                    </form>
                </div>

                @else
                    <h2 class="title">Dados</h2> 
                    <div>
                        @component('site.layout.components.form', ['doctors' => $doctors, 'genres' => $genres])
                        @endcomponent
                    </div>
                @endif
            </div>
        </main>

        @endif
    </div>

    <script type="text/javascript" src="{{ asset('script/large-calendar.js') }}"></script>
@endsection
