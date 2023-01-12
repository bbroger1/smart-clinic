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

    @include ('app.layout.partials.manu')

    <main class="main">
        <h2 class="title">Cadastrar medico</h2>

        <form action="#" method="#">
            <div class="row">
                <div class="col">
                    <input type="text" placeholder="Nome" name="name" class="input" />
                    <p class="error">O campo é obrigatório</p>
                </div>

                <div class="col">
                    <input type="text" placeholder="Sobrenome" name="lastName" class="input" />
                    <p class="error">O campo é obrigatório</p>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <input 
                        type="text" 
                        placeholder="(00) 00000-0000" 
                        name="phoneNumber" 
                        class="input" />
                        <p class="error">O campo é obrigatório</p>
                </div>

                <div class="col">
                    <input type="text" placeholder="000.000.000-00" name="cpf" class="input" />
                    <p class="error">O campo é obrigatório</p>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <select name="sexo" class="input">
                        <option selected>Sexo</option>
                        <option>Masculino</option>
                        <option>Feminino</option>
                        <option>Transgênero</option>
                        <option>Gênero Neutro</option>
                        <option>Não-binário</option>
                        <option>Agênero</option>
                    </select>
                    <p class="error">O campo é obrigatório</p>
                </div>

                <div class="col">
                    <select name="uf" class="input" id="ufs">
                        <option selected>Estado</option>
                    </select>
                    <p class="error">O campo é obrigatório</p>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <select name="city" class="input" id="city">
                        <option selected>Cidade</option>
                    </select>
                    <p class="error">O campo é obrigatório</p>
                </div>

                <div class="col">
                    <select name="area" class="input">
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
                    <p class="error">O campo é obrigatório</p>
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
