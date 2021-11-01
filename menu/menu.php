<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
<link href="assets/css/style.css" rel="stylesheet">
<link href="assets/css/responsivoIndex.css" rel="stylesheet">
<!-- <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/heroes/"> -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lemonada&display=swap" rel="stylesheet">
<link rel="shortcut icon" href="assets/imgs/logoFundo.png" />

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<link rel="stylesheet" href="../fab/fab.css">
</meta>

<div class="fab-containerrr">
    <div class="fabbb fab-icon-holderrr">
        <i class="fas fa-bars"></i>
    </div>

    <ul class="fab-optionsss">
        <li>
            <span class="fab-labelll"><a style="text-decoration: none; color: white;">Home</a></span>
            <div class="fab-icon-holderrr">
                <a id="home" style="text-decoration: none;" onclick="redirectHome()"><i class="fas fa-file-alt"></i></a>
            </div>
        </li>
        <li>
            <span class="fab-labelll"><a id="modal-btn" style="text-decoration: none; color: white;">Publicar Livro</a></span>
            <div class="fab-icon-holderrr">
                <a id="modal-btn" style="text-decoration: none;" onclick="redirectPublicacao()"><i class="fas fa-book"></i></a>
            </div>
        </li>
        <li>
            <span class="fab-labelll"><a style="text-decoration: none; color: white;">Mensagens</a></span>
            <div class="fab-icon-holderrr">
                <a id="chat" style="text-decoration: none;" onclick="redirectChat()"><i class="fas fa-comments"></i></a>
            </div>
        </li>
        <li>
            <span class="fab-labelll"><a style="text-decoration: none; color: white;">Meu Perfil</a></span>
            <div class="fab-icon-holderrr">
                <a id="perfil" style="text-decoration: none;" onclick="redirectPerfil()"><i class="fas fa-user"></i></a>
            </div>
        </li>
        <li>
            <span class="fab-labelll"><a style="text-decoration: none; color: white;">Ajuda</a></span>
            <div class="fab-icon-holderrr">
                <a id="ajuda" style="text-decoration: none;" onclick="redirectAjuda()"><i class="fas fa-question"></i></a>
            </div>
        </li>
    </ul>

    <script>
        function redirectHome() {
            window.location.replace('../home/home.php');
        }

        function redirectPublicacao() {
            window.location.replace('../home/home.php');
        }

        function redirectChat() {
            window.location.replace('../chat/users-all.php');
        }

        function redirectPerfil() {
            window.location.replace('../perfil.php');
        }

        function redirectAjuda() {
            window.location.replace('../index.php#ajuda');
        }
    </script>
</div>