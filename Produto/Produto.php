<?php

include '../config/conexao.php';

session_start();
if (!isset($_SESSION['id'])) {
    header("location: ../home/home.php"); 
    die();
}

if(!isset($_GET['produto-id'])){
    header("location: ../home/home.php"); 
    die();
}

$id = $_GET['produto-id'];

$SQLANUN = $pdo->prepare(
    
);
$SQLANUN->execute(array(':idlivro' => $id));
$row = $SQLANUN->fetch(PDO::FETCH_ASSOC);


var_dump($row)

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scambio | Produto</title>
    <link rel="shortcut icon" href="../assets/imgs/logoFundo.png" />

    <link href="../css/produto.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style>
        body {
            margin-top: 50px;
        }

        .card {
            margin-bottom: 30px;
            position: relative;
            display: flex;
            flex-direction: column;
            word-wrap: break-word;
            /* background-color: #fff; */
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

        .container-fluid {
            margin-top: -45px;
            /* margin-left: 10px; */
        }

        .white-box {
            width: 200px;
        }

        .w-100 {
            width: 250px !important;
            height: 401px;
        }
    </style>
</head>

<body style="background-image: linear-gradient(#f2eee8, #d4c1a5, #f2eee8);">
    <div class="container-fluid">
        <div style="display: flex; justify-content: space-around;">
            <div style="display: flex; flex-direction: row;">
                <img src="../assets/imgs/munir.jpeg" alt="" width=" 40" height="40" style="border-radius: 30px; border: 3px solid #3CD10C; margin-top: 8px;">
                <p style="font-size: 16px; font-weight: 600; margin-top: 17px; margin-left: 7px;">Munir</p>
            </div>
            <a href="../index.php"><img class="img-index" src="../assets/imgs/LOGO_TRANSPARENTE.PNG" alt="logo Scambio" width="90" height="30" style="padding-top: 4px; margin-top: 3px;"></a>
            <?php
            if (isset($_SESSION['id'])) {
            ?>
                <form action="logout.php" style="margin-top: 27px;">
                    <input id="inpkill" class="inpkill glyphicon buttonLogout" name="DestroySession" type="submit" value="Sair" style="height: 42px;">
                </form>
            <?php
            } else {
            ?>
                header("Location: index.php");
            <?php
            }
            ?>
        </div>

    </div>
    <div style="display: flex; justify-content: center; flex-direction: column;">

        <div class="container" style="width: 170vh; border-radius: 1%; margin-top: 8px; margin-left: 110px;">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div style="margin-top: 8px; margin-left: 10px;">
                            <h2 class="card-title" style="font-size: 24px;">O Pequeno Principe</h3>
                                <h5 class="card-subtitle" style="font-size: 16px;">@Beatriz Martins</h6>
                        </div>
                        <div style="display: flex; flex-direction: row; margin-top: -28px;">
                            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" style="margin-top: 20px;">
                                <div class="carousel-inner" style="margin-top: 20px;">
                                    <div class="carousel-item active">
                                        <img class="d-block w-100" src="../assets/imgs/aculpaedasestrelas.jpg" alt="First slide">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="../assets/imgs/livrozul.jpg" alt="Second slide">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="../assets/imgs/acabana.jpg" alt="Third slide">
                                    </div>
                                </div>
                                <a class="carousel-control-prev" id="prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" id="next" href="#carouselExampleControls" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>

                            <div style="margin-left: 20px; margin-top: -80px;">
                                <div class="col-lg-8 col-md-4 col-sm-9" style="max-width: 100%;">
                                    <h3 class="box-title mt-5" style="font-size: 21px;">Descrição do produto</h3>
                                    <p style="font-size: 16px;">Livro em perfeito estado, com pouco tempo de uso e comprado em 2019. Aprenta algumas marcas de uso, mas nada que atrapalhe a leitura.</p>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-8" style="max-width: 100%;">
                                    <h3 class="box-title mt-5" style="font-size: 20px;">Outras Informações</h3>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-product">
                                            <tbody>
                                                <tr>
                                                    <td width="200" style="font-size: 15px;">Nome do livro</td>
                                                    <td style="font-size: 14px;">O Pequeno Principe</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-size: 15px;">Gênero</td>
                                                    <td style="font-size: 14px;">Romance, Literatura infantil, Literatura fantástica, Alta fantasia</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-size: 15px;">Autor</td>
                                                    <td style="font-size: 14px;">J. K. Rowling</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-size: 15px;">Data de publicação</td>
                                                    <td style="font-size: 14px;">12/15/2021</td>
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

                                    <!-- <a href="users-all.php?user_id='.$value['cd_usuario'].'">    -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div style="display: flex; justify-content: center; align-items: center;">
            <h2 style="font-size: 21px;">Livros que podem te interessar</h2>

        </div> -->
    </div>


    <?php include_once('../menu/menu.php'); ?>
    <script>
        $(document).ready(function() {
            let qntImg = document.getElementsByClassName('carousel-item').length;
            if (qntImg == 1) {
                document.getElementById('prev').style.display = 'none';
                document.getElementById('next').style.display = 'none';
            }
        })
    </script>

</body>

</html>