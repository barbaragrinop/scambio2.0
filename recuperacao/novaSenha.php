<?php
//Validadar se existe SESSION
session_start();

if (isset($_SESSION['id'])) {
	header('Location: ../home.php');
} else {
?>
	<!DOCTYPE html>
	<html lang="pt-br">

	<head>
		<title>Scambio</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!--===============================================================================================-->
		<link rel="shortcut icon" href="../assets/imgs/logoFundo.png" />

		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="css/util.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<!--===============================================================================================-->
		
		<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
		<!--===============================================================================================-->
		<!-- <script src="../assets/js/recuperaSenha.js"></script> -->
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

		<style>
			.secondaryColor {
				background-color: #f2eee8;
				border: #f2eee8;
				height: 60px;
			}
		</style>
	</head>

	<body>
		<nav class="navbar secondaryColor navbar-expand-lg navbar-light bg-light">
			<div class="container-fluid">
				<a class="navbar-brand" href="../index.php">
					<img src="../assets/imgs/logo1.PNG" alt="logo Scambio" width="110" height="38">
				</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav me-auto mb-2 mb-lg-0">
						<li class="nav-item">
							<a class="nav-link" href="../index.php#comofunciona">Como Funciona?</a>
						</li>
						<li class="nav-item nav-item-2">
							<a class="nav-link" href="../index.php#sobre">Quem Somos</a>
						</li>
						<li class="nav-item nav-item-2">
							<a class="nav-link" href="../index.php#ajuda">Ajuda</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>

		<div class="limiter">
			<div class="container-login100">
				<div class="wrap-login100">
					<div class="login100-pic js-tilt div-improv" data-tilt>
						<img src="images/book.png" alt="IMG">
					</div>

					<form class="login100-form validate-form" id=frmRestauraSenha ">
						<!-- <form class="login100-form validate-form" id="frmRestauraSenha"> -->
						<span id="titlePrincipal" class="login100-form-title">
							Digite uma senha confiável.
						</span>

						<div class="wrap-input100 validate-input" data-validate="E-mail Inválido!">
							<input class="input100" type="password" name="novaSenha1" placeholder="Senha" id="novaSenha1">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-lock" aria-hidden="true"></i>
							</span>
						</div>

						<div class="wrap-input100 validate-input" data-validate="E-mail Inválido!">
							<input class="input100" type="password" name="novaSenha2" placeholder="Confirme a senha" id="novaSenha2">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-lock" aria-hidden="true"></i>
							</span>
						</div>

						<div class="container-login100-form-btn">
							<button id="btnRedefinirSenha" type="submit" class="login100-form-btn">
								Redefinir Senha
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>



		
		<div class="position-absolute start-50 top-0 end-0 p-3" style="z-index: 11">
			<div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
				<div class="toast-body">
					<p id="resToast"></p>
				</div>
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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="../assets/js/renovaSenha.js"></script>
	</body>

	</html>
<?php
}
?>