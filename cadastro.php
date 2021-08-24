<?php
    session_start();
    if(isset($_SESSION['id'])){
        header('Location: home.php');
    }
    else{

?>

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
    <script src="./assets/"></script>
    <script src="assets/js/cadastroUsuario.js"></script>
    <script src="assets/js/script.js"></script>
    <script src="assets/js/confirmacao-senha.js"></script>
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
                    <li><a href="../scambio/index.php#comofunciona">Como Funciona?</a></li>
                    <li><a href="../scambio/index.php#quemsomos">Quem Somos</a></li>
                    <li><a href="../scambio/index.php#ajuda">Ajuda</a></li>
                </ul>
                <ul class=" textCor nav navbar-nav navbar-right">
                    <li><a href="login/login.php"><span class="glyphicon glyphicon-log-in"></span> Entrar</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="acess">
        <div class="acess-form acess-form-cadastro">
            <div class="title-cadastro">
                <h2>Junte-se a nossa comunidade</h2>
            </div>

            <form class="row g-3 formCadastro" id="frm" >
                <div class="container div-cadastro input-container">
                    <div class="col-md-6 div-label-input">
                        <label>Nome:</label>
                        <input class="input" name="nome" id="nome" type="text" placeholder="Nome Completo">
                    </div>
                    <div class="col-md-6 div-label-input">
                        <label>Data de nascimento:</label>
                        <input class="dt-nasc" name="dtnasc" id="dtnasc" type="date" id="date" placeholder="">
                    </div>
                    <div class="col-md-6 div-label-input">
                        <label>Celular:</label>
                        <input type="text" name="celular" id="celular" placeholder="( ) 00000-0000" maxlength="15" />
                    </div>
                    <div class="col-md-6 div-label-input">
                        <label>E-mail:</label>
                        <input type="text" name="email" id="email" placeholder="Endereço de E-mail">
                    </div>
                    <div class="col-md-6 div-label-input">
                        <label>Senha:</label>
                        <input type="password" name="senha" id="senha" placeholder="********">
                    </div>
                    <div class="col-md-6 div-label-input">
                        <label>Confirmar Senha:</label>
                        <input type="password" name="conf" id="conf" placeholder="********">
                    </div>
                    <small id="result"></small>
                    <div class="col-md-6 div-label-input">
                        <label>CEP:</label>
                        <input type="text" name="cep" id="cep" placeholder="CEP">
                    </div>
                    <div class="col-md-6 div-label-input">
                        <label>Rua:</label>
                        <input type="text" name="rua" id="rua" placeholder="Nome da Rua">
                    </div>
                    <div class="col-md-6 div-label-input">
                        <label>Número:</label>
                        <input type="text" name="numero" id="numero" placeholder="Número da Residência">
                    </div>
                    <div class="col-md-6 div-label-input">
                        <label>Bairro:</label>
                        <input type="text" name="bairro" id="bairro" placeholder="Nome do Bairro">
                    </div>
                    <div class="col-md-6 div-label-input">
                        <label>Cidade:</label>
                        <input type="text" name="cidade" id="cidade" placeholder="Nome da Cidade">
                    </div>
                    <div class="col-md-6 div-label-input">
                        <label>Estado:</label>
                        <input type="text" name="estado" id="estado" placeholder="Nome do Estado">
                    </div>

                    <div class="col-md-4 button-cadastrar">
                        <button type="submit" id="salvar" name="salvar" class="btn btn-primary">Cadastrar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        $("#celular").mask("(99) 99999-9999");
        $("#cep").mask("99999-999");
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h2 id="retornoEmail"></h2>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>





    <div class="modal fade" id="modalCadastro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h2 id="retornoCadastro"></h2>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>

</body>


</html>
<?php
    }
?>