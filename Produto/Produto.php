<?php

session_start();
if (!isset($_SESSION['id'])) {
    header("./home/home.php");
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scambio</title>
    <link href="../css/produto.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <style>
        body {
            margin-top: 50px;
        }

        .card {
            margin-bottom: 30px;
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
        }

        .card .card-subtitle {
            font-weight: 300;
            margin-bottom: 10px;
            color: #8898aa;
        }

        .table-product.table-striped tbody tr:nth-of-type(odd) {
            background-color: #f2eee8 !important
        }

        .table-product td {
            border-top: 0px solid #dee2e6 !important;
            color: #313336 !important;
        }

        #inpkill {
            margin-top: -24px;
        }
    </style>
</head>

<body style="background-image: linear-gradient(#f2eee8, #d4c1a5, #f2eee8);">
    <div class="container-fluid">
        <a href="../index.php"><img class="img-index" src="../assets/imgs/LOGO_TRANSPARENTE.PNG" alt="logo Scambio" width="110" height="35" style="padding-top: 5px;"></a>
        <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button> -->
        <?php
        if (isset($_SESSION['id'])) {
        ?>
            <form action="logout.php">
                <input id="inpkill" class="inpkill glyphicon buttonLogout" name="DestroySession" type="submit" value="Sair">
            </form>
        <?php
        } else {
        ?>
            header("Location: index.php");
        <?php
        }
        ?>
    </div>
    <div class="container" style="background-color: #fff; width: 70%; border-radius: 1%; margin-top: 50px;">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Harry Potter e a Pedra Filosofal</h3>
                        <h5 class="card-subtitle">@Beatriz Martins</h6>
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-5" style="margin-top: 10px;">
                                    <div class="white-box text-center"><img src="img/harrypotter1.png" class="img-responsive"></div>
                                </div>
                                <div class="col-lg-8 col-md-4 col-sm-9">
                                    <h3 class="box-title mt-5">Descrição do produto</h4>
                                        <p style="font-size: 18px;">Livro em perfeito estado, com pouco tempo de uso e comprado em 2019. Aprenta algumas marcas de uso, mas nada que atrapalhe a leitura.</p>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-8">
                                    <h3 class="box-title mt-5">Outras Informações</h3>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-product">
                                            <tbody>
                                                <tr>
                                                    <td width="200">Nome do livro</td>
                                                    <td>Harry Potter e a Pedra Filosofal</td>
                                                </tr>
                                                <tr>
                                                    <td>Autor</td>
                                                    <td>J. K. Rowling</td>
                                                </tr>
                                                <tr>
                                                    <td>Gênero</td>
                                                    <td>Romance, Literatura infantil, Literatura fantástica, Alta fantasia</td>
                                                </tr>
                                                <tr>
                                                    <td>Idioma</td>
                                                    <td>Portugês</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <button class="btn btn-dark btn-rounded mr-1" data-toggle="tooltip" title="" data-original-title="Add to cart">
                                        <i class="fa fa-user"></i>
                                        Perfil
                                    </button>
                                    <button class="btn btn-success btn-rounded" style="margin-left: 10px;">
                                        <i class="fa fa-comments"></i>
                                        Chat
                                    </button>
                                </div>
                            </div>
                </div>
            </div>
        </div>
    </div>

    <?php include_once('../menu/menu.php'); ?>


</body>

</html>