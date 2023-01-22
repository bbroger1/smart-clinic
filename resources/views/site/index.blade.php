@extends('site.layout.base')


@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('css/calendar.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('css/user.css') }}" />
@endsection

@section('body')
    <div class="app">
        <main class="container">
            @include('layout.partials.large-calendar')

            <div class="form-container">
                <h2 class="title">Dados</h2>

                <form action="index.html" method="POST">
                    <div class="row">
                        <div class="col">
                            <input type="text" placeholder="Nome de usuario" class="input" />
                            <p class="error">Mensagem de erro</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <input type="email" placeholder="Email" class="input" />
                            <p class="error">Mensagem de erro</p>
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
                            <select name="sexo" class="input">
                                <option selected>Selecione o medico</option>
                                <option>Dr. João</option>
                                <option>Dr. Andrews</option>
                                <option>Dr. Shaun Murphy</option>
                            </select>
                            <p class="error">O campo é obrigatório</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <textarea name="message" class="input textarea">Messagem adicional</textarea>
                            <p class="error">O campo é obrigatório</p>
                        </div>
                    </div>

                    <div class="align-button">
                        <button type="submit" class="form-button">
                            Cadastrar
                        </button>
                    </div>
                </form>
            </div>
        </main>
    </div>

    <script type="text/javascript" src="{{ asset('script/large-calendar.js') }}"></script>
@endsection
