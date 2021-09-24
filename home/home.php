<?php
session_start();
if (isset($_SESSION['id'])) {
?>
	<!DOCTYPE html>
	<html lang="pt-br">

	<head>
		<title>Scambio</title>
		<link rel="shortcut icon" href="../assets/imgs/logoFundo.png" />
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="stylesheet" type="text/css" href="login/vendor/bootstrap/css/bootstrap.min.css">

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<link href="../assets/css/style.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/home.css">

		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
		<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	</head>

	<body>
        <nav class="secondaryColor navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand navbar-brand-top" href="index.php">
                    <img class="img-index" src="../assets/imgs/logo1.PNG" alt="logo Scambio" width="110" height="38">
                </a>
            </div>
            <div class="collapse navbar-collapse" style="background-color: #F2EEE8;" id="myNavbar">
                <ul class="textCor nav navbar-nav">
                    <li><a class="links-nav-index" href="#perfil.php">Perfil</a></li>
                    <li><a class="links-nav-index" href="MessagePage/message.php">Mensagens</a></li>
                    <li><a class="links-nav-index" href="index.php#ajuda">Ajuda</a></li>
                </ul>
                <ul class="textCor nav navbar-nav navbar-right">
						<form action="logout.php" style="text-align: right;">
							<input id="inpkill" class="inpkill glyphicon buttonLogout btnClass2" name="DestroySession" type="submit" value="Sair">
						</form>
					</ul>
            </div>
        </div>
    </nav>

		<h1 class="h1-large" style="font-family: Cutive;">Procure por uma nova história!</h2>

		<div class="w3-row-padding" style=" padding-top: 80px; ">
            <div class="w3-col m12 ">
                <div class="w3-card w3-round w3-white ">
                    <div class="w3-container w3-padding ">
                        <h6 class="w3-opacity ">Procure por um livro novo aqui!</h6>
                        <p contenteditable="true" class="w3-border w3-padding">Status: Pesquisar</p>
                        <button type="button " class="w3-button " style="background-color: #dfd6ca; "><i class="fa fa-pencil "></i> Pesquisar</button>
                    </div>
                </div>
            </div>
        </div>


        <div class="container-card">
            <div class="card">
                <img src="aculpa.jpg" alt="Livro" class="card__image">
                <p class="card__name">A Culpa é das Estrelas</p>
                <div class="grid-container">

                    <div class="grid-child-autor">
                        Jhon Green
                    </div>

                    <div class="grid-child-genere">
                        Romance
                    </div>

                </div>
                <button class="btn draw-border">Perfil</button>
                <button class="btn draw-border">Messagem</button>
            </div>
            <div class="card">
                <img src="cabana.jpg" alt="Livro" class="card__image">
                <p class="card__name">A Cabana</p>
                <div class="grid-container">

                    <div class="grid-child-autor">
                        William P. Young
                    </div>

                    <div class="grid-child-genere">
                        Ficção Religiosa
                    </div>

                </div>
                <button class="btn draw-border">Perfil</button>
                <button class="btn draw-border">Messagem</button>
            </div>
            <div class="card">
                <img src="aculpa.jpg" alt="Livro" class="card__image">
                <p class="card__name">A Culpa é das Estrelas</p>
                <div class="grid-container">

                    <div class="grid-child-autor">
                        Jhon Green
                    </div>

                    <div class="grid-child-genere">
                        Romance
                    </div>

                </div>
                <button class="btn draw-border">Perfil</button>
                <button class="btn draw-border">Messagem</button>
            </div>
            <div class="card">
                <img src="cabana.jpg" alt="Livro" class="card__image">
                <p class="card__name">A Cabana</p>
                <div class="grid-container">

                    <div class="grid-child-autor">
                        William P. Young
                    </div>

                    <div class="grid-child-genere">
                        Ficção Religiosa
                    </div>

                </div>
                <button class="btn draw-border">Perfil</button>
                <button class="btn draw-border">Messagem</button>
            </div>
            <div class="card">
                <img src="aculpa.jpg" alt="Livro" class="card__image">
                <p class="card__name">A Culpa é das Estrelas</p>
                <div class="grid-container">

                    <div class="grid-child-autor">
                        Jhon Green
                    </div>

                    <div class="grid-child-genere">
                        Romance
                    </div>

                </div>
                <button class="btn draw-border">Perfil</button>
                <button class="btn draw-border">Messagem</button>
            </div>
            <div class="card">
                <img src="cabana.jpg" alt="Livro" class="card__image">
                <p class="card__name">A Cabana</p>
                <div class="grid-container">

                    <div class="grid-child-autor">
                        William P. Young
                    </div>

                    <div class="grid-child-genere">
                        Ficção Religiosa
                    </div>

                </div>
                <button class="btn draw-border">Perfil</button>
                <button class="btn draw-border">Messagem</button>
            </div>
            <div class="card">
                <img src="aculpa.jpg" alt="Livro" class="card__image">
                <p class="card__name">A Culpa é das Estrelas</p>
                <div class="grid-container">

                    <div class="grid-child-autor">
                        Jhon Green
                    </div>

                    <div class="grid-child-genere">
                        Romance
                    </div>

                </div>
                <button class="btn draw-border">Perfil</button>
                <button class="btn draw-border">Messagem</button>
            </div>
            <div class="card">
                <img src="cabana.jpg" alt="Livro" class="card__image">
                <p class="card__name">A Cabana</p>
                <div class="grid-container">

                    <div class="grid-child-autor">
                        William P. Young
                    </div>

                    <div class="grid-child-genere">
                        Ficção Religiosa
                    </div>

                </div>
                <button class="btn draw-border">Perfil</button>
                <button class="btn draw-border">Messagem</button>
            </div>
            <div class="card">
                <img src="aculpa.jpg" alt="Livro" class="card__image">
                <p class="card__name">A Culpa é das Estrelas</p>
                <div class="grid-container">

                    <div class="grid-child-autor">
                        Jhon Green
                    </div>

                    <div class="grid-child-genere">
                        Romance
                    </div>

                </div>
                <button class="btn draw-border">Perfil</button>
                <button class="btn draw-border">Messagem</button>
            </div>
        </div>


		<!--===============================================================================================-->
		<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
		<!--===============================================================================================-->
		<script src="vendor/bootstrap/js/popper.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<!--===============================================================================================-->
		<script src="vendor/select2/select2.min.js"></script>
		<!--===============================================================================================-->
		<script src="vendor/tilt/tilt.jquery.min.js"></script>
		<script>
			$('.js-tilt').tilt({
				scale: 1.1
			})
		</script>
		<!--===============================================================================================-->
		<script src="js/main.js"></script>
	</body>

	</html>
<?php
} else {
	header('Location: login/login.php');
}
?>