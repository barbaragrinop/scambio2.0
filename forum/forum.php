<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Scambio | Perfil</title>
    <link rel="shortcut icon" href="../assets/imgs/logoFundo.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lemonada&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="assets/imgs/logoFundo.png" />

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="../fab/fab.css">

    <style>
        #inpkill {
            margin-right: 9px;
            margin-top: -25px;
        }

        body{
    margin-top:20px;
    background:#ebeef0;
}

.img-sm {
    width: 46px;
    height: 46px;
}

.panel {
    box-shadow: 0 2px 0 rgba(0,0,0,0.075);
    border-radius: 0;
    border: 0;
    margin-bottom: 15px;
}

.panel .panel-footer, .panel>:last-child {
    border-bottom-left-radius: 0;
    border-bottom-right-radius: 0;
}

.panel .panel-heading, .panel>:first-child {
    border-top-left-radius: 0;
    border-top-right-radius: 0;
}

.panel-body {
    padding: 25px 20px;
}


.media-block .media-left {
    display: block;
    float: left
}

.media-block .media-right {
    float: right
}

.media-block .media-body {
    display: block;
    overflow: hidden;
    width: auto
}

.middle .media-left,
.middle .media-right,
.middle .media-body {
    vertical-align: middle
}

.thumbnail {
    border-radius: 0;
    border-color: #e9e9e9
}

.tag.tag-sm, .btn-group-sm>.tag {
    padding: 5px 10px;
}

.tag:not(.label) {
    background-color: #fff;
    padding: 6px 12px;
    border-radius: 2px;
    border: 1px solid #cdd6e1;
    font-size: 12px;
    line-height: 1.42857;
    vertical-align: middle;
    -webkit-transition: all .15s;
    transition: all .15s;
}
.text-muted, a.text-muted:hover, a.text-muted:focus {
    color: #acacac;
}
.text-sm {
    font-size: 0.9em;
}
.text-5x, .text-4x, .text-5x, .text-2x, .text-lg, .text-sm, .text-xs {
    line-height: 1.25;
}

.btn-trans {
    background-color: transparent;
    border-color: transparent;
    color: #929292;
}

.btn-icon {
    padding-left: 9px;
    padding-right: 9px;
}

.btn-sm, .btn-group-sm>.btn, .btn-icon.btn-sm {
    padding: 5px 10px !important;
}

.mar-top {
    margin-top: 15px;
}
    </style>
</head>

<body>
    <div class="container-fluid">
        <a href="index.php"><img class="img-index" src="../assets/imgs/LOGO_TRANSPARENTE.PNG" alt="logo Scambio" width="104" height="30" style="margin-top: 9px;"></a>
        </button>
            <form action="./logout.php">
                <input style="font-size: 14px;" id="inpkill" class="inpkill glyphicon buttonLogout" name="DestroySession" type="submit" value="Sair">
            </form>
    </div>
    <br>
    <br>
    <div style="margin-top: 1px;">
		<input type="text" name="search" style="border: none; height: 45px; border-radius: 2px; margin-left: 17.5%; padding-left: 10px; width: 60%;" placeholder="Nome do livro" />
		<input type="submit" name="Pesquisar" value="Pesquisar" style="border: none; height: 45px; border-radius: 3px;background-color: #AC7E55; color: #ffffff;" />
	</div>
    <br>
    <br>
   
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container bootdey">
<div class="col-md-12 bootstrap snippets">
<div class="panel">
  <div class="panel-body">
    <textarea class="form-control" rows="2" placeholder="O que voce esta pensando?"></textarea>
    <div class="mar-top clearfix">
      <div style="width: 310px;">

			<label style="font-size: 13px;" for="genero">Gênero:</label>
			<select style="width: 100%; font-size: 12.5px;" id="genero" name="genero">
				<option value="Biografia">Biografia</option>
				<option value="Carta">Carta</option>
				<option value="Chick-Lit">Chick-Lit</option>
				<option value="Conto">Conto</option>
				<option value="Crônica">Crônica</option>
				<option value="Drama">Drama</option>
        		<option value="Ensaio">Ensaio</option>
				<option value="Ficção">Ficção</option>
				<option value="História em Quadrinhos (HQ)">História em Quadrinhos (HQ)</option>
				<option value="ladlit">Lad-Lit</option>
		    	<option value="Literatura Fantástica">Literatura Fantástica</option>
			    <option value="Literatura Infantil">Literatura Infantil</option>
				<option value="Literatura Infanto-juvenil">Literatura Infanto-juvenil</option>
				<option value="Literatura Nacional">Literatura Nacional</option>
				<option value="Memórias">Memórias</option>
				<option value="New Adult">New Adult</option>
				<option value="Novela">Novela</option>
				<option value="Poesia">Poesia</option>
				<option value="Realismo Mágico ">Realismo Mágico</option>
				<option value="Romance">Romance</option>
				<option value="Sick-Lit">Sick-Lit</option>
				<option value="Terror">Terror</option>
        	</select>
			</div>
    <button class="btn btn-sm btn-primary pull-right" style="background-color: #AC7E55; border: none;" type="submit"><i class="fa fa-pencil fa-fw"></i> Publicar</button>
    </div>
  </div>
</div>
<div class="panel">
    <div class="panel-body">
    <!-- Newsfeed Content -->
    <!--===================================================-->
    <div class="media-block">
      <a class="media-left" href="#"><img class="img-circle img-sm" alt="Profile Picture" src="https://bootdey.com/img/Content/avatar/avatar3.png"></a>
      <div class="media-body">
        <div class="mar-btm">
          <a href="#" class="btn-link text-semibold media-heading box-inline">Lisa D.</a>
          <p class="text-muted text-sm"> Romance - 11 min ago</p>
        </div>
        <p>consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
        <div class="pad-ver">
          <div class="btn-group">
            <a class="btn btn-sm btn-default btn-hover-success" href="#"><i class="fa fa-thumbs-up"></i></a>
            <a class="btn btn-sm btn-default btn-hover-danger" href="#"><i class="fa fa-thumbs-down"></i></a>
          </div>
        </div>
        <hr>

        <!-- Comments -->
        <div>
          <div class="media-block">
            <a class="media-left" href="#"><img class="img-circle img-sm" alt="Profile Picture" src="https://bootdey.com/img/Content/avatar/avatar3.png"></a>
            <div class="media-body">
              <div class="mar-btm">
                <a href="#" class="btn-link text-semibold media-heading box-inline">Bobby Marz</a>
                <p class="text-muted text-sm"> 7 min ago</p>
              </div>
              <p>Sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
              <div class="pad-ver">
                <div class="btn-group">
                  <a class="btn btn-sm btn-default btn-hover-success active" href="#"><i class="fa fa-thumbs-up"></i> You Like it</a>
                  <a class="btn btn-sm btn-default btn-hover-danger" href="#"><i class="fa fa-thumbs-down"></i></a>
                </div>
              </div>
              <hr>
            </div>
          </div>

          <div class="media-block">
            <a class="media-left" href="#"><img class="img-circle img-sm" alt="Profile Picture" src="https://bootdey.com/img/Content/avatar/avatar3.png">
            </a>
            <div class="media-body">
              <div class="mar-btm">
                <a href="#" class="btn-link text-semibold media-heading box-inline">Lucy Moon</a>
                <p class="text-muted text-sm"> 2 min ago</p>
              </div>
              <p>Duis autem vel eum iriure dolor in hendrerit in vulputate ?</p>
              <div class="pad-ver">
                <div class="btn-group">
                  <a class="btn btn-sm btn-default btn-hover-success" href="#"><i class="fa fa-thumbs-up"></i></a>
                  <a class="btn btn-sm btn-default btn-hover-danger" href="#"><i class="fa fa-thumbs-down"></i></a>
                </div>
              </div>
              <hr>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="bg-light p-2">
        <div class="d-flex flex-row align-items-start"><img class="rounded-circle" src="../assets/imgs/munir.jpeg" width="70"><textarea class="form-control ml-1 shadow-none textarea" style="width: 85%;margin-left: 13%;"></textarea></div>
        <br>
        <div class="mt-2 text-right"><button class="btn btn-primary btn-sm shadow-none" style="background-color: #AC7E55; border: none;" type="button">Comentar</button></div>
    </div>
  </div>
</div>
  <div class="panel">
    <div class="panel-body">
    <!-- Newsfeed Content -->
    <!--===================================================-->
    <div class="media-block">
      <a class="media-left" href="#"><img class="img-circle img-sm" alt="Profile Picture" src="https://bootdey.com/img/Content/avatar/avatar3.png"></a>
      <div class="media-body">
        <div class="mar-btm">
          <a href="#" class="btn-link text-semibold media-heading box-inline">Amanda R.</a>
          <p class="text-muted text-sm"> Suspense - 11 min ago</p>
        </div>
        <p>consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
        <div class="pad-ver">
          <div class="btn-group">
            <a class="btn btn-sm btn-default btn-hover-success" href="#"><i class="fa fa-thumbs-up"></i></a>
            <a class="btn btn-sm btn-default btn-hover-danger" href="#"><i class="fa fa-thumbs-down"></i></a>
          </div>
        </div>
        <hr>

        <!-- Comments -->
        <div>
          <div class="media-block">
            <a class="media-left" href="#"><img class="img-circle img-sm" alt="Profile Picture" src="https://bootdey.com/img/Content/avatar/avatar3.png"></a>
            <div class="media-body">
              <div class="mar-btm">
                <a href="#" class="btn-link text-semibold media-heading box-inline">Martinez</a>
                <p class="text-muted text-sm"> 7 min ago</p>
              </div>
              <p>Sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
              <div class="pad-ver">
                <div class="btn-group">
                  <a class="btn btn-sm btn-default btn-hover-success active" href="#"><i class="fa fa-thumbs-up"></i> You Like it</a>
                  <a class="btn btn-sm btn-default btn-hover-danger" href="#"><i class="fa fa-thumbs-down"></i></a>
                </div>
              </div>
              <hr>
            </div>
          </div>

          <div class="media-block">
            <a class="media-left" href="#"><img class="img-circle img-sm" alt="Profile Picture" src="https://bootdey.com/img/Content/avatar/avatar3.png">
            </a>
            <div class="media-body">
              <div class="mar-btm">
                <a href="#" class="btn-link text-semibold media-heading box-inline">Luciana</a>
                <p class="text-muted text-sm"> 2 min ago</p>
              </div>
              <p>Duis autem vel eum iriure dolor in hendrerit in vulputate ?</p>
              <div class="pad-ver">
                <div class="btn-group">
                  <a class="btn btn-sm btn-default btn-hover-success" href="#"><i class="fa fa-thumbs-up"></i></a>
                  <a class="btn btn-sm btn-default btn-hover-danger" href="#"><i class="fa fa-thumbs-down"></i></a>
                </div>
              </div>
              <hr>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="bg-light p-2">
        <div class="d-flex flex-row align-items-start"><img class="rounded-circle" src="../assets/imgs/munir.jpeg" width="70"><textarea class="form-control ml-1 shadow-none textarea" style="width: 85%;margin-left: 13%;"></textarea></div>
        <br>
        <div class="mt-2 text-right"><button class="btn btn-primary btn-sm shadow-none" style="background-color: #AC7E55; border: none;" type="button">Comentar</button></div>
    </div>
  </div>
</div>
</div>

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
    </ul>

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
            location.replace('http://localhost/scambio2.0/perfil2.php');
        }

        function redirectForum() {
            location.replace('http://localhost/scambio2.0/forum/forum.php');
        }

        function redirectAjuda() {
            location.replace('http://localhost/scambio2.0/index.php#ajuda');
        }
    </script>
</div>

        <!-- /importar menu -->

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
        </style>
        <script src="javascript/users.js"></script>
        <script src="javascript/chat.js"></script>
        <script type="text/javascript">

        </script>
</body>

</html>