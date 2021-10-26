<?php
session_start();
if (isset($_SESSION['id'])) {
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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <script src="https://use.fontawesome.com/88a6c0ea9a.js"></script>



        <link rel="shortcut icon" href="assets/imgs/logoFundo.png" />

        <script src="https://unpkg.com/feather-icons"></script>


        <link rel="stylesheet" href="assets/css/perfil.css">
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
            }

            .btn-edit {
                background-color: #007AC9;
                color: white;
                width: 150px;
                border: none;
            }

            .btn-delete:hover,
            .btn-edit:hover {
                opacity: 0.8;
                transition: .2s;
            }
        </style>
        <script src="https://kit.fontawesome.com/026a5bd431.js" crossorigin="anonymous"></script>
    </head>

    <body>
    <div class="container-fluid">
			<a href="index.php"><img class="img-index" src="assets/imgs/LOGO_TRANSPARENTE.PNG" alt="logo Scambio" width="110" height="35" style="padding-top: 5px;"></a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
</div>
        <?php

        // ALL QUERY
        include_once('config/conexao.php');

        /*
        $data = file_get_contents('C:\xampp\htdocs\scambio2.0\babi.jpg');
        $data = base64_encode($data);
        $query2 = $pdo->prepare('UPDATE DB_SCAMBIO.TB_USUARIO SET DS_IMGP = "'. $data .'" WHERE CD_usuario = ' . $_SESSION['id']);
        $query2->execute(); */

        // QUERY PARA PUXAR INFORMAÇÃO DO USUPARIO
        $usuario = $pdo->prepare("SELECT * FROM DB_SCAMBIO.TB_USUARIO WHERE CD_USUARIO =  " . $_SESSION['id']);
        $usuario->execute();
        $select_info_usuario = $usuario->fetch();

        // QUERY PARA PUXAR LIVROS POSTADOS PELO USUARIO
        $sql = "SELECT ANUN.CD_ANUNCIO as cda,ANUN.DS_ANUNCIO as ds,ANUN.DS_IMG1 as img1,ANUN.DS_IMG2 as img2,US.nm_usuario as user,LOC.NM_LOGRADOURO as loc,LOC.CD_CASA as casa,";
		$sql .= " BAIRRO.NM_BAIRRO as bairro,CITY.NM_CIDADE as cid,UF.SG_UF as u,LIV.NM_LIVRO as livro,LIV.DT_LANCAMENTO as lanc, AUT.NM_AUTOR AS AUTOR FROM db_scambio.TB_ANUNCIO AS ANUN INNER JOIN db_scambio.tb_usuario AS US ON";
		$sql .= " ANUN.cd_usuario = US.cd_usuario INNER JOIN db_scambio.tb_logradouro AS LOC ON US.cd_logradouro = LOC.CD_LOGRADOURO INNER JOIN db_scambio.TB_BAIRRO AS BAIRRO ON";
		$sql .= " BAIRRO.cd_BAIRRO = LOC.cd_BAIRRO INNER JOIN db_scambio.TB_CIDADE AS CITY ON CITY.cd_CIDADE = BAIRRO.cd_CIDADE INNER JOIN db_scambio.TB_UF AS UF ON";
		$sql .= " UF.CD_UF = CITY.CD_UF INNER JOIN db_scambio.TB_LIVRO AS LIV ON LIV.CD_LIVRO = ANUN.CD_LIVRO INNER JOIN db_scambio.TB_AUTOR AS AUT ON AUT.CD_AUTOR = LIV.CD_AUTOR WHERE US.CD_USUARIO = " . $_SESSION["id"];
        $livrouser = $pdo->prepare($sql);
        $livrouser->execute();
        $select_info_livro = $livrouser->fetchAll(PDO::FETCH_OBJ);

        $sql2 = "SELECT COUNT(*) as total, LIV.NM_LIVRO AS NML, ANUN.CD_ANUNCIO AS CDANUN  FROM DB_SCAMBIO.TB_lIVRO AS LIV";
        $sql2 .= " INNER JOIN DB_SCAMBIO.TB_ANUNCIO AS ANUN ON ANUN.CD_LIVRO = LIV.CD_LIVRO";
        $sql2 .= " INNER JOIN DB_SCAMBIO.TB_USUARIO AS US ON US.CD_USUARIO = ANUN.CD_USUARIO WHERE US.CD_USUARIO = " . $_SESSION['id'];
        $countpublic = $pdo->prepare($sql2);
        $countpublic->execute();
        $select_count_liv_publicados = $countpublic->fetch(PDO::FETCH_ASSOC);
        ?>
        <div class="container">
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
                                            <input type="file" id="capaLivro" name="capaLivro" accept="image/png, image/jpeg, image/jpg">
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
                        <h1 class="m-3">Livros Postados <span>(<?php print_r($select_count_liv_publicados['total']);?>)</span> </h1>
                        <?php 
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
                                        Nome: <span>CINQUENTA</span>
                                    </span>
                                    <span class="desciption-publi">
                                        Descrição: <span>Estou querendo trocar esse livro para achar um livro do meu interesse.</span>
                                    </span>
                                    <span>
                                        Cidade: <span>São Vicente/SP</span>
                                    </span>
                                    <span style="display: flex; flex-direction: column;">
                                        <button class="btn-delete">Deletar publicação</button>
                                        <button class="btn-edit">Editar publicação</button>
                                    </span>
                                </div>
                            </div>
                            <div class="card-body">
                                <?php
                                foreach ($result2 as $key => $row) {
                                ?>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div>
                                                <h5><?php echo $row->NML; ?></h5>
                                            </div>
                                        </div>
                                        <div class="col-md-9 text-secondary">
                                            <div class="div-link-postado"><a class="link-livro-postado" href="">Ver postagem</a></div>
                                        </div>
                                    </div>
                                <?php
                                } 
                                ?>
                            </div>
                        </div>
                        <?php
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
    </body>

    </html>
<?php
} else {
    header('Location: login/login.php');
}
?>