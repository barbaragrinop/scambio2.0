<?php

include '../config/conexao.php';

session_start();
if (!isset($_SESSION['id'])) {
    header("location: ../home/home.php");
    die();
}

if (!isset($_GET['produto-id'])) {
    header("location: ../home/home.php");
    die();
}

$id = $_GET['produto-id'];

$SQLANUN = $pdo->prepare(
    "SELECT * from db_scambio.tb_usuario
    inner join db_scambio.tb_livro
    on tb_usuario.cd_usuario = tb_livro.cd_usuario
    inner join db_scambio.tb_logradouro
    on tb_logradouro.cd_logradouro = tb_usuario.cd_logradouro
    inner join db_scambio.tb_bairro
    on tb_bairro.cd_bairro = tb_logradouro.cd_bairro
    inner join db_scambio.tb_cidade 
    on tb_cidade.cd_cidade = tb_bairro.cd_cidade
    inner join db_scambio.tb_uf
    on tb_uf.cd_uf = tb_cidade.cd_uf
    where cd_livro = :idlivro"
);
$SQLANUN->execute(array(':idlivro' => $id));
$row = $SQLANUN->fetch(PDO::FETCH_ASSOC);
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
            margin-top: 20px;
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
            width: 230px !important;
            height: 335px;
        }

        /* #titulo-descricao{
            font-weight: 700;
        } */

        @media (max-height: 820px) {
            .card {
                margin-top: -60px;
            }
        }

        body {
            overflow: hidden;
        }
    </style>
</head>

<body style="background-image: linear-gradient(#f2eee8, #d4c1a5, #f2eee8);">
    <div class="container-fluid">
        <div style="display: flex; justify-content: space-around;">
            <?php
            $sql2 = $pdo->prepare("SELECT * FROM db_scambio.tb_usuario where cd_usuario = :id");
            $sql2->execute(array(':id' => $_SESSION['id']));
            if ($sql2->rowCount() >= 1) {
                $row2 = $sql2->fetch((PDO::FETCH_ASSOC));
                $sql2->closeCursor();
            }
            ?>
            <div style="display: flex; flex-direction: row;">
                <?php
                if (!isset($row2['DS_IMGP']) && empty($row2['DS_IMGP'])) {
                    $img  = '<img src="https://i1.wp.com/terracoeconomico.com.br/wp-content/uploads/2019/01/default-user-image.png?ssl=1"  alt="" width="40" height="40" style="border-radius: 30px; border: 3px solid #3CD10C; margin-top: 8px;">';
                } else {
                    $img = '<img src="../fotosuser/' . $row2['DS_IMGP'] . '" alt="" width="40" height="40" style="border-radius: 30px; border: 3px solid #3CD10C; margin-top: 8px;">';
                }
                echo $img;
                ?>
                <p style="font-size: 16px; font-weight: 600; margin-top: 17px; margin-left: 7px;"><?= $row2['nm_usuario'] ?></p>
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

                header('Location:../login/login.php');
            }
            ?>
        </div>

    </div>
    <div>

        <div style="display: flex; justify-content: center; height: 100vh; align-items: center;">
            <div class="col-md-12" style="max-width: 80%;">
                <div class="card">
                    <div class="card-body">
                        <div style="margin-top: 8px; margin-left: 10px; ">
                            <div style="display: flex; flex-direction: row;">
                                <h2 class="card-title" style="font-size: 24px;"><?= $row['nm_livro'] ?></h2>
                            </div>
                            <div class="" style="display: block; overflow:hidden; width: 25%;">
                                <div style="display: flex; flex-direction: row;  align-items: center; ">
                                    <?php
                                    if (!isset($row['DS_IMGP']) && empty($row['DS_IMGP'])) {
                                        $img  = '<img src="https://i1.wp.com/terracoeconomico.com.br/wp-content/uploads/2019/01/default-user-image.png?ssl=1"  alt="" width="40" height="40" style="border-radius: 30px; border: 3px solid #3CD10C; margin-top: 8px;">';
                                    } else {
                                        $img = '<img src="../fotosuser/' . $row['DS_IMGP'] . '" alt="" width="40" height="40" style="border-radius: 30px; border: 3px solid #3CD10C; margin-top: 8px;">';
                                    }
                                    echo $img;
                                    ?>
                                    <!-- <img style="border: 1px #808080;  border-style: ridge; width: 39px; height: 39px; border-radius: 9999px;" src="https://flammo.com.br/app/uploads/2017/12/148243-o-que-e-experiencia-do-usuario-e-como-ela-impacta-suas-vendas.jpg" alt="Foto do usuário que postou"> -->
                                    <h5 class="card-subtitle" style="font-size: 16px; margin-left: 10px;margin-top: 20px; overflow:hidden;">@<?= $row['nm_usuario'] ?></h5>
                                </div>
                            </div>

                        </div>
                        <div style="display: flex; flex-direction: row; margin-top: -28px;">
                            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" style="margin-top: 20px;">
                                <div class="carousel-inner" style="margin-top: 20px;">
                                    <!-- fotos aqui -->
                                    <?php
                                    if (isset($row['foto1'])) { ?>
                                        <div class="carousel-item active">
                                            <img class="d-block w-100" src="../fotos/<?= $row['foto1'] ?>" alt="First slide">
                                        </div>
                                    <?php       } else if (isset($row['foto2'])) { ?>
                                        <div class="carousel-item">
                                            <img class="d-block w-100" src="../fotos/<?= $row['foto2'] ?>" alt="Second slide">
                                        </div>
                                    <?php       } else if (isset($row['foto3'])) { ?>
                                        <div class="carousel-item">
                                            <img class="d-block w-100" src="../fotos/<?= $row['foto2'] ?>" alt="Third slide">
                                        </div>
                                    <?php       } else { ?>
                                        <div class="carousel-item">
                                            <img class="d-block w-100" src="../fotos/<?= $row['foto1'] ?>" alt="Third slide">
                                        </div>
                                    <?php } ?>
                                </div>
                                <a class="carousel-control-prev" id="prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Anterior</span>
                                </a>
                                <a class="carousel-control-next" id="next" href="#carouselExampleControls" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Próxima</span>
                                </a>
                            </div>

                            <div style="margin-left: 20px; margin-top: -80px; width: 100%;">
                                <div class="col-lg-8 col-md-4 col-sm-9" style="max-width: 100%;">
                                    <h3 class="box-title mt-5" id="titulo-descricao" style="font-size: 21px; font-weight: 700;">Descrição</h3>
                                    <p style="font-size: 16px;"><?= $row['descricao'] ?></p>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-8" style="max-width: 100%; width: 100%;">
                                    <h2 class="box-title mt-5" style="font-size: 17px; display: flex; justify-content: left; font-weight: 700; margin-left: 1px;">Outras Informações</h2>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-product">
                                            <tbody>
                                                <tr>
                                                    <td width="200" style="font-size: 15px;font-weight: 600;">Nome do livro</td>
                                                    <td style="font-size: 14px;"><?= $row['nm_livro'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="font-size: 15px;font-weight: 600;">Gênero</td>
                                                    <td style="font-size: 14px;"><?= $row['nm_genero'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="font-size: 15px;font-weight: 600;">Autor</td>
                                                    <td style="font-size: 14px;"><?= $row['nm_autor'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="font-size: 15px;font-weight: 600;">Data de publicação</td>
                                                    <td style="font-size: 14px;"><?= date('d/m/Y', strtotime(($row['dt_publicacao']))) ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div style="display:flex; justify-content:end; padding: 10px">
                                        <a href="../perfil/perfil2.php?user_id=<?= $row['cd_usuario'] ?>">
                                            <?php
                                            $_SESSION['perfil'] = $row['cd_usuario'];
                                            ?>
                                            <button class="btn btn-dark btn-rounded mr-1" data-toggle="tooltip" title="" data-original-title="Add to cart">
                                                <i class="fa fa-user"></i>
                                                Perfil
                                            </button>
                                        </a>
                                        <a href="../chat/users-all.php?user_id=<?= $row['cd_usuario'] ?>">
                                            <button class="btn btn-success btn-rounded" style="margin-left: 10px;">
                                                <i class="fa fa-comments"></i>
                                                Chat
                                            </button>
                                        </a>
                                    </div>

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


    <?php
    include_once('../menu/menu.php');
    ?>
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