<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="assets/css/style.css" rel="stylesheet">
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
                    <img src="assets/imgs/logo1.PNG" alt="logo Scambio" width="110" height="38">
                </a>
            </div>
            <div class="collapse navbar-collapse" style="background-color: #F2EEE8;" id="myNavbar">
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
        <h2 class="h4" style="line-height: 23px;">Somos alunos do curso técnico em Desenvolvimento de Sistemas na ETEC Dra Ruth Cardoso em São Vicente. Atualmente no terceiro módulo e último. </h2>
        <h2 class="h4 subtitle">O Scambio, é uma plataforma para realizar trocas de livros, onde você poderá publicar um livro e troca-lo por outro de seu interesse.</h2>
        <div class="box">
            <img class="img-barbara int-generic" src="assets/imgs/barbara.jpg" />
            <span class="name-int"> Barbara Hellen </span>
        </div>
        <div class="box">
            <img class="img-beatriz int-generic" src="assets/imgs/beatriz.jpg" />
            <span class="name-int"> Beatriz Bombardelli </span>
        </div>
        <div class="box">
            <img class="img-munir int-generic" src="assets/imgs/munir.jpeg" />
            <span class="name-int"> Munir Arabi </span>
        </div>
        <div class="box">
            <img class="img-thamirys int-generic" src="assets/imgs/thamirys.jpg" />
            <span class="name-int"> Thamirys Abilio </span>
        </div>
        <div class="box">
            <img class="img-yago int-generic" src="assets/imgs/yago.jpg" />
            <span class="name-int"> Yago Felipe </span>
        </div>
    </div>
    <div id="comofunciona" class="container-fluid">
        <h1>Como Funciona?</h1>
        <p>Try to scroll this section and look at the navigation bar while scrolling! Try to scroll this section and look at the navigation bar while scrolling!</p>
        <p>Try to scroll this section and look at the navigation bar while scrolling! Try to scroll this section and look at the navigation bar while scrolling!</p>
    </div>
    <div id="ajuda" class="container-fluid">
        <h1>Precisa de Ajuda?</h1>
        <div class="row div-ajuda">
            <form action="">
                <div class="row">
                <div class="col-25">
                    <label for="nome">Nome</label>
                </div>
                <div class="col-75">
                    <input type="text" id="nome" name="nome" placeholder="Seu nome..">
                </div>
                </div>
                <div class="row">
                <div class="col-25">
                    <label for="email">E-mail</label>
                </div>
                <div class="col-75">
                    <input type="text" id="email" name="email" placeholder="Seu e-mail..">
                </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="estado">Estado</label>
                    </div>
                    <div class="col-75">
                        <select id="estado" name="estado">
                            <option value="AC">AC</option>
                            <option value="AL">AL</option>
                            <option value="AP">AP</option>
                            <option value="AM">AM</option>
                            <option value="BA">BA</option>
                            <option value="CE">CE</option>
                            <option value="ES">ES</option>
                            <option value="GO">GO</option>
                            <option value="MA">MA</option>
                            <option value="MT">MT</option>
                            <option value="MS">MS</option>
                            <option value="MG">MG</option>
                            <option value="PA">PA</option>
                            <option value="PB">PB</option>
                            <option value="PE">PE</option>
                            <option value="PI">PI</option>
                            <option value="RJ">RJ</option>
                            <option value="RN">RN</option>
                            <option value="RS">RS</option>
                            <option value="RO">RO</option>
                            <option value="RR">RR</option>
                            <option value="SP">SP</option>
                            <option value="SE">SE</option>
                            <option value="TO">TO</option>
                            <option value="DF">DF</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="mensagem">Mensagem</label>
                    </div>
                    <div class="col-75">
                        <textarea id="mensagem" name="mensagem" placeholder="Sua mensagem.." style="height:200px"></textarea>
                    </div>
                </div>
                <div class="row btn-submit">
                    <input onclick="alertaBtnAjuda()" type="submit" value="Enviar">
                </div>
            </form>
        </div>
    </div>

    <script>
        function alertaBtnAjuda() {
            alert("Você recebera uma resposta em breve");
        }
    </script>
</body>

</html>