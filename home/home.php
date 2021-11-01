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
			width: 200px;
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

	 if(isset($_POST["search"])){
		$filtro = $_POST["search"];
	}else{
		$filtro = "";
	}


	$sql = "SELECT ANUN.CD_ANUNCIO as cda,ANUN.DS_ANUNCIO as ds,ANUN.DS_IMG1 as img1,ANUN.DS_IMG2 as img2, ANUN.dt_anuncio as dta,US.nm_usuario as user,LOC.NM_LOGRADOURO as loc,LOC.CD_CASA as casa,";
	$sql .= " BAIRRO.NM_BAIRRO as bairro,CITY.NM_CIDADE as cid,UF.SG_UF as u,LIV.NM_LIVRO as livro,LIV.DT_LANCAMENTO as lanc, AUT.NM_AUTOR AS AUTOR, GE.NM_GENERO AS genero FROM db_scambio.TB_ANUNCIO AS ANUN INNER JOIN db_scambio.tb_usuario AS US ON";
	$sql .= " ANUN.cd_usuario = US.cd_usuario INNER JOIN db_scambio.tb_logradouro AS LOC ON US.cd_logradouro = LOC.CD_LOGRADOURO INNER JOIN db_scambio.TB_BAIRRO AS BAIRRO ON";
	$sql .= " BAIRRO.cd_BAIRRO = LOC.cd_BAIRRO INNER JOIN db_scambio.TB_CIDADE AS CITY ON CITY.cd_CIDADE = BAIRRO.cd_CIDADE INNER JOIN db_scambio.TB_UF AS UF ON";
	$sql .= " UF.CD_UF = CITY.CD_UF INNER JOIN db_scambio.TB_LIVRO AS LIV ON LIV.CD_LIVRO = ANUN.CD_LIVRO INNER JOIN db_scambio.TB_AUTOR AS AUT ON AUT.CD_AUTOR = LIV.CD_AUTOR";
	$sql .= " INNER JOIN DB_SCAMBIO.livro_genero AS LIVG ON  LIVG.CD_LIVRO = LIV.CD_LIVRO INNER JOIN  DB_SCAMBIO.tb_genero AS GE ON  GE.cd_genero = LIVG.cd_genero WHERE NM_LIVRO LIKE '" . $filtro . "%'";
	$SQLANUN = $pdo->prepare($sql);
	$SQLANUN->execute();
	$result_select_anuncio = $SQLANUN->fetchAll(PDO::FETCH_OBJ);

	?>

	<div class="wrapper">

		<div class="form-filtro">
			<form method="post"  style="display: flex; flex-direction: row; margin-bottom: 20px; margin-left: 17px;">
				<select name="opcao_filtro" class="opcao_filtro">
					<option value="nome">Nome</option>
					<option value="cidade">Cidade</option>
					<option value="genero">Genêro</option>
					<option selected="selected" value="dataPublicacao">Data de publicação</option>
				</select>
				<div style="margin-top: 1px;">
					<input type="text" name="search" style="border: none; height: 45px; border-radius: 5px; margin-left: 10px; padding-left: 10px; width: 270px;" placeholder="Nome do livro" />
					<input type="submit" name="Pesquisar" value="Pesquisar" style="border: none; height: 45px; border-radius: 5px;" />
				</div>
			</form>
		</div>
	</div>

	<div class="row">
		<?php 
			foreach ($result_select_anuncio as $key => $row) {
		?>
				<div class="card col-md-6" style="width: 13rem;">
					<img src="./img/a-divina-comédia-191x300.jpg" class="card-img-top" alt="...">
					<div class="card-body">
						<h5 class="card-name" style="margin-top: -11px;"><?php echo $row->livro ?></h5>
						<p class="card-city" style="margin-top: -6px; font-size: 15px;"><?php echo $row->cid . "/" . $row->u ?></p>
						<p class="card-gen" style="margin-top: -21px; font-size: 15px;"><?php echo $row->genero ?></p>
						<p class="card-publi" style="margin-top: -9px; font-size: 12.5px; color: #858A8D;"><?php echo $row->dta ?></p>
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
			<?php 
			}
		?>
	</div>

	<?php include('../menu/menu.php') ?>
</body>

</html>