<?php
//Validadar se existe SESSION
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/responsivoIndex.css" rel="stylesheet">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/heroes/">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lemonada&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="assets/imgs/logoFundo.png" />

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="./fab/fab.css">

    <title>Scambio</title>

    <style>
        .label-btn {
            margin-left: 330px;
            border-radius: 12px;
            border: none;
            background-color: #AC7E55;
            width: 80px;
            height: 32px;
            font-size: 1.45rem !important;
            font-weight: 600;
        }
    </style>
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
                <a class="navbar-brand navbar-brand-top" href="index.php">
                    <img class="img-index" src="assets/imgs/logo1.PNG" alt="logo Scambio" width="110" height="38">
                </a>
            </div>
            <div class="collapse navbar-collapse" style="background-color: #F2EEE8;" id="myNavbar">
                <ul class="textCor nav navbar-nav">
                    <li><a class="links-nav-index" href="#comofunciona">Como Funciona?</a></li>
                    <li><a class="links-nav-index" href="#sobre">Quem Somos</a></li>
                    <li><a class="links-nav-index" href="#ajuda">Ajuda</a></li>
                </ul>
                <?php
                if (isset($_SESSION['id'])) {
                ?>
                    <form action="logout.php">
                        <input id="inpkill" class="inpkill glyphicon buttonLogout" name="DestroySession" type="submit" value="Sair">
                    </form>
                <?php
                } else {
                ?>
                    <ul class="textCor nav navbar-nav navbar-right">
                        <li><a class="links-nav-index" href="cadastro/cadastro.php"><span class="glyphicon glyphicon-user "></span> Cadastre-se</a></li>
                        <li><a class="links-nav-index" href="login/login.php"><span class="glyphicon glyphicon-log-in"></span> Entrar</a></li>
                    </ul>
                <?php
                }
                ?>
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
                        <?php
                        if (isset($_SESSION['id'])) {
                        ?>
                            <a class="btn-solid-lg" href="home/home.php"><i class="fab"></i>Acessar Scambio</a>
                        <?php
                        } else {
                        ?>
                            <a class="btn-solid-lg" href="cadastro/cadastro.php"><i class="fab"></i>Cadastre-se</a>
                            <a class="btn-solid-lg secondary" href="login/login.php"><i></i>Entrar</a>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="image-container">
                        <img class="img-fluid" width="350px" src="assets/imgs/inicial.png" alt="alternative">
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div id="comofunciona" class="container-fluid">
        <h2 class="h1-large" style="font-family: sans-serif;">Como Funciona?</h2>
        <br>
        <br>
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="image-container">
                        <img class="img-fluid" width="1200px" src="assets/imgs/comodescricao.png" alt="alternative">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="sobre" class="container-fluid sobre">
        <h2 class="h1-large" style="font-family: sans-serif;">Sobre Nós e o Projeto</h2>
        <br>
        <br>
        <h2 class="h4 description-quemsomos" style="line-height: 30px;">Somos alunos do curso técnico em Desenvolvimento de Sistemas na ETEC Dra Ruth Cardoso em São Vicente. Atualmente no terceiro módulo e último. </h2>
        <h2 class="h4 subtitle">O Scambio, é uma plataforma de troca de livros idealizada por nós de fácil acesso e utilização. A ideia de criar uma plataforma voltada para troca e doações de livros veio para incentivar a leitura em nosso país e levar o acesso á livros para todos, basta se cadastrar na plataforma e se aventurar na busca de novos livros.</h2>
        <br>
        <br>
        <div class="box">
            <img class="img-barbara int-generic" src="assets/imgs/barbara.jpg" />
            <span class="name-int"> Barbara Hellen </span>
            <br>
            <span class="name-int"> Back-end & Banco de Dados </span>
            <br>
            <span class="name-int"> São Vicente - SP </span>
            <br>
            <span class="name-int"> 20 anos </span>

        </div>
        <div class="box">
            <img class="img-beatriz int-generic" src="assets/imgs/beatriz.jpg" />
            <span class="name-int"> Beatriz Bombardelli </span>
            <br>
            <span class="name-int"> Front-end </span>
            <br>
            <span class="name-int"> & Design </span>
            <br>
            <span class="name-int"> São Vicente - SP </span>
            <br>
            <span class="name-int"> 18 anos </span>
        </div>
        <div class="box">
            <img class="img-munir int-generic" src="assets/imgs/munir.jpeg" />
            <span class="name-int"> Munir Arabi </span>
            <br>
            <span class="name-int"> Front-end </span>
            <br>
            <span class="name-int"> & Design </span>
            <br>
            <span class="name-int">São Vicente - SP </span>
            <br>
            <span class="name-int"> 17 anos </span>
        </div>
        <div class="box">
            <img class="img-yago int-generic" src="assets/imgs/yago.jpg" />
            <span class="name-int"> Yago Felipe </span>
            <br>
            <span class="name-int"> Documentação e validação </span>
            <br>
            <span class="name-int"> São Vicente - SP </span>
            <br>
            <span class="name-int"> 19 anos </span>
        </div>
    </div>

    <div id="ajuda" class="container-fluid">
        <h2 class="h1-large" style="font-family: sans-serif;">Precisa de Ajuda?</h2>
        <br>
        <br>
        <span class="span-ajuda">Deixe aqui sua dúvida, sugestão ou comentário sobre o projeto</span>

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
                            <option value="--">--</option>
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
                    <input class="label-btn" onclick="alertaBtnAjuda()" type="submit" value="Enviar">
                </div>
            </form>
        </div>
    </div>

    <div class="fab-containerrr">
    <div class="fabbb fab-icon-holderrr">
        <i class="fas fa-bars"></i>
    </div>

    <ul class="fab-optionsss">
        <li>
            <span class="fab-labelll"><a style="text-decoration: none; color: white;">Home</a></span>
            <div class="fab-icon-holderrr">
                <a id="home" style="text-decoration: none;" onclick="redirectHome()"><i class="fas fa-file-alt"></i></a>
            </div>
        </li>
        <li>
            <span class="fab-labelll"><a style="text-decoration: none; color: white;">Publicar Livro</a></span>
            <div class="fab-icon-holderrr">
                <a id="publicar" style="text-decoration: none;" onclick="redirectPublicacao()"><i class="fas fa-book"></i></a>
            </div>
        </li>
        <li>
            <span class="fab-labelll"><a style="text-decoration: none; color: white;">Mensagens</a></span>
            <div class="fab-icon-holderrr">
                <a id="chat" style="text-decoration: none;" onclick="redirectChat()"><i class="fas fa-comments"></i></a>
            </div>
        </li>
        <li>
            <span class="fab-labelll"><a style="text-decoration: none; color: white;">Meu Perfil</a></span>
            <div class="fab-icon-holderrr">
                <a id="perfil" style="text-decoration: none;" onclick="redirectPerfil()"><i class="fas fa-user"></i></a>
            </div>
        </li>
        <li>
            <span class="fab-labelll"><a style="text-decoration: none; color: white;">Ajuda</a></span>
            <div class="fab-icon-holderrr">
                <a id="ajuda" style="text-decoration: none;" onclick="redirectAjuda()"><i class="fas fa-question"></i></a>
            </div>
        </li>
    </ul>

    <script>
        function redirectHome() {
            window.location.replace('home/home.php');
        }

        function redirectPublicacao() {
            window.location.replace('home/home.php');
        }

        function redirectChat() {
            window.location.replace('chat/users-all.php');
        }

        function redirectPerfil() {
            window.location.replace('perfil/perfil.php');
        }

        function redirectAjuda() {
            window.location.replace('index.php#ajuda');
        }
    </script>

    <script>
        function alertaBtnAjuda() {
            let nome = document.querySelector('#nome').value;
            let email = document.querySelector('#email').value;
            let estado = document.querySelector('#estado').value;
            let mensagem = document.querySelector('#mensagem').value;
            if (nome && email && estado && mensagem != "") {
                alert("Obrigado por entrar em contato, " + nome + ". Você receberá uma resposta em breve!");
            } else {
                alert('Preencha todos os campos do formulário corretamente!')
            }
        }
    </script>
</body>

</html>