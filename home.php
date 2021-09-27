<?php
session_start();
if (isset($_SESSION['id'])) {
?>
    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <title>Scambio</title>
        <link rel="shortcut icon" href="assets/imgs/logoFundo.png" />
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" type="text/css" href="login/vendor/bootstrap/css/bootstrap.min.css">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link href="assets/css/style.css" rel="stylesheet">

        <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" data-auto-a11y="true"></script>

        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
        <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="./assets/css/home.css">
    </head>

    <body>
        <nav class="navbar secondaryColor navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">
                    <img src="assets/imgs/logo1.PNG" alt="logo Scambio" width="110" height="38">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" style="background-color: #F2EEE8;" id="navbarSupportedContent">
                    <ul class="textCor nav navbar-nav navbar-nav-ul">
                        <li><a class="links-nav-home" href="perfil.php">Perfil</a></li>
                        <li><a href="mensage.php">Mensagens</a></li>
                        <li><a href="index.php#ajuda">Ajuda</a></li>
                    </ul>

                    <ul class="textCor nav navbar-nav navbar-right">
                        <form action="logout.php" style="text-align: right;">
                            <input id="inpkill" class="inpkill glyphicon buttonLogout btnClass2" name="DestroySession" type="submit" value="Sair">
                        </form>
                    </ul>
                </div>
            </div>
        </nav>
        <h2 class="h1-large" style="font-family: Cutive;">Procure por uma nova história!</h2>
        <div class="w3-row-padding" style=" padding-top: 60px; ">
            <div class="w3-col m12 w3-div-caixa">
                <div class="w3-card w3-round w3-white ">
                    <div class="w3-container w3-padding">
                        <h6 class="w3-opacity ">Procure por um livro novo aqui:</h6>
                        <input type="text" class="w3-border w3-padding w3-input-livro " contenteditable="true">
                        <button type="button" class="w3-button" style="background-color: #dfd6ca; ">
                            <i class="fas fa-search"> </i>
                        </button>
                    </div>
                </div>
            </div>
        </div>


        <div class="container-card">
            <div class="card">
                <img src="./assets/imgs/aculpaedasestrelas.jpg" alt="Livro" class="card__image">
                <p class="card__name">A Culpa é das Estrelas</p>
                <div class="grid-container">

                    <div class="grid-child-autor">
                        Jhon Green
                    </div>

                    <div class="grid-child-genere">
                        Romance
                    </div>

                </div>
                <div class="social">
                    <a href="#" title=" Mais Detalhes"><img width="25" src="./assets/imgs/information.png" alt="Detalhes"></a>
                    <a href="#" title="Enviar Mensagem"><img width="22" src="./assets/imgs/message.png" alt=""></a>
                    <a href="#" title="Ver Perfil"><img width="23" src="./assets/imgs/profile.png" alt=""></a>
                </div>
            </div>
            <div class="card">
                <img src="./assets/imgs/acabana.jpg" alt="Livro" class="card__image">
                <p class="card__name">A Cabana</p>
                <div class="grid-container">

                    <div class="grid-child-autor">
                        William P. Young
                    </div>

                    <div class="grid-child-genere">
                        Ficção Religiosa
                    </div>

                </div>
                <div class="social">
                    <a href="#" title=" Mais Detalhes"><img width="25" src="./assets/imgs/information.png" alt="Detalhes"></a>
                    <a href="#" title="Enviar Mensagem"><img width="22" src="./assets/imgs/message.png" alt=""></a>
                    <a href="#" title="Ver Perfil"><img width="23" src="./assets/imgs/profile.png" alt=""></a>
                </div>
            </div>

            <div class="card">
                <img src="./assets/imgs/aculpaedasestrelas.jpg" alt="Livro" class="card__image">
                <p class="card__name">A Culpa é das Estrelas</p>
                <div class="grid-container">

                    <div class="grid-child-autor">
                        Jhon Green
                    </div>

                    <div class="grid-child-genere">
                        Romance
                    </div>

                </div>
                <div class="social">
                    <a href="#" title=" Mais Detalhes"><img width="25" src="./assets/imgs/information.png" alt="Detalhes"></a>
                    <a href="#" title="Enviar Mensagem"><img width="22" src="./assets/imgs/message.png" alt=""></a>
                    <a href="#" title="Ver Perfil"><img width="23" src="./assets/imgs/profile.png" alt=""></a>
                </div>
            </div>
            <div class="card">
                <img src="./assets/imgs/acabana.jpg" alt="Livro" class="card__image">
                <p class="card__name">A Cabana</p>
                <div class="grid-container">

                    <div class="grid-child-autor">
                        William P. Young
                    </div>

                    <div class="grid-child-genere">
                        Ficção Religiosa
                    </div>

                </div>
                <div class="social">
                    <a href="#" title=" Mais Detalhes"><img width="25" src="./assets/imgs/information.png" alt="Detalhes"></a>
                    <a href="#" title="Enviar Mensagem"><img width="22" src="./assets/imgs/message.png" alt=""></a>
                    <a href="#" title="Ver Perfil"><img width="23" src="./assets/imgs/profile.png" alt=""></a>
                </div>
            </div>

            <div class="card">
                <img src="./assets/imgs/aculpaedasestrelas.jpg" alt="Livro" class="card__image">
                <p class="card__name">A Culpa é das Estrelas</p>
                <div class="grid-container">

                    <div class="grid-child-autor">
                        Jhon Green
                    </div>

                    <div class="grid-child-genere">
                        Romance
                    </div>

                </div>
                <div class="social">
                    <a href="#" title=" Mais Detalhes"><img width="25" src="./assets/imgs/information.png" alt="Detalhes"></a>
                    <a href="#" title="Enviar Mensagem"><img width="22" src="./assets/imgs/message.png" alt=""></a>
                    <a href="#" title="Ver Perfil"><img width="23" src="./assets/imgs/profile.png" alt=""></a>
                </div>
            </div>
            <div class="card">
                <img src="./assets/imgs/acabana.jpg" alt="Livro" class="card__image">
                <p class="card__name">A Cabana</p>
                <div class="grid-container">

                    <div class="grid-child-autor">
                        William P. Young
                    </div>

                    <div class="grid-child-genere">
                        Ficção Religiosa
                    </div>

                </div>
                <div class="social">
                    <a href="#" title=" Mais Detalhes"><img width="25" src="./assets/imgs/information.png" alt="Detalhes"></a>
                    <a href="#" title="Enviar Mensagem"><img width="22" src="./assets/imgs/message.png" alt=""></a>
                    <a href="#" title="Ver Perfil"><img width="23" src="./assets/imgs/profile.png" alt=""></a>
                </div>
            </div>


        </div>


        <!--===============================================================================================-->
        <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
        <!--===============================================================================================-->
        <script src="vendor/bootstrap/js/popper.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
        <!--===============================================================================================-->
        <script src="vendor/select2/select2.min.js"></script>
        <!--===============================================================================================-->
        <script src="vendor/tilt/tilt.jquery.min.js"></script>
        <script>
            $('.js-tilt').tilt({
                scale: 1.1
            })
        </script>
        <!--===============================================================================================-->
        <script src="js/main.js"></script>
    </body>

    </html>
<?php
} else {
    header('Location: login/login.php');
}
?>