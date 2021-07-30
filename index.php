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
    <title>Scambio</title>
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
                    <li><a href="#comofunciona">Como Funciona?</a></li>
                    <li><a href="#sobre">Quem Somos</a></li>
                    <li><a href="#ajuda">Ajuda</a></li>
                </ul>
                <ul class=" textCor nav navbar-nav navbar-right">
                    <li><a href="cadastro.php"><span class="glyphicon glyphicon-user"></span> Cadastre-se</a></li>
                    <li><a href="login/login.php"><span class="glyphicon glyphicon-log-in"></span> Entrar</a></li>
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
                        <a class="btn-solid-lg secondary" href="login/login.php"><i class="fab fa-google-play"></i>Entrar</a>
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
        <h2 class="h1-large" style="font-family: Cutive;">Como Funciona?</h2>
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
        <h2 class="h1-large" style="font-family: Cutive;">Sobre Nós e o Projeto</h2>
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
            <img class="img-thamirys int-generic" src="assets/imgs/thamirys.jpg" />
            <span class="name-int"> Thamirys Abilio </span>
            <br>
            <span class="name-int"> Back-end & Banco de Dados</span>
            <br>
            <span class="name-int"> Cubatão - SP </span>
            <br>
            <span class="name-int"> 31 anos </span>
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
        <h2 class="h1-large" style="font-family: Cutive;" >Precisa de Ajuda?</h2>
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
                    <input onclick="alertaBtnAjuda()" type="submit" value="Enviar">
                </div>
            </form>
        </div>
    </div>

    <script>
        function alertaBtnAjuda() {
            let input = document.querySelector('#nome');
            let nome = input.value;
            alert("Olá " + nome + ". Você receberá uma resposta em breve!");
        }
    </script>
</body>

</html>