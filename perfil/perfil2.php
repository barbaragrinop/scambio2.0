<?php
session_start();
include_once '../config/conexao.php';

if (!isset($_SESSION['id'])) {
    header("Location: ../index.php");
}

// $userId = $_;
if (isset($_SESSION['perfil'])) {
    $id = $_SESSION['perfil'];
    
    $sql = $pdo->prepare("SELECT * from db_scambio.tb_usuario
                        inner join db_scambio.tb_logradouro
                        on tb_usuario.cd_logradouro = tb_logradouro.cd_logradouro
                        inner join db_scambio.tb_bairro 
                        on tb_bairro.cd_bairro = tb_logradouro.cd_bairro
                        inner join db_scambio.tb_cidade
                        on tb_cidade.cd_cidade = tb_bairro.cd_cidade
                        inner join db_scambio.tb_uf
                        on tb_uf.cd_uf = tb_cidade.cd_uf
                        where cd_usuario = :id");
    $sql->execute(array(':id' => $id));
    if ($sql->rowCount() >= 1) {
        $row2 = $sql->fetch((PDO::FETCH_ASSOC));
    }
}
else{
    
    $sql2 = $pdo->prepare('SELECT * from db_scambio.tb_usuario
    inner join db_scambio.tb_logradouro
    on tb_usuario.cd_logradouro = tb_logradouro.cd_logradouro
    inner join db_scambio.tb_bairro 
    on tb_bairro.cd_bairro = tb_logradouro.cd_bairro
    inner join db_scambio.tb_cidade
    on tb_cidade.cd_cidade = tb_bairro.cd_cidade
    inner join db_scambio.tb_uf
    on tb_uf.cd_uf = tb_cidade.cd_uf
    where cd_usuario = :id');
    $sql2->execute(array(':id' => $_SESSION['id']));
    if ($sql2->rowCount() >= 1) {
        $row2 = $sql2->fetch((PDO::FETCH_ASSOC));
    }
}





?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Scambio | Perfil</title>
    <link rel="shortcut icon" href="assets/imgs/logoFundo.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../home/style.css">
    <link rel="stylesheet" href="../fab/fab.css">


    <style>
        #inpkill {
            /* margin-right: 9px; */
            /* margin-top: -25px; */

        }

        .img-responsive {
            width: 165px;
            height: 238px;
        }

        .product-info,
        .card {
            width: 125px;
        }

        .product-info .row {
            margin-left: -21px;
        }

        .product-content .row {
            display: flex;
        }

        .div-inff {
            height: 238px;
            width: 326px;
        }

        .modal-header,
        .modal-footer {
            background-image: none;
        }

        .btn-secondary {
            color: black;
        }

        @media screen and (min-width: 1368px) and (max-width: 1919px) {
            #panel {
                width: 101%;
            }
        }

        @media screen and (min-width: 1367px) {
            .container {
                width: 1320px;
            }
        }

        @media screen and (min-width: 1920px) {
            .container {
                width: 1655px;
            }

            #panel {
                width: 102.3%;
            }

        }

        @media (min-width: 992px) {
            .col-md-5 {
                width: 30.19667%;
            }
        }

        @media screen and (max-width: 1134px) {
            .container {
                width: 1140px;
            }
        }

        @media screen and (max-width: 900px) {
            .container {
                width: 840px;
            }
        }

        @media screen and (max-width: 900px) {
            .col-md-5 {
                width: 38.99667%;
            }
        }

        @media screen and (max-width: 1369px) {
            @media (min-width: 992px) {
                .col-md-5 {
                    width: 36.99667%;
                }
            }
        }

        @media screen and (max-width: 1669px) {
            .col-md-5 {
                width: 49.99667%;
            }
        }

        .product-content .product-deatil {
            padding-bottom: 0px !important;
        }

        .form-control {
            width: 90px !important;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div style="display: flex; justify-content: space-around;">
            <?php
            $sql2 = $pdo->prepare("SELECT * FROM db_scambio.tb_usuario where cd_usuario = :id");
            $sql2->execute(array(':id' => $_SESSION['id']));
            if ($sql2->rowCount() >= 1) {
                $row = $sql2->fetch((PDO::FETCH_ASSOC));
            }

            ?>
            <div style="display: flex; flex-direction: row;">
                <?php
                if (!isset($row['DS_IMGP']) && empty($row['DS_IMGP'])) {
                    $img  = '<img src="https://i1.wp.com/terracoeconomico.com.br/wp-content/uploads/2019/01/default-user-image.png?ssl=1"  alt="" width="40" height="40" style="border-radius: 30px; border: 3px solid #3CD10C; margin-top: 8px;">';
                } else {
                    $img = '<img src="../fotosuser/' . $row['DS_IMGP'] . '" alt="" width="40" height="40" style="border-radius: 30px; border: 3px solid #3CD10C; margin-top: 8px;">';
                }
                echo $img;
                ?>
                <p style="font-size: 16px; font-weight: 600; margin-top: 17px; margin-left: 7px; color: black;"><?= $row['nm_usuario'] ?></p>
            </div>
            <a href="../index.php"><img class="img-index" src="../assets/imgs/LOGO_TRANSPARENTE.PNG" alt="logo Scambio" width="104" height="30" style="margin-top: 9px;"></a>
            </button>
            <?php
            if (isset($_SESSION['id'])) {
            ?>
                <form action="../logout.php">
                    <input style="font-size: 14px;" id="inpkill" class="inpkill glyphicon buttonLogout" name="DestroySession" type="submit" value="Sair">
                </form>
            <?php
            } else {
                header("Location: ../index.php");
            }
            ?>

        </div>
    </div>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <div class="container bootstrap snippets bootdey">
        <div class="row">
            <div class="profile-nav col-md-3">
                <div class="panel">
                    <div class="user-heading round">
                        <a href="#" class="<?= $_SESSION['status'] == 'Online' ? 'profile-on' : 'profile-off' ?>">
                            <?php
                            if (!isset($row['DS_IMGP']) && empty($row['DS_IMGP'])) {
                                $img  = '<img src="https://i1.wp.com/terracoeconomico.com.br/wp-content/uploads/2019/01/default-user-image.png?ssl=1"  alt="" width="100%" height="100%">';
                            } else {
                                $img = '<img src="../fotosuser/' . $row['DS_IMGP'] . '" alt="" width="100%" height="100%">';
                            }
                            echo $img;
                            ?>
                        </a>
                        <h1><?= $row2['nm_usuario'] ?></h1>
                    </div>

                    <ul class="nav nav-pills nav-stacked">
                        <li id="tagPerfil" class="active"><a onclick="abrirDivPerfil()" href="#"> <i class="fa fa-user"></i> Perfil</a></li>
                        <li id="tagMatch"><a onclick="abrirDivMatch()" href="#"> <i class="fa fa-calendar"></i>Match <span class="label label-warning pull-right r-activity"><span class="nmr-match">0</span></span></a></li>
                        <li id="tagEditarPerfil"><a onclick="abrirDivEditarPerfil()" href="#"> <i class="fa fa-edit"></i>Editar Perfil</a></li>
                    </ul>
                </div>
            </div>
            <div class="profile-info col-md-9" style="display: block;">
                <div id="panel" class="panel">
                    <div class="panel-body bio-graph-info">
                        <h1>Biografia</h1>
                        <div class="row">
                            <div class="bio-row">
                                <p><span>Nome:</span><?= $row2['nm_usuario'] ?></p>
                            </div>
                            <div class="bio-row">
                                <p><span>Estado:</span><?= $row2['sg_uf'] ?></p>
                            </div>
                            <div class="bio-row">
                                <p><span>Cidade:</span><?= $row2['nm_cidade'] ?></p>
                            </div>
                            <div class="bio-row">
                                <p><span>Aniversario:</span><?= date('d/m/Y', strtotime(($row2['dt_nascimento']))) ?></p>
                            </div>
                            <div class="bio-row">
                                <p><span>Status:</span><?= $_SESSION['status'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="panelEditPerfil" class="panel" style="display: none; height: 400px;">
                    <div id="editprofile" class=" panel-body bio-graph-info ">
                    </div>
                </div>



                <div id="perfil">
                    <div class="container publicacoes return" style="margin-left: -27px; width: 107%;">

                    </div>
                </div>

                <div id="match" style="display: none;">

                    <div class="col-md-7 px-3" style="background-color: #ffffff; display: flex; width: 460px; border-radius: 2%">
                        <div class="card-block px-6">
                            <p style="font-size:15px;">Barbara Hellen</p>
                            <p><img class=" img-fluid" src="../assets/imgs/barbara.jpg" alt="card image" style="width:150px; height: 150px; border-radius: 90%;"></p>
                        </div>
                        <div class="card-block px-2" style="margin-left: -15%;">
                            <p style=" margin-left: 20px; font-size:15px;">Beatriz Martins</p>
                            <p><img class=" img-fluid" src="../assets/imgs/beatriz.jpg" alt="card image" style="width: 150px; height: 150px; border-radius: 90%;"></p>
                        </div>
                        <div class="card-block px-2">
                            <p style="font-size:15px;">A cabana</p>
                            <p><img class=" img-fluid" src="../assets/imgs/acabana.jpg" alt="card image" style="width: 130px; height: 150px; border-radius: 5%;"></p>
                        </div>
                    </div>
                </div>

                <!-- MODAL DELETE -->
                <div class="modal fade" id="exampleModalLongD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="lbdel"></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Tem certeza que deseja excluir essa postagem ?
                            </div>
                            <div class="modal-footer">
                                <button type="button" id="fechar" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                    <input type="hidden" id="idlb" name="idlb">
                                    <input id="btn-del" type="submit" value="Excluir" class="btn btn-danger">
                            </div>
                            <!-- <div class="modal-footer" style="display: flex;">

                            </div> -->
                        </div>
                    </div>
                </div>
                <!-- FIM MODAL DELETE -->

                <!-- INICIO MODAL EDIT -->
                <div class="modal fade" id="exampleModalLongE" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Editar Publicação</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="POST">
                                <div class="modal-body" style="display: inline-block; flex-direction: column;">
                                    <div style="display: flex; flex-direction: column; margin-left: 30px;">
                                        <div class="form-group" style=" margin-left: 200px; margin-top: -350px;">
                                            <label for="recipient-name" class="col-form-label">Livro:</label>
                                            <input type="text" class="form-control" name="livro" id="lbedit" style="width: 300px !important;">
                                        </div>
                                        <div class="form-group" style="margin-left: 200px;">
                                            <label for="message-text" class="col-form-label">Descrição:</label>
                                            <textarea class="form-control" name="describe" id="descedit" style="width: 300px !important; height: 100px;"></textarea>
                                        </div>
                                        <div class="form-group" style="margin-left: 200px;">
                                            <label for="message-text" class="col-form-label">Gênero:</label>
                                            <input type="text" class="form-control" name="genero" id="lbgenero" style="width: 300px !important;">
                                        </div>
                                        <div class="form-group" style="margin-left: 200px;">
                                            <label for="message-text" class="col-form-label">Autor:</label>
                                            <input type="text" class="form-control" name="autor" id="lbautedit" style="width: 300px !important;">
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                    <input type="hidden" id="values" name="cda" id="">
                                    <input type="submit" id="edit" class="editf btn btn-primary" value="Salvar Alterações">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- FIM MODAL EDIT -->
            </div>
        </div>


        <?php include('../menu/menu.php') ?>


        <style type="text/css">
            body {
                color: #797979;
                font-family: 'Open Sans', sans-serif;
                padding: 0px !important;
                margin: 0px !important;
                font-size: 13px;
                text-rendering: optimizeLegibility;
                -webkit-font-smoothing: antialiased;
                -moz-font-smoothing: antialiased;
                background-image: linear-gradient(to right, #f2eee8, #d4c1a5, #f2eee8);
            }

            .title {

                margin-bottom: 50px;
                text-transform: uppercase;
            }

            .card-block {
                font-size: 1em;
                position: relative;
                margin: 0;
                padding: 1em;
                border: none;
                border-top: 1px solid rgba(34, 36, 38, .1);
                box-shadow: none;

            }

            .card {
                font-size: 1em;
                overflow: hidden;
                padding: 5;
                border: none;
                border-radius: .28571429rem;
                box-shadow: 0 1px 3px 0 #d4d4d5, 0 0 0 1px #d4d4d5;
                margin-top: 20px;
            }

            .carousel-indicators li {
                border-radius: 12px;
                width: 12px;
                height: 12px;
                background-color: #404040;
            }

            .carousel-indicators li {
                border-radius: 12px;
                width: 12px;
                height: 12px;
                background-color: #404040;
            }

            .carousel-indicators .active {
                background-color: white;
                max-width: 12px;
                margin: 0 3px;
                height: 12px;
            }

            .carousel-control-prev-icon {
                background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23fff' viewBox='0 0 8 8'%3E%3Cpath d='M5.25 0l-4 4 4 4 1.5-1.5-2.5-2.5 2.5-2.5-1.5-1.5z'/%3E%3C/svg%3E") !important;
            }

            .carousel-control-next-icon {
                background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23fff' viewBox='0 0 8 8'%3E%3Cpath d='M2.75 0l-1.5 1.5 2.5 2.5-2.5 2.5 1.5 1.5 4-4-4-4z'/%3E%3C/svg%3E") !important;
            }

            .btn {
                margin-top: auto;
            }

            .product-content {
                border: 2px solid #dfe5e9;
                margin-bottom: 20px;
                margin-top: 12px;
                background: #fff;
                padding: 4px;
                -webkit-box-shadow: 0 1px 4px 0 rgba(0, 0, 0, 0.37);
                box-shadow: 0 1px 4px 0 rgba(0, 0, 0, 0.37);
            }

            .product-content .carousel-control.left {
                margin-left: 0
            }

            .product-content .product-image {
                background-color: #fff;
                display: block;
                min-height: 238px;
                overflow: hidden;
                position: relative
            }

            .product-content .product-deatil {
                border-bottom: 1px solid #dfe5e9;
                padding-bottom: 17px;
                padding-left: 16px;
                padding-top: 16px;
                position: relative;
                background: #fff
            }

            .product-content .product-deatil h5 a {
                color: #2f383d;
                font-size: 20px;
                line-height: 19px;
                text-decoration: none;
                padding-left: 0;
                margin-left: 0
            }

            .product-content .product-deatil h5 a span {
                color: #9aa7af;
                display: block;
                font-size: 13px
            }

            .product-content .product-deatil span.tag1 {
                border-radius: 50%;
                color: #fff;
                font-size: 15px;
                height: 50px;
                padding: 13px 0;
                position: absolute;
                right: 10px;
                text-align: center;
                top: 10px;
                width: 50px
            }

            .product-content .product-deatil span.sale {
                background-color: #21c2f8
            }

            .product-content .product-deatil span.discount {
                background-color: #71e134
            }

            .product-content .product-deatil span.hot {
                background-color: #fa9442
            }

            .product-content .description {
                height: 66px;
                font-size: 12.5px;
                line-height: 20px;
                padding: 10px 14px 16px 19px;
                background: #fff
            }

            .product-content .product-info {
                padding: 11px 19px 10px 20px
            }

            .product-content .product-info a.add-to-cart {
                color: #2f383d;
                font-size: 13px;
                padding-left: 16px
            }

            .product-content name.a {
                padding: 5px 10px;
                margin-left: 16px
            }

            .product-info.smart-form .btn {
                padding: 6px 20px;
                margin-left: 5px;
                margin-top: -10px
            }

            .product-entry .product-deatil {
                border-bottom: 1px solid #dfe5e9;
                padding-bottom: 17px;
                padding-left: 16px;
                padding-top: 16px;
                position: relative
            }

            .product-entry .product-deatil h5 a {
                color: #2f383d;
                font-size: 15px;
                line-height: 19px;
                text-decoration: none
            }

            .product-entry .product-deatil h5 a span {
                color: #9aa7af;
                display: block;
                font-size: 13px
            }

            .load-more-btn {
                background-color: #21c2f8;
                border-bottom: 2px solid #037ca5;
                border-radius: 2px;
                border-top: 2px solid #0cf;
                margin-top: 20px;
                padding: 9px 0;
                width: 100%
            }

            .product-block .product-deatil p.status-container span,
            .product-content .product-deatil p.status-container span,
            .product-entry .product-deatil p.status-container span,
            .shipping table tbody tr td p.status-container span,
            .shopping-items table tbody tr td p.status-container span {
                color: #020202;
                font-family: Lato, sans-serif;
                font-size: 16px;
                line-height: 20px
            }

            .product-info.smart-form .rating label {
                margin-top: 0
            }

            .product-wrap .product-image span.tag2 {
                position: absolute;
                top: 10px;
                right: 10px;
                width: 36px;
                height: 36px;
                border-radius: 50%;
                padding: 10px 0;
                color: #fff;
                font-size: 11px;
                text-align: center
            }

            .product-wrap .product-image span.sale {
                background-color: #57889c
            }

            .product-wrap .product-image span.hot {
                background-color: #a90329
            }

            .shop-btn {
                position: relative
            }

            .shop-btn>span {
                background: #a90329;
                display: inline-block;
                font-size: 10px;
                box-shadow: inset 1px 1px 0 rgba(0, 0, 0, .1), inset 0 -1px 0 rgba(0, 0, 0, .07);
                font-weight: 700;
                border-radius: 50%;
                padding: 2px 4px 3px !important;
                text-align: center;
                line-height: normal;
                width: 19px;
                top: -7px;
                left: -7px
            }

            .description-tabs {
                padding: 30px 0 5px !important
            }

            .description-tabs .tab-content {
                padding: 10px 0
            }

            .product-deatil {
                padding: 30px 30px 50px
            }

            .product-deatil hr+.description-tabs {
                padding: 0 0 5px !important
            }

            .product-deatil .carousel-control.left,
            .product-deatil .carousel-control.right {
                background: none !important
            }

            .product-deatil .glyphicon {
                color: #3276b1
            }

            .product-deatil .product-image {
                border-right: 0px solid #fff !important
            }

            .product-deatil .name {
                margin-top: 0;
                margin-bottom: 0
            }

            .product-deatil .name small {
                display: block
            }

            .product-deatil .name a {
                margin-left: 0
            }

            .product-deatil .status-container {
                font-size: 24px;
                margin: 0;
                font-weight: 300
            }

            .product-deatil .status-container small {
                font-size: 12px
            }

            .product-deatil .fa-2x {
                font-size: 16px !important
            }

            .product-deatil .fa-2x>h5 {
                font-size: 12px;
                margin: 0
            }

            .product-deatil .fa-2x+a,
            .product-deatil .fa-2x+a+a {
                font-size: 13px
            }

            .product-deatil .certified {
                margin-top: 10px
            }

            .product-deatil .certified ul {
                padding-left: 0
            }

            .product-deatil .certified ul li:not(first-child) {
                margin-left: -3px
            }

            .product-deatil .certified ul li {
                display: inline-block;
                background-color: #f9f9f9;
                padding: 13px 19px
            }

            .product-deatil .certified ul li:first-child {
                border-right: none
            }

            .product-deatil .certified ul li a {
                text-align: left;
                font-size: 12px;
                color: #6d7a83;
                line-height: 16px;
                text-decoration: none
            }

            .product-deatil .certified ul li a span {
                display: block;
                color: #21c2f8;
                font-size: 13px;
                font-weight: 700;
                text-align: center
            }

            .product-deatil .message-text {
                width: calc(100% - 70px)
            }

            @media only screen and (min-width:1024px) {
                .product-content div[class*=col-md-4] {
                    padding-right: 0
                }

                .product-content div[class*=col-md-8] {
                    padding: 0 13px 0 0
                }

                .product-wrap div[class*=col-md-5] {
                    padding-right: 0
                }

                .product-wrap div[class*=col-md-7] {
                    padding: 0 13px 0 0
                }

                .product-content .product-image {
                    border-right: 1px solid #dfe5e9
                }

                .product-content .product-info {
                    position: relative
                }
            }

            .profile-nav,
            .profile-info {
                margin-top: 30px;
            }

            .profile-nav .user-heading {
                background: #d4c1a5;
                color: #fff;
                border-radius: 4px 4px 0 0;
                -webkit-border-radius: 4px 4px 0 0;
                padding: 30px;
                text-align: center;
            }

            .profile-nav .user-heading.round a {
                border-radius: 50%;
                -webkit-border-radius: 50%;
                display: inline-block;
            }

            .profile-on {
                border: 10px solid rgba(13, 255, 13, 0.5);
            }

            .profile-off {
                border: 10px solid rgba(245, 0, 0, 0.8);
            }

            .profile-nav .user-heading a img {
                width: 112px;
                height: 112px;
                border-radius: 50%;
                -webkit-border-radius: 50%;
            }

            .profile-nav .user-heading h1 {
                font-size: 22px;
                font-weight: 300;
                margin-bottom: 5px;
            }

            .profile-nav .user-heading p {
                font-size: 12px;
            }

            .profile-nav ul {
                margin-top: 1px;
            }

            .profile-nav ul>li {
                border-bottom: 1px solid #ebeae6;
                margin-top: 0;
                line-height: 30px;
            }

            .profile-nav ul>li:last-child {
                border-bottom: none;
            }

            .profile-nav ul>li>a {
                border-radius: 0;
                -webkit-border-radius: 0;
                color: #89817f;
                border-left: 5px solid #fff;
            }

            .profile-nav ul>li>a:hover,
            .profile-nav ul>li>a:focus,
            .profile-nav ul li.active a {
                background: #f8f7f5 !important;
                border-left: 5px solid #d4c1a5;
                ;
                color: #89817f !important;
            }

            .profile-nav ul>li:last-child>a:last-child {
                border-radius: 0 0 4px 4px;
                -webkit-border-radius: 0 0 4px 4px;
            }

            .profile-nav ul>li>a>i {
                font-size: 24px;
                padding-right: 10px;
                color: #bcb3aa;

            }

            .r-activity {
                margin: 6px 0 0;
                font-size: 12px;
            }


            .p-text-area,
            .p-text-area:focus {
                border: none;
                font-weight: 300;
                box-shadow: none;
                color: #c3c3c3;
                font-size: 16px;
            }

            .profile-info .panel-footer {
                background-color: #f8f7f5;
                border-top: 1px solid #e7ebee;
            }

            .profile-info .panel-footer ul li a {
                color: #7a7a7a;
            }

            .bio-graph-heading {
                background: #fbc02d;
                color: #fff;
                text-align: center;
                font-style: italic;
                padding: 40px 110px;
                border-radius: 4px 4px 0 0;
                -webkit-border-radius: 4px 4px 0 0;
                font-size: 16px;
                font-weight: 300;
            }

            .bio-graph-info {
                color: #89817e;
            }

            .bio-graph-info h1 {
                font-size: 27px;
                font-weight: 300;
                margin: 0 0 20px;
            }

            .bio-row {
                width: 50%;
                float: left;
                margin-bottom: 10px;
                padding: 0 15px;
                font-size: 16px;
            }

            .label-warning {
                background-color: #d4c1a5;
            }

            .bio-row p span {
                width: 100px;
                display: inline-block;
            }

            .bio-chart,
            .bio-desk {
                float: left;
            }

            .bio-chart {
                width: 40%;
            }

            .bio-desk {
                width: 60%;
            }

            .bio-desk h4 {
                font-size: 15px;
                font-weight: 400;
            }

            .bio-desk h4.terques {
                color: #4CC5CD;
            }

            .bio-desk h4.red {
                color: #e26b7f;
            }

            .bio-desk h4.green {
                color: #97be4b;
            }

            .bio-desk h4.purple {
                color: #caa3da;
            }

            .file-pos {
                margin: 6px 0 10px 0;
            }

            .profile-activity h5 {
                font-weight: 300;
                margin-top: 0;
                color: #c3c3c3;
            }

            .summary-head {
                background: #ee7272;
                color: #fff;
                text-align: center;
                border-bottom: 1px solid #ee7272;
            }

            .summary-head h4 {
                font-weight: 300;
                text-transform: uppercase;
                margin-bottom: 5px;
            }

            .summary-head p {
                color: rgba(255, 255, 255, 0.6);
            }

            ul.summary-list {
                display: inline-block;
                padding-left: 0;
                width: 100%;
                margin-bottom: 0;
            }

            ul.summary-list>li {
                display: inline-block;
                width: 19.5%;
                text-align: center;
            }

            ul.summary-list>li>a>i {
                display: block;
                font-size: 18px;
                padding-bottom: 5px;
            }

            ul.summary-list>li>a {
                padding: 10px 0;
                display: inline-block;
                color: #818181;
            }

            ul.summary-list>li {
                border-right: 1px solid #eaeaea;
            }

            ul.summary-list>li:last-child {
                border-right: none;
            }

            .activity {
                width: 100%;
                float: left;
                margin-bottom: 10px;
            }

            .activity.alt {
                width: 100%;
                float: right;
                margin-bottom: 10px;
            }

            .activity span {
                float: left;
            }

            .activity.alt span {
                float: right;
            }

            .activity span,
            .activity.alt span {
                width: 45px;
                height: 45px;
                line-height: 45px;
                border-radius: 50%;
                -webkit-border-radius: 50%;
                background: #eee;
                text-align: center;
                color: #fff;
                font-size: 16px;
            }

            .activity.terques span {
                background: #8dd7d6;
            }

            .activity.terques h4 {
                color: #8dd7d6;
            }

            .activity.purple span {
                background: #b984dc;
            }

            .activity.purple h4 {
                color: #b984dc;
            }

            .activity.blue span {
                background: #90b4e6;
            }

            .activity.blue h4 {
                color: #90b4e6;
            }

            .activity.green span {
                background: #aec785;
            }

            .activity.green h4 {
                color: #aec785;
            }

            .activity h4 {
                margin-top: 0;
                font-size: 16px;
            }

            .activity p {
                margin-bottom: 0;
                font-size: 13px;
            }

            .activity .activity-desk i,
            .activity.alt .activity-desk i {
                float: left;
                font-size: 18px;
                margin-right: 10px;
                color: #bebebe;
            }

            .activity .activity-desk {
                margin-left: 70px;
                position: relative;
            }

            .activity.alt .activity-desk {
                margin-right: 70px;
                position: relative;
            }

            .activity.alt .activity-desk .panel {
                float: right;
                position: relative;
            }

            .activity-desk .panel {
                background: #F4F4F4;
                display: inline-block;
            }


            .activity .activity-desk .arrow {
                border-right: 8px solid #F4F4F4 !important;
            }

            .activity .activity-desk .arrow {
                border-bottom: 8px solid transparent;
                border-top: 8px solid transparent;
                display: block;
                height: 0;
                left: -7px;
                position: absolute;
                top: 13px;
                width: 0;
            }

            .activity-desk .arrow-alt {
                border-left: 8px solid #F4F4F4 !important;
            }

            .activity-desk .arrow-alt {
                border-bottom: 8px solid transparent;
                border-top: 8px solid transparent;
                display: block;
                height: 0;
                right: -7px;
                position: absolute;
                top: 13px;
                width: 0;
            }

            .activity-desk .album {
                display: inline-block;
                margin-top: 10px;
            }

            .activity-desk .album a {
                margin-right: 10px;
            }

            .activity-desk .album a:last-child {
                margin-right: 0px;
            }
        </style>
        <script src="javascript/users.js"></script>
        <script src="javascript/chat.js"></script>
        <script type="text/javascript">
            function abrirDivPerfil() {
                document.getElementById('perfil').style.display = "block";
                document.getElementById('match').style.display = "none";
                document.getElementById('panelEditPerfil').style.display = "none";
                document.getElementById('panel').style.display = "block";
            }

            function abrirDivMatch() {
                document.getElementById('perfil').style.display = "none";
                document.getElementById('match').style.display = "block";
                document.getElementById('tagPerfil').classList.remove("active");
                document.getElementById('panelEditPerfil').style.display = "none";
                document.getElementById('panel').style.display = "block";
            }

            function abrirDivEditarPerfil() {
                document.getElementById('perfil').style.display = "none";
                document.getElementById('match').style.display = "none";
                document.getElementById('tagPerfil').classList.remove("active");
                document.getElementById('panelEditPerfil').style.display = "block";
                document.getElementById('panel').style.display = "none";
            }
        </script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
        <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.12/jquery.mask.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.12/jquery.mask.min.js"></script>
        <script src="../assets/js/ajaxperfil.js"></script>
        <script src="js/modaldel.js"></script>
        <script src="js/modaledit.js"></script>
</body>
</html>
