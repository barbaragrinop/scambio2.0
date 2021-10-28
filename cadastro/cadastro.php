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
		<title>Cadastro | Scambio</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
		<link rel="stylesheet" href="css/toast.css">
		<!--===============================================================================================-->
		<link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/heroes/">
		<link href='https://fonts.googleapis.com/css?family=Ubuntu:500' rel='stylesheet' type='text/css'>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
		<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
		<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
		<link href="assets/css/style.css" rel="stylesheet">
		<link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/heroes/">

		<script src="../assets/js/validacao.js"></script>
		<script src="../assets/js/cadastroUsuario.js"></script>
		<script src="../assets/js/script.js"></script>
		<script src="../assets/js/confirmacao-senha.js"></script>

		<style>
			body {
				zoom: 0.9
			}

			label {
				margin-bottom: -2px !important;
			}
		</style>

	</head>

	<body>
		<nav class="navbar secondaryColor navbar-expand-lg navbar-light bg-light">
			<div class="container-fluid">
				<a class="navbar-brand" href="../index.php">
					<img src="../assets/imgs/logo1.PNG" alt="logo Scambio" width="122" height="43">
				</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="textCor nav navbar-nav navbar-left">
						<li>
							<a href="../index.php#comofunciona"> Como Funciona?</a>
						</li>
						<li class="links-cadastro">
							<a href="../index.php#quemsomos">Quem Somos</a>
						</li>
						<li class="links-cadastro">
							<a href="../index.php#ajuda"> Ajuda</a>
						</li>

					</ul>
				</div>
			</div>
		</nav>

		<div class="limiter">
			<div class="container-login100">
				<div class="wrap-login100 container">
					<form class="login100-form validate-form row" id="frm" method="post" action="../cadastroUsuario.php" autocomplete="no">
						<span class="login100-form-title">
							Cadastre-se na plataforma!
						</span>

						<div class="wrap-input100 validate-input col" data-validate="Digite seu nome completo!">
							<small class="titleInputs">Nome</small>
							<input autocomplete="no" class="input100" type="text" name="nome" id="nome" placeholder="Nome Completo">
							<div id="snackbarnome">Digite seu nome completo!</div>
						</div>

						<div class="wrap-input100 validate-input col-md-6" data-validate="Celular Inválido!">
							<small class="titleInputs">Celular</small>
							<input class="input100" type="text" name="celular" id="celular" placeholder="(99) 99999-9999">
							<div id="snackbarcelular">Digite seu número celular!</div>
						</div>

						<div class="wrap-input100 validate-input col-md-6" data-validate="Digite uma senha válida!">
							<small class="titleInputs">Senha</small>
							<input class="input100" type="password" name="senha" id="senha" placeholder="********">
							<div id="snackbarsenha">Digite uma senha válida!</div>
						</div>

						<div class="wrap-input100 validate-input col-md-6" data-validate="Digite uma senha válida!">
							<small class="titleInputs">Confirmar senha</small>
							<input class="input100" type="password" name="senhaConfirmacao" id="senhaConfirmacao" placeholder="********">
							<div id="snackbarSenhaConfirmacao">Digite sua confirmação de senha!</div>
						</div>

						<div class="wrap-input100 validate-input col-md-6" data-validate="Data Inválida!">
							<small class="titleInputs">Data de nascimento</small>
							<input class="input100" type="text" name="dtnasc" id="dtnasc" placeholder="17/01/2004">
							<div id="snackbardtnasc">Digite sua data de nascimento!</div>
						</div>

						<div class="wrap-input100 validate-input col-md-6" data-validate="Email Inválido!">
							<small class="titleInputs">Email</small>
							<input class="input100" type="text" name="email" id="email" placeholder="Email">
							<div id="snackbaremail">Digite seu Email!</div>
						</div>

						<div class="wrap-input100 validate-input col-md-6" data-validate="CEP Inválido!">
							<small class="titleInputs">CEP</small>
							<input class="input100" name="cep" id="cep" placeholder="_____-___">
							<div id="snackbarcep">Digite seu CEP!</div>
						</div>

						<div class="wrap-input100 validate-input col-md-6" data-validate="Cidade Inválida!">
							<small class="titleInputs">Cidade</small>
							<input class="input100" type="text" name="cidade" id="cidade" placeholder="Cidade" readonly>
							<div id="snackbarcidade">Digite sua cidade!</div>
						</div>

						<div class="wrap-input100 validate-input col-md-6" data-validate="Rua Inválida!">
							<small class="titleInputs">Rua</small>
							<input class="input100" type="text" name="rua" id="rua" placeholder="Nome da Rua" readonly>
							<div id="snackbarrua">Digite sua rua!</div>
						</div>

						<div class="wrap-input100 validate-input col-md-6" data-validate="Número Inválido!">
							<small class="titleInputs">Número</small>
							<input class="input100" type="number" name="numero" id="numero" placeholder="999">
							<div id="snackbarnumero">Digite o número da sua casa!</div>
						</div>

						<div class="wrap-input100 validate-input col-md-6" data-validate="Bairro Inválido!">
							<small class="titleInputs">Bairro</small>
							<input class="input100" type="text" name="bairro" id="bairro" placeholder="Nome do Bairro" readonly>
							<div id="snackbarbairro">Digite seu bairro!</div>
						</div>

						<div class="wrap-input100 validate-input col-md-6" data-validate="Estado Inválido!">
							<small class="titleInputs">Estado</small>
							<input class="input100" type="text" name="estado" id="estado" placeholder="Estado" readonly>
							<div id="snackbarestado">Digite seu estado!</div>
						</div>

						<div class="wrap-input100 validate-input col-md-6" data-validate="Estado Inválido!" style="display: flex;">
							<div style="display: flex;">
								<!-- <input type="checkbox" id="termos" name="termos"> -->
								<label for="termos" style="width: 800px;">Ao continuar, você concorda com a <small> <a style="font-weight: 800; color: blue; font-size: 14.5px; letter-spacing: 0.6px;" target="_blank" href="../politica-privacidade.php">Política de Privacidade</a> </small> do Scambio.</label>
							</div>
						</div>

						<div class="container-login100-form-btn pointer-none">
							<a class="link-entrar" href="#">
								<button class="login100-form-btn classHover" id="salvar">
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
		<!-- <script >
			$('.js-tilt').tilt({
				scale: 1.1
			})
		</script> -->
		<!--===============================================================================================-->
		<script src="js/main.js"></script>

		<!--  -->
		<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
		<script>
			$("#celular").mask("(99) 99999-9999");
			$("#cep").mask("99999-999");
			$("#dtnasc").mask("99/99/9999");
		</script>


	</body>

	</html>
<?php
}
?>