<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Solicitação de consulta finalizada</title>

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" />

    <link rel="stylesheet" type="text/css" href="{{ asset('css/reset.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/finish.css') }}" />
</head>
<body>
    
    <div class="app">
        <p class="large-message">
            <i class="fa-regular fa-circle-check"></i>
        </p>

        <p>Sua consulta foi cadastrada com sucesso!</p>

        <a href="{{ route('site.step1') }}" class="button-go-back">
            <i class="fa-solid fa-arrow-left"></i> Voltar
        </a>
    </div>

</body>
</html>