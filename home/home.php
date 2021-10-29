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


	<style>
		#inpkill {
			margin-right: 20px;
			margin-top: -25px;
		}

		.img-index {
			width: 100px;
			height: 32px;
			margin-top: 5px;
		}

		.wrapper .row .card {
			border-radius: 10px;
			box-shadow: 4px 5px 10px rgba(0, 0, 0, 0.15);
			width: 15%;
		}

		.row .card .possivel-chamada button {
			margin-top: 10px;
			width: 180px;
			height: 30px;
			border-radius: 100px;
		}

		.possivel-chamada button {
			border: none;
		}

		.form-filtro {
			display: flex;
			justify-content: center;
		}

		.opcao_filtro {
			width: 170px;
		}
	</style>
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
</head>

<body>
	<div class="container-fluid">
		<a href="../index.php"><img class="img-index" src="../assets/imgs/LOGO_TRANSPARENTE.PNG" alt="logo Scambio" width="110" height="38" style="padding-top: 5px;"></a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
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
					<small style="font-size: 15px;">Filtrar por:</small>
					<select name="opcao_filtro" class="opcao_filtro">
						<option value="idade">Nome</option>
						<option value="cidade">Cidade</option>
						<option value="formacao">Data de publicação</option>
					</select>
				</div>
				<div>
					<input type="text" name="valor_filtro" />
					<input type="submit" name="Pesquisar" />
				</div>
			</form>
		</div>

		<div class="row">
			<?php
			//FOREACH DO SELECT ANUNCIO
			foreach ($result_select_anuncio as $key => $row) {
			?>
				<div class="card col-3">
					<div class="card-body">
						<img class="img-fluid" id="img-book" src="img/harrypotter1.png" alt="">
						<div class="detalhes">
							<img id="img-profile" src="https://upload.wikimedia.org/wikipedia/commons/1/1c/Demi_Lovato_Interview_Feb_2020.png" alt="" class="img-fluid">
							<p style="width: 130px;"><?php echo $row->NM ?></p>
						</div>
						<div class="possivel-chamada">
							<button>
								<a href="" style="color: black;">
									<i class="	fa fa-ellipsis-h"></i>
								</a>
							</button>
							<button>
								<a href="" style="color: black;">
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
		<br>
		<br>
		<div class="wrapper">
			<div class="row">
				<?php
				//FOREACH DO SELECT ANUNCIO
				foreach ($result_select_anuncio as $key => $row) {
				?>
					<div class="card col-3">
						<div class="card-body">
							<img class="img-fluid" id="img-book" src="img/harrypotter1.png" alt="">
							<div class="detalhes">
								<img id="img-profile" src="https://upload.wikimedia.org/wikipedia/commons/1/1c/Demi_Lovato_Interview_Feb_2020.png" alt="" class="img-fluid">
								<p class="name-a-book"><?php echo $row->NM ?></p>
							</div>
							<div class="possivel-chamada">
								<button>
									<i class="	fa fa-ellipsis-h"></i>
								</button>
								<button>
									<i class="fas fa-envelope"></i>
								</button>
							</div>
						</div>
					</div>
				<?php
				}
				?>
			</div>
		</div>


		<!--
https://saranyamk.github.io/images-repo/book-top.svg
https://saranyamk.github.io/images-repo/book-side.svg
-->

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
		<?php include('../menu/menu.php') ?>
</body>

</html>