<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/heroes/">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Ubuntu:500' rel='stylesheet' type='text/css'>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
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
            <div class="collapse navbar-collapse" style=" background-color: #000000;" id="myNavbar">
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
    <div class="acess">
        <div class="acess-form acess-form-cadastro">
            <div class="acess-header">
                <h2>Junte-se a nossa comunidade</h2>
            </div>

            <form class="row g-3 formCadastro">
                <div class="container div-senha">
                    <div class="div-texto-senha">
                        <p class="h4 texto-senha">
                            Digite o e-mail cadastrado e verifique sua caixa de entrada do e-mail.
                        </p>
                    </div>
                    <div class="col-md-12 div-email-login">
                        <h4>E-mail:</h4>
                        <input type="text" placeholder="Endereço de E-mail">
                    </div>
                    <div class="col-md-12">
                        <h4>Senha:</h4>
                        <input type="password" placeholder="********">
                    </div>
                    <div class="col-md-4 button-recuperacao">
                        <button type="submit" class="btn btn-primary">Enviar recuperação</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>

    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>


</html>