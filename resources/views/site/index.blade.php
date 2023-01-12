<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendar um horário</title>

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" />

    <link rel="stylesheet" type="text/css" href="{{ asset('css/reset.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/calendar.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/user.css') }}" />
</head>
<body>

    <div class="app">
        <main class="container">
            <div class="large-calendar">
                <div class="calendar-header">
                    <h3 id="calendar-title">loading...</h3>

                    <div class="row-buttons">
                        <button aria-label="Botão para mudar para proximo mes" class="header-button" id="left">
                            <i class="fa-solid fa-arrow-left"></i>
                        </button>

                        <button aria-label="Botão para mudar para proximo mes" class="header-button" id="right">
                            <i class="fa-solid fa-arrow-right"></i>
                        </button>
                    </div>
                </div>

                <div class="calendar-body">
                    <table class="table" cellspacing="5">
                        <thead>
                            <tr>
                                <th>DOM</th>
                                <th>SEG</th>
                                <th>TER</th>
                                <th>QUA</th>
                                <th>QUI</th>
                                <th>SEX</th>
                                <th>SAB</th>
                            </tr>
                        </thead>

                        <tbody class="table-body">

                        </tbody>
                    </table>
                </div>
            </div>

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
</body>
</html>
