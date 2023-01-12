@extends ('app.layout.base')

@section ('title', 'login')

@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}" />
@endsection

@section ('body')

<div class="app flex">
    <main class="main">
        <h2 class="title">Login</h2>

        <form action="index.html" method="POST" id="form">
            <div class="row">
                <input type="email" placeholder="Email" class="input" />
                <p class="error">Usuario invalido</p>
            </div>

            <div class="row">
                <input type="password" placeholder="Password" class="input" />
                <p class="error">Senha incorreta</p>
            </div>

            <div class="row">
                <p class="message">Não tem uma conta? <a href="#" class="link">Registrar-se</a></p>
            </div>

            <div class="align">
                <input type="submit" class="button" value="Entrar" />
            </div>
        </form>
    </main>
</div>

<script type="text/javascript" src="{{ asset('script/login.js') }}"></script>

@endsection
