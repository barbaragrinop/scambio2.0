<!DOCTYPE html>
<html lang="pt-br">

<?php
session_start();
include_once('../config/conexao.php');
?>

<head>
	<title>Scambio | Home</title>
	<!-- <link rel="stylesheet" type="text/css" href="css/home.css"> -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style.css">
	<link rel="shortcut icon" href="../assets/imgs/logoFundo.png" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;500&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
	<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>

	<link href="../assets/css/style.css" rel="stylesheet">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/heroes/">
	


	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container-fluid">
			<a href="../index.php"><img class="img-index" src="../assets/imgs/logo1.PNG" alt="logo Scambio" width="110" height="38"></a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="textCor nav navbar-nav">
					<li><a class="links-nav-index" href="../perfil.php">Perfil</a></li>
					<li><a class="links-nav-index" href="../mensagem/mensagem.php">Mensagem</a></li>
					<li><a class="links-nav-index" href="../index.php#ajuda">Ajuda</a></li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="input-group input-align">
		<!-- MODIFICAR INPUT NOVAMENTE POIS TIVE QUE COLOCAR UM FORM PARA FAZER O FILTRO  !!!! IMPORTANTE -->
		<form action="" method="post">
			<div class="wrapping-form">
				<input name="filtro" type="text" class="form-control" placeholder="O que procura?" aria-label="Username" aria-describedby="addon-wrapping">
				<button class="input-group-text" id="addon-wrapping">
					<i class="fas fa-search fa-sm"></i>
				</button>
			</div>
		</form>
	</div>
	<!-- 	!! IMPORTANTE ARRUMAR OS CARDS POIS O CLIQUE NO SEGUNDO CARD ESTÁ PASSANDO A FOTO DO PRIMEIRO -->
	<div class="wrapper">
		<div class="row">
			<div class="card col-3">
				<div class="marcando">
					<i id="marcador" class="fas fa-bookmark"></i>
				</div>
				<div class="card-body">
					<img class="img-fluid" id="img-book" src="https://upload.wikimedia.org/wikipedia/commons/7/70/Austria_-_Admont_Abbey_Library_-_1407.jpg" alt="">
					<div class="detalhes">
						<img id="img-profile" src="https://upload.wikimedia.org/wikipedia/commons/1/1c/Demi_Lovato_Interview_Feb_2020.png" alt="" class="img-fluid">
						<p>Barbara Hellen</p>
					</div>
					<div class="possivel-chamada">
						<button>
							<i class="fas fa-envelope"></i>
						</button>
						<button><i class="fas fa-envelope"></i></button>
						<button><i class="fas fa-envelope"></i></button>
					</div>
				</div>
			</div>						
			<div class="card col-3">
				<div class="card-body">
					olá
				</div>
			</div>
			<div class="card col-3">
				<div class="card-body">
					olá
				</div>
			</div>		
			
		</div>
	</div>

	<!-- <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer> -->


	<!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="mb-3">
						<textarea class="form-control" placeholder="Publique algo e um match no Scambio!" id="exampleFormControlTextarea1" rows="3"></textarea>
					</div>
					<div class="row">
						<div class="col">
							<button><i class="fas fa-images fa-sm " style="color: black;"></i></button>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="button-close" data-bs-dismiss="modal">Close</button>
					<button type="button" class="button-save">Save changes</button>
				</div>
			</div>
		</div>
	</div> -->


</body>

</html>