<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- criei uma pasta css separado -->
    <link href="css/style.css" rel="stylesheet">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/heroes/">
    <link href='https://fonts.googleapis.com/css?family=Ubuntu:500' rel='stylesheet' type='text/css'>
</head>

<body class="body">
    <nav class="secondaryColor navbar navbar-inverse">
        <div class="container-fluid">
            <div class=" navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">
                    <img src="imgs/logonovo.PNG" alt="logo Scambio" width="110" height="30">

                </a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="textCor  nav navbar-nav">
                    <li><a href="#">Quem Somos</a></li>
                    <li><a href="#">Ajuda</a></li>
                </ul>
                <ul class=" textCor nav navbar-nav navbar-right">
                    <li><a href="cadastro.php"><span class="glyphicon glyphicon-user"></span> cadastre-se</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="acess">
        <div class="acess-form">
            <div class="acess-header">
                <h2>Recuperação de senha</h2>
                <p class="h4 text-pass-recovery">Digite o e-mail cadastrado e verifique sua caixa de entrada do e-mail.</p>
            </div>
            <br>
            <h4>E-mail:</h4>
            <input type="text" placeholder="usuario@usuario.com.br" /><br>
            <br>
            <input type="button" value="Login" class="acess-button" />
            <br>
        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>

</html>