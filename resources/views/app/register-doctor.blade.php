@extends('app.layout.base')

@section('title', 'register doctor')

@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('css/register-doctor.css') }}" />
@endsection

@section ('body')

<div class="app grid">
    <button class="button-menu" aria-label="Botão para abrir menu">
        <i class="fa-solid fa-bars"></i>
    </button>

    @include ('app.layout.partials.menu')

    <main class="main">
        <h2 class="title">Cadastrar medico</h2>

        @component('app.layout.components.message', ['op' => $op, 'message' => $message])
        @endcomponent

        <form action="{{ route('app.register-doctor') }}" method="POST">
            @csrf

            <div class="row">
                <div class="col">
                    <input 
                        type="text" 
                        placeholder="Nome" 
                        name="name" 
                        class="input"
                        value="{{ old('name') }}" />
                    <p class="error">{{ $errors->has('name') ? $errors->first() : '' }}</p>
                </div>

                <div class="col">
                    <input 
                        type="text" 
                        placeholder="Sobrenome" 
                        name="lastName" 
                        class="input"
                        value="{{ old('lastName') }}" />
                    <p class="error">{{ $errors->has('lastName') ? $errors->first() : '' }}</p>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <input 
                        type="text" 
                        placeholder="(00) 00000-0000" 
                        name="phoneNumber" 
                        class="input"
                        value="{{ old('phoneNumber') }}" />
                    <p class="error">{{ $errors->has('phoneNumber') ? $errors->first() : '' }}</p>
                </div>

                <div class="col">
                    <input 
                        type="text" 
                        placeholder="000.000.000-00" 
                        name="cpf" 
                        class="input"
                        value="{{ old('cpf') }}" />
                    <p class="error">{{ $errors->has('cpf') ? $errors->first() : '' }}</p>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <select name="genre" class="input" value="{{ old('genre') }}">
                        <option value="">Sexo</option>

                        @foreach ($genres as $obj)
                        <option 
                            value="{{ $obj->id }}" 
                            {{ old('genre') == $obj->id ? 'selected' : '' }}>
                                {{ $obj->genre }}
                            </option>
                        @endforeach
                    </select>
                    <p class="error">{{ $errors->has('genre') ? $errors->first() : '' }}</p>
                </div>

                <div class="col">
                    <select name="uf" class="input" id="ufs" value="{{ old('uf') }}">
                        <option selected value="">Estado</option>
                    </select>
                    <p class="error">{{ $errors->has('uf') ? $errors->first() : '' }}</p>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <select name="city" class="input" id="city" value="{{ old('city') }}">
                        <option selected value="">Cidade</option>
                    </select>
                    <p class="error">{{ $errors->has('city') ? $errors->first() : '' }}</p>
                </div>

                <div class="col">
                    <select name="area" class="input" value="{{ old('area') }}">
                        <option value="">Area de atuação</option>

                        @foreach($areas as $obj)
                        <option 
                            value="{{ $obj->id }}"
                            {{ old('area') == $obj->id ? 'selected' : '' }}>
                                {{ $obj->area }}
                        </option>
                        @endforeach
                    </select>
                    <p class="error">{{ $errors->has('area') ? $errors->first() : '' }}</p>
                </div>
            </div>

            <div class="button-container">
                <button class="button-submit" type="submit">
                    Cadastrar
                </button>
            </div>
        </form>
    </main>
</div>

<script src="{{ asset('script/menu.js') }}" type="text/javascript"></script>
<script src="{{ asset('script/form.js') }}" type="text/javascript"></script>

@endsection
