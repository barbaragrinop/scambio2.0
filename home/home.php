<!DOCTYPE html>
<html lang="pt-br">

<?php
session_start();
include_once('../config/conexao.php');
?>

<head>
	<title>Scambio | Home</title>
	<!-- <link rel="stylesheet" type="text/css" href="css/home.css"> -->
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

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


	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link href="../assets/css/style.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link href="assets/css/style.css" rel="stylesheet">
	<link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/heroes/">

	<link rel="stylesheet" href="../assets/css/style.css">


	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->

	<style>
		a {
			color: black;
		}

		.navbar {
			background-color: #f2eee8 !important;

		}

		.carousel-control-next-icon {
			background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='black' viewBox='0 0 8 8'%3E%3Cpath d='M2.75 0l-1.5 1.5 2.5 2.5-2.5 2.5 1.5 1.5 4-4-4-4z'/%3E%3C/svg%3E");
		}

		.carousel-control-prev-icon {
			background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='black' viewBox='0 0 8 8'%3E%3Cpath d='M5.25 0l-4 4 4 4 1.5-1.5-2.5-2.5 2.5-2.5-1.5-1.5z'/%3E%3C/svg%3E");
		}

		#carouselExampleControls {
			/* width: 50%; */
			padding-left: 34%;
			padding-right: 34%;
		}

		.buttonLogout {
			margin-top: 5.5px;
		}
	</style>
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
				<?php
				if (isset($_SESSION['id'])) {
				?>
					<!-- Modificar este Botão  ----  Botão Logout -->
					<form action="../logout.php">
						<input id="inpkill" class="inpkill glyphicon buttonLogout" name="DestroySession" type="submit" value="Sair">
					</form>
				<?php
				} else {
				?>
					<ul class="textCor nav navbar-nav navbar-right">
						<li><a class="links-nav-index" href="../cadastro/cadastro.php"><span class="glyphicon glyphicon-user "></span> Cadastre-se</a></li>
						<li><a class="links-nav-index" href="../login/login.php"><span class="glyphicon glyphicon-log-in"></span> Entrar</a></li>
					</ul>
				<?php
				}
				?>
			</div>
		</div>
	</nav>
	<div class="wrapper">
		<!-- <div class="nav-lateral">
			<div class="opcoes">
				<a href="#"><i class="fas fa-user fa-2x" style="color: black" data-bs-toggle="tooltip" data-bs-placement="top" title="Meu perfil"></i></i></a>
				<a href="#"><i class="fas fa-home fa-2x" style="color: black" data-bs-toggle="tooltip" data-bs-placement="top" title="Feed"></i></i></a>
				<a href="#"><i class="fas fa-book fa-2x" style="color: black;" data-bs-toggle="tooltip" data-bs-placement="top" title="Fórum"></i></i></a>
				<a href="#"><i class="fas fa-comments fa-2x" style="color: black;" data-bs-toggle="tooltip" data-bs-placement="top" title="Conversas"></i></i></a>
				<a href="#"><i class="fas fa-plus fa-2x " style="color: black;" data-bs-toggle="modal" data-bs-target="#exampleModal"></i></i></a>
			</div>
		</div> -->
		<div class="conteudo">
			<!-- <div class="onTop">
				<div class="topo">
					<a href="#"><i class="fas fa-plus fa-2x " style="color: black;" data-bs-toggle="modal" data-bs-target="#exampleModal"></i></i></a>
					<a href="#"><i class="fas fa-plus fa-2x " style="color: black;" data-bs-toggle="modal" data-bs-target="#exampleModal"></i></i></a>
					<a href="#"><i class="fas fa-plus fa-2x " style="color: black;" data-bs-toggle="modal" data-bs-target="#exampleModal"></i></i></a>
				</div>
			</div> -->
			<div class="input-group input-align">
				<!-- MODIFICAR INPUT NOVAMENTE POIS TIVE QUE COLOCAR UM FORM PARA FAZER O FILTRO  !!!! IMPORTANTE -->
				<form action="" method="post">
				<input name="filtro" type="text" class="form-control" placeholder="O que procura?" aria-label="Username" aria-describedby="addon-wrapping">

				<button class="input-group-text" id="addon-wrapping">
					<i class="fas fa-search fa-sm"></i>
				</button>
				</form>
			</div>
			<?php
			if(isset($_POST['filtro'])){
				$nmliv = $_POST['filtro'];
			}
			else{
				$nmliv = "";
			}
			
			$sql = "SELECT ANUN.CD_ANUNCIO as cda,ANUN.DS_ANUNCIO as ds,ANUN.DS_IMG1 as img1,ANUN.DS_IMG2 as img2,US.nm_usuario as user,LOC.NM_LOGRADOURO as loc,LOC.CD_CASA as casa,";
			$sql .= " BAIRRO.NM_BAIRRO as bairro,CITY.NM_CIDADE as cid,UF.SG_UF as u,LIV.NM_LIVRO as livro,LIV.DT_LANCAMENTO as lanc, AUT.NM_AUTOR AS AUTOR, GE.NM_GENERO AS genero FROM db_scambio.TB_ANUNCIO AS ANUN INNER JOIN db_scambio.tb_usuario AS US ON";
			$sql .= " ANUN.cd_usuario = US.cd_usuario INNER JOIN db_scambio.tb_logradouro AS LOC ON US.cd_logradouro = LOC.CD_LOGRADOURO INNER JOIN db_scambio.TB_BAIRRO AS BAIRRO ON";
			$sql .= " BAIRRO.cd_BAIRRO = LOC.cd_BAIRRO INNER JOIN db_scambio.TB_CIDADE AS CITY ON CITY.cd_CIDADE = BAIRRO.cd_CIDADE INNER JOIN db_scambio.TB_UF AS UF ON";
			$sql .= " UF.CD_UF = CITY.CD_UF INNER JOIN db_scambio.TB_LIVRO AS LIV ON LIV.CD_LIVRO = ANUN.CD_LIVRO INNER JOIN db_scambio.TB_AUTOR AS AUT ON AUT.CD_AUTOR = LIV.CD_AUTOR";
			$sql .= " INNER JOIN DB_SCAMBIO.livro_genero AS LIVG ON  LIVG.CD_LIVRO = LIV.CD_LIVRO INNER JOIN  DB_SCAMBIO.tb_genero AS GE ON  GE.cd_genero = LIVG.cd_genero WHERE NM_LIVRO LIKE '" . $nmliv . "%'";

			$publicacao = $pdo->prepare($sql);
			$publicacao->execute();
			$result = $publicacao->fetchAll(PDO::FETCH_OBJ);

			/* CODE PARA TRANSFORMAR IMAGEM EM BASE64 
				$data = file_get_contents('C:\xampp\htdocs\scambio2.0\515vbT3t2UL.jpg');
				$data = base64_encode($data);
				$query2 = $pdo->prepare('UPDATE DB_SCAMBIO.TB_ANUNCIO SET DS_IMG1 = "'. $data .'" WHERE CD_ANUNCIO = 1');
				$query2->execute(); */

			foreach ($result as $key => $row) {
			?>

		<!-- 	!! IMPORTANTE ARRUMAR OS CARDS POIS O CLIQUE NO SEGUNDO CARD ESTÁ PASSANDO A FOTO DO PRIMEIRO -->
				<div class="carding">
					<div class="card">
						<div class="card-body">
							<div class="left">
								<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
									<div class="carousel-inner">
										<div class="carousel-item active">
											<img src="data:image;base64,<?php echo $row->img1 ?>" class="d-block w-100" alt="...">
										</div>
										<div class="carousel-item">
											<img src="data:image;base64,<?php echo $row->img2 ?>" class="d-block w-100" alt="...">
										</div>
									</div>
									<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
										<span class="carousel-control-prev-icon" aria-hidden="true"></span>
										<span class="visually-hidden">Previous</span>
									</button>
									<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
										<span class="carousel-control-next-icon" aria-hidden="true"></span>
										<span class="visually-hidden">Next</span>
									</button>
								</div>
							</div>
							<div class="right">
								<span class="titulo"><?php echo $row->livro; ?></span>
								<p><?php echo $row->ds; ?></p>

								<span class="links-card-dentro">
									<a href="">
										<i class="fas fa-user fa-sm"></i>
										<?php echo $row->user; ?>
									</a> <br>

									<a href="">
										<i class="fas fa-map fa-sm"></i>
										<?php echo ($row->cid . "/" . $row->u); ?>
									</a> <br>

									<a href="">
										<i class="fas fa-envelope fa-sm"></i>
										Match!
									</a>
								</span>
							</div>
						</div>
					</div>
				</div>
			<?php
			}
			?>
		</div>

		<!-- <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer> -->
	</div>


	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
	</div>
</body>

</html>