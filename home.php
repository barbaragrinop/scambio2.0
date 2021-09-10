<?php
session_start();
if (isset($_SESSION['id'])) {
?>
	<!DOCTYPE html>
	<html lang="pt-br">

	<head>
		<title>Scambio</title>
		<link rel="shortcut icon" href="assets/imgs/logoFundo.png" />
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="stylesheet" type="text/css" href="login/vendor/bootstrap/css/bootstrap.min.css">

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<link href="assets/css/style.css" rel="stylesheet">

		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
		<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<style>
			 .container-card {
        display: grid;
        grid-template-columns: 300px 300px 300px;
        grid-gap: 50px;
        justify-content: center;
        align-items: center;
        height: 100vh;
        font-family: 'Baloo Paaji 2', cursive;
        padding-top: 50px;
    }
    
    .card {
        background-color: #dfd6ca;
        height: 35rem;
        border-radius: 5px;
        display: flex;
        flex-direction: column;
        align-items: center;
        box-shadow: rgba(0, 0, 0, 0.7);
        color: #686766;
    }
    
    .card__name {
        margin-top: 15px;
        font-size: 1.5em;
    }
    
    .card__image {
        height: 200px;
        width: 160px;
        margin-top: 20px;
        box-shadow: 0 10px 50px #686766;
    }
    
    .draw-border {
        box-shadow: inset 0 0 0 4px #ffffff;
        color: #ffffff;
        -webkit-transition: color 0.25s 0.0833333333s;
        transition: color 0.25s 0.0833333333s;
        position: relative;
    }
    
    .draw-border::before,
    .draw-border::after {
        border: 0 solid transparent;
        box-sizing: border-box;
        content: '';
        pointer-events: none;
        position: absolute;
        width: 0rem;
        height: 0;
        bottom: 0;
        right: 0;
    }
    
    .draw-border::before {
        border-bottom-width: 4px;
        border-left-width: 4px;
    }
    
    .draw-border::after {
        border-top-width: 4px;
        border-right-width: 4px;
    }
    
    .draw-border:hover {
        color: white;
    }
    
    .draw-border:hover::before,
    .draw-border:hover::after {
        border-color: #686766;
        -webkit-transition: border-color 0s, width 0.25s, height 0.25s;
        transition: border-color 0s, width 0.25s, height 0.25s;
        width: 100%;
        height: 100%;
    }
    
    .draw-border:hover::before {
        -webkit-transition-delay: 0s, 0s, 0.25s;
        transition-delay: 0s, 0s, 0.25s;
    }
    
    .draw-border:hover::after {
        -webkit-transition-delay: 0s, 0.25s, 0s;
        transition-delay: 0s, 0.25s, 0s;
    }
    
    .btn {
        background: none;
        border: none;
        cursor: pointer;
        line-height: 1.5;
        font: 700 1.2rem 'Roboto Slab', sans-serif;
        padding: 0.75em 2em;
        letter-spacing: 0.05rem;
        margin: 1em;
        width: 13rem;
    }
    
    .btn:focus {
        outline: 2px dotted #686766;
    }
    
    .grid-container {
        display: grid;
        grid-template-columns: 1fr 1fr;
        grid-gap: 20px;
        font-size: 1.2em;
    }
	.h1-large{
		padding-top: 40px;
		text-align: center;

	}

	@media only screen and (min-width: 150px) and (max-width: 530px) {
		.container-card {
			width: 1px;
			height: 1px;
		}
	}
		</style>
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
						<li><a class="links-nav-home" href="perfil.php">Perfil</a></li>
						<li><a href="mensage.php">Mensagens</a></li>
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
		<h2 class="h1-large" style="font-family: Cutive;">Procure por uma nova história!</h2>
		<div class="w3-row-padding" style=" padding-top: 60px; ">
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