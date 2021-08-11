<?php
	//Validadar se existe SESSION
	session_start();
	if(isset($_SESSION['id'])){
		header('Location: ../home.php');
	}else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Scambio</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
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
</head>
	<body>
		<nav class="navbar secondaryColor navbar-expand-lg navbar-light bg-light">
				<div class="container-fluid">
					<a class="navbar-brand" href="../index.php">
						<img src="images/logo1.png" alt="logo Scambio" width="110" height="38">
					</a>
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav me-auto mb-2 mb-lg-0">
							<li class="nav-item">
								<a class="nav-link" href="../index.php#comofunciona">Como Funciona?</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="../index.php#sobre">Quem Somos</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="../index.php#ajuda">Ajuda</a>
							</li>
						</ul>
						<!--   Adiconar Botão para redirecionar para a tela de login
						<ul class=" textCor nav navbar-nav navbar-right">
							<li><a href="cadastro.php"><span class="glyphicon glyphicon-user"></span> Cadastre-se</a></li>
						</ul> -->
					</div>
				</div>
			</nav>
		
			<div class="limiter">
				<div class="container-login100">
					<div class="wrap-login100 container">
						<form class="login100-form validate-form row" method="post" action="../session_authguard.php">
							<span class="login100-form-title">
								Entre para continuar
							</span>

							<div class="wrap-input100 validate-input col" data-validate = "Nome completo!">
								<small class="titleInputs">Nome</small>
								<input class="input100" type="text" name="name" placeholder="Nome Completo">
								<!-- <span class="focus-input100"></span>
								<span class="symbol-input100">
									<i class="fa fa-user" aria-hidden="true"></i> -->
								<!-- </span> -->
							</div>

							<div class="wrap-input100 validate-input col-md-6" data-validate = "Celular Inválido!">
								<small class="titleInputs">Celular</small>
								<input class="input100" type="text" name="celular" placeholder="(99) 99999-9999">
								<!-- <span class="focus-input100"></span>
								<span class="symbol-input100">
									<i class="fa fa-mobile" aria-hidden="true"></i>
								</span> -->
							</div>

							<div class="wrap-input100 validate-input col-md-6" data-validate = "Senha inválida!">
								<small class="titleInputs">Senha</small>
								<input class="input100" type="password" name="senha" placeholder="********">
								<!-- <span class="focus-input100"></span>
								<span class="symbol-input100">
									<i class="fa fa-lock" aria-hidden="true"></i>
								</span> -->
							</div>

							<div class="wrap-input100 validate-input col-md-6" data-validate = "Senha Inválida!">
								<small class="titleInputs">Confirmar senha</small>
								<input class="input100" type="password" name="senhaConfirmacao" placeholder="********">
								<!-- <span class="focus-input100"></span>
								<span class="symbol-input100">
									<i class="fa fa-envelope" aria-hidden="true"></i>
								</span> -->
							</div>

							<div class="wrap-input100 validate-input col-md-6" data-validate = "CEP Inválido!">
								<small class="titleInputs">CEP</small>
								<input class="input100" type="number" name="cep" placeholder="_____-___">
								<!-- <span class="focus-input100"></span>
								<span class="symbol-input100">
									<i class="fas fa-map" aria-hidden="true"></i>
								</span> -->
							</div>

							<div class="wrap-input100 validate-input col-md-6" data-validate = "Número Inválido!">
								<small class="titleInputs">Número</small>
								<input class="input100" type="text" name="numero" placeholder="999">
								<!-- <span class="focus-input100"></span>
								<span class="symbol-input100">
									<i class="fa fa-envelope" aria-hidden="true"></i>
								</span> -->
							</div>

							<div class="wrap-input100 validate-input col-md-6" data-validate = "Cidade Inválida!">
								<small class="titleInputs">Cidade</small>
								<input class="input100" type="text" name="cidade" placeholder="Cidade">
								<!-- <span class="focus-input100"></span>
								<span class="symbol-input100">
									<i class="fa fa-envelope" aria-hidden="true"></i>
								</span> -->
							</div>

							<div class="wrap-input100 validate-input col-md-6" data-validate = "Data Inválida!">
								<small class="titleInputs">Data de nascimento</small>
								<input class="input100" type="date" name="data" placeholder="">
								<!-- <span class="focus-input100"></span>
								<span class="symbol-input100">
									<i class="fa fa-envelope" aria-hidden="true"></i>
								</span> -->
							</div>

							<div class="wrap-input100 validate-input col-md-6" data-validate = "Email Inválida!">
								<small class="titleInputs">Email</small>
								<input class="input100" type="text" name="email" placeholder="Email">
								<!-- <span class="focus-input100"></span>
								<span class="symbol-input100">
									<i class="fa fa-envelope" aria-hidden="true"></i>
								</span> -->
							</div>

							<div class="wrap-input100 validate-input col-md-6" data-validate = "Rua Inválida!">
								<small class="titleInputs">Rua</small>
								<input class="input100" type="text" name="rua" placeholder="Nome da Rua">
								<!-- <span class="focus-input100"></span>
								<span class="symbol-input100">
									<i class="fa fa-envelope" aria-hidden="true"></i>
								</span> -->
							</div>

							<div class="wrap-input100 validate-input col-md-6" data-validate = "Bairro Inválida!">
								<small class="titleInputs">Bairro</small>
								<input class="input100" type="text" name="bairro" placeholder="Nome do Bairro">
								<!-- <span class="focus-input100"></span>
								<span class="symbol-input100">
									<i class="fa fa-envelope" aria-hidden="true"></i>
								</span> -->
							</div>
							
							<div class="wrap-input100 validate-input col-md-6" data-validate = "Estado Inválida!">
								<small class="titleInputs">Estado</small>
								<input class="input100" type="text" name="estado" placeholder="Estado">
								<!-- <span class="focus-input100"></span>
								<span class="symbol-input100">
									<i class="fa fa-envelope" aria-hidden="true"></i>
								</span> -->
							</div>

							
							
							<div class="container-login100-form-btn">
								<a class="link-entrar" href="#">
									<button class="login100-form-btn">
										Entrar
									</button>
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
		<script >
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