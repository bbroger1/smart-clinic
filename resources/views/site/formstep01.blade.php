@extends('site.layout.base')


@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('css/calendar.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('css/user.css') }}" />
@endsection

@section('body')
    <div class="app">
        <main class="container">
            <div class="form-container">
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
            </div>
        </main>
    </div>
@endsection
