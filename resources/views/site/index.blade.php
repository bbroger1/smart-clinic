@extends('site.layout.base')


@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('css/calendar.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('css/user.css') }}" />
@endsection

@section('body')
    <div class="app">
        <main class="container">
            @unless(isset($areaOptions))
            @include('layout.partials.large-calendar')
            @endunless

            <div class="form-container">

                @if (isset($areaOptions))
                <div class="step-one">
                    <h2 class="title">Deseja agendar uma consulta?</h2>

                    <form action="{{ route('site.index') }}" method="POST">
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
                                <p class="error">Mensagem de erro</p>
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
                        @include('site.layout.components.form')
                    </div>
                @endif
            </div>
        </main>
    </div>

    <script type="text/javascript" src="{{ asset('script/large-calendar.js') }}"></script>
@endsection
