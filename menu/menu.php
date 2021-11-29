<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="assets/css/style.css" rel="stylesheet">
<link href="assets/css/responsivoIndex.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lemonada&display=swap" rel="stylesheet">
<link rel="shortcut icon" href="assets/imgs/logoFundo.png" />

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<link rel="stylesheet" href="../fab/fab.css">


<style>
    .modal-backdrop {
        position: inherit;
    }

    html {
        font-family: sans-serif;
    }

    a h6 {
        font-size: 14.5px;
    }

    .modal-header h5 {
        font-size: 18px;
    }

    .modal-footer button:hover {
        transition: .5s;
        background-color: #5c636a;
        color: #fff;
        border-color: #565e64;
    }

    .modal-body a {
        text-decoration: none;
    }
</style>
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
            <span class="fab-labelll"><a style="text-decoration: none; color: white;">Forum</a></span>
            <div class="fab-icon-holderrr">
                <a id="perfil" style="text-decoration: none;" onclick="redirectForum()"><i class="far fa-newspaper	"></i></a>
            </div>
        </li>
        <li>
            <span class="fab-labelll"><a style="text-decoration: none; color: white;">Ajuda</a></span>
            <div class="fab-icon-holderrr">
                <a id="ajuda" style="text-decoration: none;" onclick="redirectAjuda()"><i class="fas fa-question"></i></a>
            </div>
        </li>
        <li>
            <span class="fab-labelll"><a style="text-decoration: none; color: white;">Notificações</a></span>
            <div class="fab-icon-holderrr">
                <!-- <span>1</span> -->
                <a id="notificacoes" data-toggle="modal" data-target="#ExemploModalCentralizado" style="text-decoration: none;"><i class="fas fa-bell"></i></a>
            </div>
        </li>
    </ul>

    <!-- Modal -->
    <div class="modal fade" id="ExemploModalCentralizado" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true" style="background-color: rgba(0, 0, 0, 0.5); cursor: context-menu;">
        <div class="modal-dialog modal-dialog-centered" role="document" style="height: 100%; display: flex; justify-content: center; align-items: center;">
            <div class="modal-content" style="width: 500px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="TituloModalCentralizado">Últimas Notificações</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <!-- <span aria-hidden="true">&times;</span> -->
                    </button>
                </div>


                <div class="modal-body">
                    <a href="#" style="display: flex; flex-direction: row; height: 34px; color: black; margin-top: -6px;">
                        <img width="40" height="40" src="./babi.jpg" alt="" style="border-radius: 20px;">
                        <h6 style="margin-top: 12px; margin-left: 10px;">Yago comentou na sua postagem do fórum.</h6>
                    </a>
                    <hr>
                    <a href="#" style="display: flex; flex-direction: row; height: 34px; color: black; margin-top: -6px;">
                        <img width="40" height="40" src="./babi.jpg" alt="" style="border-radius: 20px;">
                        <h6 style="margin-top: 12px; margin-left: 10px;">Você recebeu uma mensagem de Josefa.</h6>
                    </a>
                    <hr>
                    <a href="#" style="display: flex; flex-direction: row; height: 34px; color: black; margin-top: -6px;">
                        <img width="40" height="40" src="./babi.jpg" alt="" style="border-radius: 20px;">
                        <h6 style="margin-top: 12px; margin-left: 10px;">Você publicou o livro Cinquenta...</h6>
                    </a>
                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <!-- <button type="button" class="btn btn-primary">Salvar mudanças</button> -->
                </div>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


    <script>
        function redirectHome() {
            location.replace('http://localhost/scambio2.0/home/home.php');
        }

        function redirectPublicacao() {
            location.replace('http://localhost/scambio2.0/home/home.php');
        }

        function redirectChat() {
            location.replace('http://localhost/scambio2.0/chat/users-all.php');
        }

        function redirectPerfil() {
            location.replace('http://localhost/scambio2.0/perfil/perfil2.php');
        }

        function redirectForum() {
            location.replace('http://localhost/scambio2.0/forum/forum.php');
        }

        function redirectAjuda() {
            location.replace('http://localhost/scambio2.0/index.php#ajuda');
        }
    </script>
</div>