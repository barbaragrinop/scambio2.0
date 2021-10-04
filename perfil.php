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


    <link rel="shortcut icon" href="assets/imgs/logoFundo.png" />

    <script src="https://unpkg.com/feather-icons"></script>


    <link rel="stylesheet" href="assets/css/perfil.css">
    <title>Scambio | Perfil</title>
</head>

<body>
    <nav class="navbar secondaryColor navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="assets/imgs/logo1.PNG" alt="logo Scambio" width="110" height="38">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" style="background-color: #F2EEE8;" id="navbarSupportedContent">
                <ul class="textCor nav navbar-nav navbar-nav-ul">
                    <li><a class="links-nav-home" href="home/home.php">Home</a></li>
                    <li><a href="mensagem/mensagem.php">Mensagens</a></li>
                    <li><a href="index.php#ajuda">Ajuda</a></li>
                </ul>

                <ul class="textCor nav navbar-nav navbar-right">
                    <form action="logout.php" style="text-align: right;">
                        <input id="inpkill" class="inpkill glyphicon buttonLogout btnClass2" name="DestroySession" type="submit" value="Sair">
                    </form>
                </ul>
            </div>
        </div>
    </nav>
    <?php

    // ALL QUERY
    include_once('config/conexao.php');

    $data = file_get_contents('C:\xampp\htdocs\scambio2.0\babi.jpg');
    $data = base64_encode($data);
    $query2 = $pdo->prepare('UPDATE DB_SCAMBIO.TB_USUARIO SET DS_IMGP = "'. $data .'" WHERE CD_usuario = ' . $_SESSION['id']);
    $query2->execute();

    // QUERY PARA PUXAR INFORMAÇÃO DO USUPARIO
    $usuario = $pdo->prepare("SELECT * FROM DB_SCAMBIO.TB_USUARIO WHERE CD_USUARIO =  " . $_SESSION['id']);
    $usuario->execute();
    $result = $usuario->fetch();

    // QUERY PARA PUXAR LIVROS POSTADOS PELO USUARIO
    $sql = "SELECT LIV.NM_LIVRO AS NML, ANUN.CD_ANUNCIO AS CDANUN  FROM DB_SCAMBIO.TB_lIVRO AS LIV";
    $sql .= " INNER JOIN DB_SCAMBIO.TB_ANUNCIO AS ANUN ON ANUN.CD_LIVRO = LIV.CD_LIVRO";
    $sql .= " INNER JOIN DB_SCAMBIO.TB_USUARIO AS US ON US.CD_USUARIO = ANUN.CD_USUARIO WHERE US.CD_USUARIO = " . $_SESSION['id'];
    $livrouser = $pdo->prepare($sql);
    $livrouser->execute();
    $result2 = $livrouser->fetchAll(PDO::FETCH_OBJ);

    $sql2 = "SELECT COUNT(*) as total, LIV.NM_LIVRO AS NML, ANUN.CD_ANUNCIO AS CDANUN  FROM DB_SCAMBIO.TB_lIVRO AS LIV";
    $sql2 .= " INNER JOIN DB_SCAMBIO.TB_ANUNCIO AS ANUN ON ANUN.CD_LIVRO = LIV.CD_LIVRO";
    $sql2 .= " INNER JOIN DB_SCAMBIO.TB_USUARIO AS US ON US.CD_USUARIO = ANUN.CD_USUARIO WHERE US.CD_USUARIO = " . $_SESSION['id'];
    $countpublic = $pdo->prepare($sql2);
    $countpublic->execute();
    $result3 = $countpublic->fetch(PDO::FETCH_ASSOC);
    ?>
    <div class="container">
        <div class="main">
            <div class="row">
                <div class="col-md-4 mt-1">
                    <div class="card text-center sidebar">
                        <div class="card-body">
                       <!--  DENTRO DA TABELA USUARIO NO BANCO ADICIONEI UMA COLUNA CHAMADA DS_IMGP - PARA IMAGEM DE PERFIL DO USUARIO
                        USEI O SCRIPT ABAIXO PARA ADICIONAR A FOTO DO USUARIO NO BANCO COMO ESTOU COM O USUARIO DA BABIS ADICIONEI A FOTO DELA
                        $data = file_get_contents('C:\xampp\htdocs\scambio2.0\babi.jpg');
                        $data = base64_encode($data);
                        $query2 = $pdo->prepare('UPDATE DB_SCAMBIO.TB_USUARIO SET DS_IMGP = "'. $data .'" WHERE CD_usuario = ' . $_SESSION['id']);
                        $query2->execute(); -->
                            <img src="data:image;base64,<?php echo $result["DS_IMGP"];?>" class="rounded-circle" alt="" width="170" height="170">
                            <div class="mt-3">
                                <h2>Perfil</h2>
                                <hr>
                                <h4>Nome: <span id="nomeUsuario"><?php echo($result['nm_usuario']); ?></span></h4>
                                <h4>Livros Trocados: <span id="livrosTrocados">0</span></h4>
                                <h4>Livros Postados: <span id="livrosPostados"><?php print_r($result3['total']);?></span></h4>
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
                    <div class="card mb-3 content">
                        <h1 class="m-3">Livros Postados</h1>
                        <div class="card-body">
                            <?php 
                            foreach ($result2 as $key => $row) {
                            ?>
                            <div class="row">
                                <div class="col-md-3">
                                    <div>
                                        <h5><?php echo $row->NML;?></h5>
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
                </div>
            </div>
        </div>
    </div>
    <script>
        feather.replace();
    </script>
</body>
</html>
<?php
} else {
    header('Location: login/login.php');
}
?>