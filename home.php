<?php
	session_start();
	if(isset($_SESSION['id'])){
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
                    <li><a class="links-nav-home" href="index.php#comofunciona">Como Funciona?</a></li>
                    <li><a href="index.php#sobre">Quem Somos</a></li>
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
	}else{
		header('Location: login/login.php');
	}
?>
