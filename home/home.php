<!DOCTYPE html>
<html lang="pt-br">

<?php
session_start();
include_once('../config/conexao.php');
?>

<head>
	<title>Scambio | Home</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style.css">
	<link rel="shortcut icon" href="../assets/imgs/logoFundo.png" />

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;500&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
	<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>

	<link href="../assets/css/style.css" rel="stylesheet">


	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	<style>
		html,
		body {
			max-width: 100%;
			overflow-x: hidden;
		}

		#inpkill {
			margin-right: 20px;
			margin-top: -25px;
		}

		.img-index {
			width: 100px;
			height: 32px;
			margin-top: 5px;
		}

		.form-filtro {
			display: flex;
			justify-content: center;
		}

		.opcao_filtro {
			width: 170px;
		}

		.row {
			display: flex;
			justify-content: center;
			max-width: 60%;
			margin: auto;
		}

		.row .card img {
			width: 73% !important;
			height: 12rem !important;
		}

		.card {
			display: flex;
			align-items: center;
			border-radius: 20px;
			margin-right: 25px;
			margin-bottom: 25px;
		}

		.card-body {
			margin-left: 30px;
			width: 190px;
			display: flex;
			flex-direction: column;
			align-items: flex-start;
		}

		.btns {
			width: 125px;
			display: flex;
			flex-direction: row;
			justify-content: space-between;
		}

		.btns button {
			border: none;
			border-radius: 5px;
			width: 50px;
		}

		.btns a {
			text-decoration: none;
			color: black;
		}
	</style>
</head>

<body>
	<div class="container-fluid">
		<a href="../index.php"><img class="img-index" src="../assets/imgs/LOGO_TRANSPARENTE.PNG" alt="logo Scambio" width="110" height="38" style="padding-top: 5px;"></a>
		</button>
		<?php
		if (isset($_SESSION['id'])) {
		?>
			<form action="../logout.php">
				<input id="inpkill" class="inpkill glyphicon buttonLogout" name="DestroySession" type="submit" value="Sair">
			</form>
		<?php
		} else {
		?>
			header("Location: index.php");
		<?php
		}
		?>
	</div>

	<?php
	$sql_info_anun = "SELECT US.NM_USUARIO as NM, ANUN.DS_IMG1 as img1, ANUN.DS_IMG2 as img2 ";
	$sql_info_anun .= "FROM db_scambio.TB_ANUNCIO AS ANUN INNER JOIN db_scambio.tb_usuario AS US ON ANUN.cd_usuario = us.cd_usuario";
	$SQLANUN = $pdo->prepare($sql_info_anun);
	$SQLANUN->execute();
	$result_select_anuncio = $SQLANUN->fetchAll(PDO::FETCH_OBJ);

	?>

	<div class="wrapper">

		<div class="form-filtro">
			<form method="post" action="filtro.php" style="display: flex; flex-direction: column; margin-bottom: 20px;">
				<div>
					<small style="font-size: 15px; font-weight: 560;">Filtrar por:</small>
					<select name="opcao_filtro" class="opcao_filtro">
						<option value="nome">Nome</option>
						<option value="cidade">Cidade</option>
						<option value="genero">Genêro</option>
						<option selected="selected" value="dataPublicacao">Data de publicação</option>
					</select>
				</div>
				<div style="margin-top: 5px;">
					<input type="text" name="valor_filtro" style="border: none; height: 30px;" placeholder="Nome do livro" />
					<input type="submit" name="Pesquisar" value="Pesquisar" style="border: none; height: 30px;" />
				</div>
			</form>
		</div>
	</div>

	<div class="row">
		<div class="card col-md-6" style="width: 13rem;">
			<img src="./img/a-divina-comédia-191x300.jpg" class="card-img-top" alt="...">
			<div class="card-body">
				<h5 class="card-name" style="margin-top: -11px;">A divina comédia</h5>
				<p class="card-city" style="margin-top: -6px; font-size: 15px;">São Vicente/SP</p>
				<p class="card-gen" style="margin-top: -21px; font-size: 15px;">Comédia</p>
				<p class="card-publi" style="margin-top: -9px; font-size: 12.5px; color: #858A8D;">28/10/2021</p>
				<div class="btns">
					<button>
						<a href="">
							<i class="fa fa-ellipsis-h"></i>
						</a>
					</button>
					<button>
						<a href="">
							<i class="fas fa-envelope"></i>
						</a>
					</button>
				</div>
			</div>
		</div>
		<div class="card col-md-6" style="width: 13rem;">
			<img src="./img/harrypotter1.png" class="card-img-top" alt="...">
			<div class="card-body">
				<h5 class="card-name" style="margin-top: -11px;">Harry potter</h5>
				<p class="card-city" style="margin-top: -6px; font-size: 15px;">Santos/SP</p>
				<p class="card-gen" style="margin-top: -21px; font-size: 15px;">Terror</p>
				<p class="card-publi" style="margin-top: -9px; font-size: 12.5px; color: #858A8D;">30/10/2021</p>
				<div class="btns">
					<button>
						<a href="">
							<i class="fa fa-ellipsis-h"></i>
						</a>
					</button>
					<button>
						<a href="">
							<i class="fas fa-envelope"></i>
						</a>
					</button>
				</div>
			</div>
		</div>
		<div class="card col-md-6" style="width: 13rem;">
			<img src="./img/a-república-194x300.jpg" class="card-img-top" alt="...">
			<div class="card-body">
				<h5 class="card-name" style="margin-top: -11px;">A republica</h5>
				<p class="card-city" style="margin-top: -6px; font-size: 15px;">São Paulo/SP</p>
				<p class="card-gen" style="margin-top: -21px; font-size: 15px;">Comédia</p>
				<p class="card-publi" style="margin-top: -9px; font-size: 12.5px; color: #858A8D;">20/10/2021</p>
				<div class="btns">
					<button>
						<a href="">
							<i class="fa fa-ellipsis-h"></i>
						</a>
					</button>
					<button>
						<a href="">
							<i class="fas fa-envelope"></i>
						</a>
					</button>
				</div>
			</div>
		</div>
		<div class="card col-md-6" style="width: 13rem;">
			<img src="./img/Romeu-e-Julieta-de-Shakespeare-181x300.jpg" class="card-img-top" alt="...">
			<div class="card-body">
				<h5 class="card-name" style="margin-top: -11px;">Romeu e Julieta</h5>
				<p class="card-city" style="margin-top: -6px; font-size: 15px;">São Vicente/SP</p>
				<p class="card-gen" style="margin-top: -21px; font-size: 15px;">Suspense</p>
				<p class="card-publi" style="margin-top: -9px; font-size: 12.5px; color: #858A8D;">30/25/2021</p>
				<div class="btns">
					<button>
						<a href="">
							<i class="fa fa-ellipsis-h"></i>
						</a>
					</button>
					<button>
						<a href="">
							<i class="fas fa-envelope"></i>
						</a>
					</button>
				</div>
			</div>
		</div>
		<div class="card col-md-6" style="width: 13rem;">
			<img src="./img/Riqueza-das-Nações-Adam-Smith-203x300.jpeg" class="card-img-top" alt="...">
			<div class="card-body">
				<h5 class="card-name" style="margin-top: -11px;">Riqueza das nações</h5>
				<p class="card-city" style="margin-top: -6px; font-size: 15px;">Santos/SP</p>
				<p class="card-gen" style="margin-top: -21px; font-size: 15px;">Terror</p>
				<p class="card-publi" style="margin-top: -9px; font-size: 12.5px; color: #858A8D;">31/10/2021</p>
				<div class="btns">
					<button>
						<a href="">
							<i class="fa fa-ellipsis-h"></i>
						</a>
					</button>
					<button>
						<a href="">
							<i class="fas fa-envelope"></i>
						</a>
					</button>
				</div>
			</div>
		</div>
		<div class="card col-md-6" style="width: 13rem;">
			<img src="./img/odisseia-210x300.jpg" class="card-img-top" alt="...">
			<div class="card-body">
				<h5 class="card-name" style="margin-top: -11px;">Odisséia</h5>
				<p class="card-city" style="margin-top: -6px; font-size: 15px;">São Paulo/SP</p>
				<p class="card-gen" style="margin-top: -21px; font-size: 15px;">Comédia</p>
				<p class="card-publi" style="margin-top: -9px; font-size: 12.5px; color: #858A8D;">31/10/2021</p>
				<div class="btns">
					<button>
						<a href="">
							<i class="fa fa-ellipsis-h"></i>
						</a>
					</button>
					<button>
						<a href="">
							<i class="fas fa-envelope"></i>
						</a>
					</button>
				</div>
			</div>
		</div>


	</div>

	<?php include('../menu/menu.php') ?>
</body>

</html>