<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="css/style.css" rel="stylesheet">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/heroes/">
</head>

<body class="body">
    <nav class="secondaryColor navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">
                    <img src="assets/imgs/logo1.PNG" alt="logo Scambio" width="100" height="30">
                </a>
            </div>
            <div class="collapse navbar-collapse" style=" background-color: #F2EEE8;" id="myNavbar">
                <ul class="textCor nav navbar-nav">
                    <li><a href="#sobre">Quem Somos</a></li>
                    <li><a href="#comofunciona">Como Funciona?</a></li>
                    <li><a href="#ajuda">Ajuda</a></li>
                </ul>
                <ul class=" textCor nav navbar-nav navbar-right">
                    <li><a href="cadastro.php"><span class="glyphicon glyphicon-user"></span> Cadastre-se</a></li>
                    <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Entrar</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <header id="header" class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="text-container">
                        <h1 class="h1-large">Troca de livro? Dê um match no Scambio.</h1>
                        <p class="p-large">Venha fazer parte de uma comunidade de troca de livros, tenha novas experiências e novos livros.</p>
                        <a class="btn-solid-lg" href="cadastro.php"><i class="fab fa-apple"></i>Cadastre-se</a>
                        <a class="btn-solid-lg secondary" href="login.php"><i class="fab fa-google-play"></i>Entrar</a>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
                <div class="col-lg-6">
                    <div class="image-container">
                        <img class="img-fluid" width="350px" src="assets/imgs/inicial.png" alt="alternative">
                    </div> <!-- end of image-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </header> <!-- end of header -->
    <!-- end of header -->

    <div id="sobre" class="container-fluid sobre">
        <h1>Sobre Nós e o Projeto</h1>
        <h2 class="h4">Somos alunos do curso técnico em Desenvolvimento de Sistemas na ETEC Dra Ruth Cardoso em São Vicente. Atualmente no terceiro módulo e último. </h2>
        <h2 class="h4">Estamos construindo o Scambio, um site pensado para realizar trocas de livros, onde você poderá publicar um livro e troca-lo por outro de seu interesse.</h2>
        <div class="box">
            <img class="img-barbara" src="assets/imgs/barbara.jpg" />
            <span> Titulo da primeira imagem </span>
        </div>
        <div class="box">
            <img class="img-beatriz" src="assets/imgs/beatriz.jpg" />
            <span> Titulo da segunda imagem </span>
        </div>
        <div class="box">
            <img class="img-munir" src="" />
            <span> Titulo da segunda imagem </span>
        </div>
        <div class="box">
            <img class="img-thamirys" src="" />
            <span> Titulo da segunda imagem </span>
        </div>
        <div class="box">
            <img class="img-yago" src="" />
            <span> Titulo da segunda imagem </span>
        </div>
    </div>
    <div id="comofunciona" class="container-fluid">
        <h1>Como Funciona?</h1>
        <p>Try to scroll this section and look at the navigation bar while scrolling! Try to scroll this section and look at the navigation bar while scrolling!</p>
        <p>Try to scroll this section and look at the navigation bar while scrolling! Try to scroll this section and look at the navigation bar while scrolling!</p>
    </div>
    <div id="ajuda" class="container-fluid">
        <h1>Precisa de Ajuda?</h1>
        <p>Try to scroll this section and look at the navigation bar while scrolling! Try to scroll this section and look at the navigation bar while scrolling!</p>
        <p>Try to scroll this section and look at the navigation bar while scrolling! Try to scroll this section and look at the navigation bar while scrolling!</p>
    </div>

</body>

</html>