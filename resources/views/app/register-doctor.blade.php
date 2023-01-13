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

        @if (!strcmp($op, 'success'))
        <p class="message success">{{ $message }}</p>
        @elseif(!strcmp($op, 'error'))
        <p class="message error">{{ $message }}</p>
        @endif

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
                    <select name="sexo" class="input" value="{{ old('sexo') }}">
                        <option selected>Sexo</option>
                        <option value="Masculino">Masculino</option>
                        <option value="Feminino">Feminino</option>
                        <option value="Transgênero">Transgênero</option>
                        <option value="Gênero Neutro">Gênero Neutro</option>
                        <option value="Não-binário">Não-binário</option>
                        <option value="Agênero">Agênero</option>
                    </select>
                    <p class="error">{{ $errors->has('sexo') ? $errors->first() : '' }}</p>
                </div>

                <div class="col">
                    <select name="uf" class="input" id="ufs" value="{{ old('uf') }}">
                        <option selected>Estado</option>
                    </select>
                    <p class="error">{{ $errors->has('uf') ? $errors->first() : '' }}</p>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <select name="city" class="input" id="city" value="{{ old('city') }}">
                        <option selected>Cidade</option>
                    </select>
                    <p class="error">{{ $errors->has('city') ? $errors->first() : '' }}</p>
                </div>

                <div class="col">
                    <select name="area" class="input" value="{{ old('area') }}">
                        <option selected>Area de atuação</option>
                        <option>Cardiologia</option>
                        <option>Dermatologia</option>
                        <option>Endocrinologia e metabologia</option>
                        <option>Geriatria</option>
                        <option>Nefrologia</option>
                        <option>Neurologia</option>
                        <option>Oftalmologia</option>
                        <option>Ortopedia e traumatologia</option>
                        <option>Psiquiatria</option>
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
