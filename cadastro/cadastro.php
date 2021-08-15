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
	<title>Cadastro | Scambio</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
	rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/heroes/">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Ubuntu:500' rel='stylesheet' type='text/css'>
    <script src="assets/js/validacao.js"></script>
    <script src="assets/js/cadastroUsuario.js"></script>
    <script src="assets/js/script.js"></script>
    <script src="assets/js/confirmacao-senha.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
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
					</div>
				</div>
			</nav>
		
			<div class="limiter">
				<div class="container-login100">
					<div class="wrap-login100 container">
						<form class="login100-form validate-form row" method="post" action="../session_authguard.php">
							<span class="login100-form-title">
								Cadastre-se na plataforma!
							</span>

							<div class="wrap-input100 validate-input col" data-validate = "Nome completo!">
								<small class="titleInputs">Nome</small>
								<input class="input100" type="text" name="name" id="nome" placeholder="Nome Completo">
							</div>

							<div class="wrap-input100 validate-input col-md-6" data-validate = "Celular Inválido!">
								<small class="titleInputs">Celular</small>
								<input class="input100" type="text" name="celular" id="celular" placeholder="(99) 99999-9999">
							</div>

							<div class="wrap-input100 validate-input col-md-6" data-validate = "Senha inválida!">
								<small class="titleInputs">Senha</small>
								<input class="input100" type="password" name="senha" id="senha" placeholder="********">
							</div>

							<div class="wrap-input100 validate-input col-md-6" data-validate = "Senha Inválida!">
								<small class="titleInputs">Confirmar senha</small>
								<input class="input100" type="password" name="senhaConfirmacao" placeholder="********">
							</div>

							<div class="wrap-input100 validate-input col-md-6" data-validate = "Data Inválida!">
								<small class="titleInputs">Data de nascimento</small>
								<input class="input100" type="date" name="dtnasc" placeholder="">
							</div>

							<div class="wrap-input100 validate-input col-md-6" data-validate = "Email Inválida!">
								<small class="titleInputs">Email</small>
								<input class="input100" type="text" name="email" id="email" placeholder="Email">
							</div>

							<div class="wrap-input100 validate-input col-md-6" data-validate = "CEP Inválido!">
								<small class="titleInputs">CEP</small>
								<input class="input100" name="cep" id="cep" placeholder="_____-___">
							</div>

							<div class="wrap-input100 validate-input col-md-6" data-validate = "Cidade Inválida!">
								<small class="titleInputs">Cidade</small>
								<input class="input100" type="text" name="cidade" id="cidade" placeholder="Cidade">
							</div>

							<div class="wrap-input100 validate-input col-md-6" data-validate = "Rua Inválida!">
								<small class="titleInputs">Rua</small>
								<input class="input100" type="text" name="rua" id="rua" placeholder="Nome da Rua">
							</div>

							<div class="wrap-input100 validate-input col-md-6" data-validate = "Número Inválido!">
								<small class="titleInputs">Número</small>
								<input class="input100" type="number" name="numero" id="numero" placeholder="999">
							</div>

							<div class="wrap-input100 validate-input col-md-6" data-validate = "Bairro Inválida!">
								<small class="titleInputs">Bairro</small>
								<input class="input100" type="text" name="bairro" id="bairro" placeholder="Nome do Bairro">
							</div>
							
							<div class="wrap-input100 validate-input col-md-6" data-validate = "Estado Inválida!">
								<small class="titleInputs">Estado</small>
								<input class="input100" type="text" name="estado" id="estado" placeholder="Estado">
							</div>

							
							
							<div class="container-login100-form-btn">
								<a class="link-entrar" href="#">
									<button class="login100-form-btn">
										Cadastro
									</button>
								</a>
							</div>

							
						</form>
					</div>
				</div>
			</div>
		
		

		
	<!--===============================================================================================-->	
		<!-- <script src="vendor/jquery/jquery-3.2.1.min.js"></script> -->
	<!--===============================================================================================-->
		<script src="vendor/bootstrap/js/popper.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
		<script src="vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
		<!-- <script src="vendor/tilt/tilt.jquery.min.js"></script> -->
		<script >
			$('.js-tilt').tilt({
				scale: 1.1
			})
		</script>
	<!--===============================================================================================-->
		<script src="js/main.js"></script>

		<!--  -->
		<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
		<script>
			$("#celular").mask("(99) 99999-9999");
			$("#cep").mask("99999-999");
    	</script>
		

	</body>
</html>
<?php	
	}
?>