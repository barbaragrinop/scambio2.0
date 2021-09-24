<?php
//Validadar se existe SESSION
session_start();
if (isset($_SESSION['id'])) {
	header('Location: ../home.php');
} else {
?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<title>Scambio | Login</title>
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
		<link href="../assets/css/style.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		<link href="assets/css/style.css" rel="stylesheet">
		<link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/heroes/">
		<!--===============================================================================================-->
	</head>

	<body>
		<nav class="navbar secondaryColor navbar-expand-lg navbar-light bg-light">
			<div class="container-fluid">
				<a class="navbar-brand" href="../index.php">
					<img class="img-login" src="../assets/imgs/logo1.PNG" alt="logo Scambio" width="110" height="38">
				</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="textCor nav navbar-nav navbar-left">
						<li>
							<a href="../index.php#comofunciona"> Como Funciona?</a>
						</li>
						<li>
							<a href="../index.php#quemsomos">Quem Somos</a>
						</li>
						<li>
							<a href="../index.php#ajuda"> Ajuda</a>
						</li>

					</ul>
					<ul class="textCor nav navbar-nav navbar-right">
						<li>
							<a href="../cadastro/cadastro.php"><span class="glyphicon glyphicon-user"></span> Cadastre-se</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>

		<div class="limiter">
			<div class="container-login100">
				<div class="wrap-login100">
					<div class="login100-pic js-tilt div-improv" data-tilt>
						<img src="images/login.png" alt="IMG">
					</div>

					<form class="login100-form validate-form" method="post" action="../session_authguard.php">
						<span class="login100-form-title">
							Entre para continuar
						</span>

						<div class="wrap-input100 validate-input" data-validate="E-mail Inválido!">
							<input class="input100" type="text" name="email" placeholder="Email">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-envelope" aria-hidden="true"></i>
							</span>
						</div>

						<div class="wrap-input100 validate-input" data-validate="Digite sua senha!">
							<input class="input100" type="password" name="pass" placeholder="Senha">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-lock" aria-hidden="true"></i>
							</span>
						</div>

						<div class="container-login100-form-btn">
							<a class="link-entrar" href="../home/home.php">
								<button class="login100-form-btn">
									Entrar
								</button>
							</a>
						</div>

						<div class="text-center p-t-12">
							<span class="txt1">
								<!-- Esqueceu sua -->
							</span>
							<a class="txt2" href="../recuperacao/senha.php">
								Esqueceu sua Senha?
							</a>
						</div>
					</form>
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

	</body>

	</html>
<?php
}
?>