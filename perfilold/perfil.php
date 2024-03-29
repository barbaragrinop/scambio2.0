<?php
session_start();
if (isset($_SESSION['id'])) {
    
    include_once('../config/conexao.php');
  
?>
    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">


        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">


        <link rel="stylesheet" type="text/css" href="login/vendor/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link href="assets/css/style.css" rel="stylesheet">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
        <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><div class=""></div>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <link rel="stylesheet" href="../fab/fab.css">

        <script src="https://use.fontawesome.com/88a6c0ea9a.js"></script>



        <link rel="shortcut icon" href="../assets/imgs/logoFundo.png" />

        <script src="https://unpkg.com/feather-icons"></script>


        <link rel="stylesheet" href="../assets/css/perfil.css">
        <title>Scambio | Perfil</title>

        <style>
            #carouselExampleControls {
                width: 200px;
                margin-left: 20px;
            }

            .carousel-control-next-icon {
                background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='black' viewBox='0 0 8 8'%3E%3Cpath d='M2.75 0l-1.5 1.5 2.5 2.5-2.5 2.5 1.5 1.5 4-4-4-4z'/%3E%3C/svg%3E");
            }

            .carousel-control-prev-icon {
                background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='black' viewBox='0 0 8 8'%3E%3Cpath d='M5.25 0l-4 4 4 4 1.5-1.5-2.5-2.5 2.5-2.5-1.5-1.5z'/%3E%3C/svg%3E");
            }

            .d-block {
                /* width: 200px !important; */
                height: 130px;
            }

            .cards-posts {
                display: flex;
                /* flex-direction: row; */

            }

            .infos-publi {
                display: flex;
                flex-direction: column;
                margin-left: 10px;
            }

            .btn-delete {
                background-color: #DF3636;
                width: 150px;
                margin-top: 2px;
                margin-bottom: 6.5px;
                color: white;
                border: none;
                text-align: center;
            }

            .btn-edit {
                background-color: #007AC9;
                color: white;
                width: 150px;
                border: none;
                text-align: center;
            }

            .btn-delete:hover,
            .btn-edit:hover {
                opacity: 0.8;
                transition: .2s;
            }

            .img-index {
                width: 100px;
                height: 34px;
                margin-left: 5px;
                /* margin-top: 15px; */
            }
        </style>
        <script src="https://kit.fontawesome.com/026a5bd431.js" crossorigin="anonymous"></script>
    </head>

    <body>
        <div class="container-fluid" style="margin-top: 10px;">
            <a href="../index.php">
                <img class="img-index" src="../assets/imgs/LOGO_TRANSPARENTE.PNG" alt="logo Scambio" width="110" height="38" style="padding-top: 6.5px; margin-top: -6px; padding-left: 5px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <?php
            /* SELECT PARA TRAZER INFORMAÇÕES DO USUARIO */
            include_once('PHP/select_info_user.php');

            /*  SELECT PARA TRAZER INFORMAÇÕES DOS LIVROS PUBLICADOS PELO USER E QUANTIDADE DE LIVRO PUBLICADOS */
            include_once('PHP/select_info_livro.php')
        ?>
        <div class="container" style="margin-top: 38px;">
            <div class="main">
                <div class="row">
                    <div class="col-md-4 mt-1" style="max-height: 500px;">
                        <div class="card text-center sidebar">
                            <div class="card-body">
                                <img src="data:image;base64,<?php echo $select_info_usuario["DS_IMGP"]; ?>" class="rounded-circle" alt="" width="165" height="170">
                                <div class="mt-3"> 
                                    <h2>Perfil</h2>
                                    <hr>
                                    <h4>Nome: <span id="nomeUsuario"><?php echo ($select_info_usuario['nm_usuario']); ?></span></h4>
                                    <h4>Livros Trocados: <span id="livrosTrocados">0</span></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 mt-1">
                        <div class="card mb-3 content">
                            <h1 class="m-3 pt-3">Publicar um Livro</h1>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-2">
                                        <h5>Anexar Capa</h5>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="custom-file-upload">
                                            <!-- <input type="file" id="capaLivro" name="capaLivro" accept="image/png, image/jpeg, image/jpg"> -->
                                            <div class="img-upload">
                                                <i data-feather="upload"></i>
                                                <span>Imagem</span>
                                            </div>
                                        </label>
                                    </div>
                                    <div class="col-md-2">
                                        <h5>Nome</h5>
                                    </div>
                                    <div class="col-md-4 text-secondary">
                                        <input class="input-css" type="text" name="nomeLivro" id="nomeLivro">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-2">
                                        <h5>Autor</h5>
                                    </div>
                                    <div class="col-md-4 text-secondary">
                                        <input class="input-css" type="text" name="nomeLivro" id="nomeLivro">
                                    </div>
                                    <div class="col-md-2">
                                        <h5>Gênero</h5>
                                    </div>
                                    <div class="col-md-4 text-secondary">
                                        <input class="input-css" type="text" name="nomeLivro" id="nomeLivro">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-2">
                                        <h5>Descrição</h5>
                                    </div>
                                    <div class="col-md-4 text-secondary">
                                        <input class="input-css" type="text" name="nomeLivro" id="nomeLivro">
                                    </div>
                                    <div class="col-md-2">
                                        <h5>Idioma</h5>
                                    </div>
                                    <div class="col-md-4 text-secondary">
                                        <input class="input-css" type="text" name="nomeLivro" id="nomeLivro">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h1 class="m-3">Livros Postados <span>(<?php print_r($select_count_liv_publicados['total']); ?>)</span> </h1>
                        <?php

                            /* FOREACH PORA POPULAR LIVROS POSTADOS */
                            foreach ($select_info_livro as $key => $row) {
                        ?>
                        <div class="card mb-3 content">
                            <div class="cards-posts">
                                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="./home/img/photo1.png" class="d-block w-100" alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="./home/img/photo2.jpg" class="d-block w-100" alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="./home/img/photo3.jpg" class="d-block w-100" alt="...">
                                        </div>
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                                <div class="infos-publi">
                                    <span class="name-livro-publi">
                                        Nome: <span><?php echo $row->NMLV ?></span>
                                    </span>
                                    <span class="desciption-publi">
                                        Descrição: <span><?php echo $row->ds ?></span>
                                    </span>
                                    <span>
                                        Cidade: <span><?php echo $row->cid . "/" . $row->u?></span>
                                    </span>
                                    <span style="display: flex; flex-direction: column;">
                                            <button class="btn-delete" data-toggle="modal" data-target="#exampleModalLongD<?php echo $row->cda?>">Deletar publicação</button>
                                            <button class="btn-edit" data-toggle="modal" data-target="#exampleModalLongE<?php echo $row->cda?>">Editar publicação</button>
                                    </span>
                                </div>
                            </div>
                        </div> 
                        <?php
                                /* INCLUDE MODAL COM OPÇÃO DE DELETAR PUBLICACAO */
                                include('includes/modaldel.php');

                                /* INCLUDE MODAL COM OPÇÃO DE EDITAR PUBLICACAO */
                                include('includes/modaledit.php');
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <script>
            feather.replace();
        </script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

        <script src="https://use.fontawesome.com/88a6c0ea9a.js"></script>
        <script src="../assets/js/pagereload.js"></script>
        <?php include('../menu/menu.php') ?>
    </body>

    </html>
<?php
} else {
    header('Location: ../login/login.php');
}
?>