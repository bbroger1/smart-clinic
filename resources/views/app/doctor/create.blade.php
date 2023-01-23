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

    @include ('layout.partials.menu')

    <main class="main">
        <h2 class="title">Cadastrar medico</h2>

        @component('app.layout.components.message', ['op' => $op, 'message' => $message])
        @endcomponent

        <form action="{{ route('app.register-doctor') }}" method="POST">
            @csrf

            <div class="row">
                <div class="col">
                    @component('app.layout.components.register-doctor-input', [
                        'type' => 'text',
                        'placeholder' => 'Nome',
                        'name' => 'name'
                    ])
                    @endcomponent
                </div>

                <div class="col">
                    @component('app.layout.components.register-doctor-input', [
                        'type' => 'text',
                        'placeholder' => 'Sobrenome',
                        'name' => 'lastName'
                    ])
                    @endcomponent
                </div>
            </div>

            <div class="row">
                <div class="col">
                    @component('app.layout.components.register-doctor-input', [
                        'type' => 'text',
                        'placeholder' => '(00) 00000-0000',
                        'name' => 'phoneNumber'
                    ])
                    @endcomponent
                </div>

                <div class="col">
                    @component('app.layout.components.register-doctor-input', [
                        'type' => 'text',
                        'placeholder' => '000.000.000-00',
                        'name' => 'cpf'
                    ])
                    @endcomponent
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <select name="genre" class="input" value="{{ old('genre') }}">
                        <option value="">Genero</option>

                        @foreach ($genres as $obj)
                        <option 
                            value="{{ $obj->id }}" 
                            {{ old('genre') == $obj->id ? 'selected' : '' }}>
                                {{ $obj->genre }}
                            </option>
                        @endforeach
                    </select>

                    @error ('genre')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col">
                    <select name="uf" class="input" id="ufs" value="{{ old('uf') }}">
                        <option selected value="">Estado</option>
                    </select>

                    @error ('uf')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <select name="city" class="input" id="city" value="{{ old('city') }}">
                        <option selected value="">Cidade</option>
                    </select>

                    @error ('city')
                        <p class="error">{{ $message }}</p>
                    @enderror
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

                    @error ('area')
                        <p class="error">{{ $message }}</p>
                    @enderror
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
