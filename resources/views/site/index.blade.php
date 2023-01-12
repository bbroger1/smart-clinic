<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendar um horário</title>

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" />

    <link rel="stylesheet" type="text/css" href="./css/reset.css" />
    <link rel="stylesheet" type="text/css" href="./css/user.css" />
    <link rel="stylesheet" type="text/css" href="./css/calendar.css" />
</head>
<body>

    <div class="app">
        <main>
            <div class="large-calendar">
                <div class="calendar-header">
                    <h3 id="calendar-title">loading...</h3>

                    <div class="row">
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
                <form action="index.html" method="POST">

                </form>
            </div>
        </main>
    </div>

    <script type="text/javascript" src="./script/large-calendar.js"></script>
</body>
</html>
