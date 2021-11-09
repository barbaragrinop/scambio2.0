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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>

	<link href="../assets/css/style.css" rel="stylesheet">


	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<link rel="stylesheet" href="../fab/fab.css">


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
			margin-top: 40px;
			margin-bottom: 60px;
		}

		.opcao_filtro {
			width: 200px;
			border-radius: 10px;
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
			margin-top: 20px !important;

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

		:root {
			--modal-duration: 1s;
			--modal-color: #D9C8B0;
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

		.button {
			background: #b160a6;
			padding: 1em 2em;
			color: #fff;
			border: 0;
			border-radius: 5px;
			cursor: pointer;
		}

		.button:hover {
			background: #3876ac;
		}

		.modal {
			display: none;
			position: fixed;
			z-index: 1;
			left: 0;
			top: 0;
			height: 100%;
			width: 100%;
			overflow: auto;
			background-color: rgba(0, 0, 0, 0.5);
		}

		.modal-content {
			margin: 10% auto;
			width: 60%;
			box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 7px 20px 0 rgba(0, 0, 0, 0.17);
			animation-name: modalopen;
			animation-duration: var(--modal-duration);
			border-radius: 20px;
		}

		.modal-header h2,
		.modal-footer h3 {
			margin: 0;
		}

		.modal-header {
			height: 60px;
			margin-top: -60px;
			background: var(--modal-color);
			padding: 15px;
			color: rgb(32, 28, 29);
			border-top-left-radius: 20px;
			border-top-right-radius: 20px;
		}

		.modal-body {
			margin-bottom: 60px;
			padding: 10px 20px;
			background: #fff;
			display: flex;
			flex-direction: column;
		}

		.modal-footer {
			background: var(--modal-color);
			padding: 10px;
			color: #fff;
			text-align: center;
			border-bottom-left-radius: 20px;
			border-bottom-right-radius: 20px;
		}

		.close {
			color: #ccc;
			float: right;
			font-size: 30px;
			color: #fff;
		}

		.close:hover,
		.close:focus {
			color: #000;
			text-decoration: none;
			cursor: pointer;
		}

		@keyframes modalopen {
			from {
				opacity: 0;
			}

			to {
				opacity: 1;
			}
		}


		@media (min-width: 1700) {
			.inpAutor {
				/* width: 100% !important; */
			}

			.selectGenero {
				width: 650px !important;
			}
		}
		@media (max-width: 1325px) {
			.inpAutor {
				/* width: 100% !important; */
			}

			.selectGenero {
				width: 350px !important;
			}
		}

		@media (min-width: 1443px) {
			.inpAutor {
				width: 100% !important;
			}

			select {
				width: 460px;
			}
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
			header("Location: index.php");
		}
		?>
	</div>

	<?php
	/* SELECT PARA TRAZER TODOS OS LIVROS PUBLICADOS */
	include('PHP/SELECT_LIVROS_PUBLICADOS.PHP');
	?>

	<div class="wrapper">

		<div class="form-filtro">
			<form method="post" action="filtro.php" style="display: flex; flex-direction: row; margin-bottom: 20px; margin-left: 35px;">
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
	</div>
	</div>
	<div class="box-modal">

		<div id="my-modal" class="modal">
			<div class="modal-content" style="margin-top: 100px;">
				<form id="frmRecuperaCodigo">
					<div class="modal-header">
						<h5>Publicar um livro</h5>
						<span class="close">&times;</span>
					</div>
					<div class="modal-body">
						<label style="font-size: 16px;">Nome: </label> <input type="text" name="nome" > 
						<label style="color: black !important; font-size: 16px;">Descrição: </label> <textarea name="descricao" style="width: 100%; max-height: 200px;"> </textarea>
						<div style="display: flex; flex-direction: row;">
							<div>
								<label style="font-size: 16px;" for="genero">Gênero:</label>
								<select class="selectGenero" style="font-size: 14.5px;" id="genero" name="genero">
									<option value="Biografia">Biografia</option>
									<option value="Carta">Carta</option>
									<option value="Chick-Lit">Chick-Lit</option>
									<option value="Conto">Conto</option>
									<option value="Crônica">Crônica</option>
									<option value="Drama">Drama</option>
									<option value="Ensaio">Ensaio</option>
									<option value="Ficção">Ficção</option>
									<option value="História em Quadrinhos (HQ)">História em Quadrinhos (HQ)</option>
									<option value="ladlit">Lad-Lit</option>
									<option value="Literatura Fantástica">Literatura Fantástica</option>
									<option value="Literatura Infantil">Literatura Infantil</option>
									<option value="Literatura Infanto-juvenil">Literatura Infanto-juvenil</option>
									<option value="Literatura Nacional">Literatura Nacional</option>
									<option value="Memórias">Memórias</option>
									<option value="New Adult">New Adult</option>
									<option value="Novela">Novela</option>
									<option value="Poesia">Poesia</option>
									<option value="Realismo Mágico ">Realismo Mágico</option>
									<option value="Romance">Romance</option>
									<option value="Sick-Lit">Sick-Lit</option>
									<option value="Terror">Terror</option>
								</select>
							</div>
							<div style="width: 100%; margin-left: 30px;">
								<label style="font-size: 16px;">Autor: </label>
								<input class="inpAutor" style="height: 45px; width: 100%;" type="text" name="autor">
							</div>
						</div>


						<label>Fotos: <span style="font-size: 12px;">(Máx 3 imagens)</span> </label>
						<label style="background: white; color: white; font-family: sans-serif; font-weight: bold; border-radius: 8px; border: 0; cursor: pointer; display: flex; flex-direction: column; justify-content: start; margin-top: -10px;">
							<div style="margin-left: 5px;">
								<span style="color: black; font-weight: 300; font-size: 14.5px;">Imagem 1</span> <input style="color: black; font-size: 13px;" type="file" name="file1" id="file1">
							</div>
							<div style="margin-left: 5px;">
								<span style="color: black; font-weight: 300; font-size: 14.5px;">Imagem 2</span> <input style="color: black; font-size: 13px;" type="file" name="file2" id="file2">
							</div>
							<div style="margin-left: 5px;">
								<span style="color: black; font-weight: 300; font-size: 14.5px;">Imagem 3</span> <input style="color: black; font-size: 13px;" type="file" name="file3" id="file3">
							</div>
						</label>
					</div>
					<div class="modal-footer">
						<a href="">
							<input type="submit" id="btnCadastrar" value="Publicar" style="border: none; border-radius: 10px; background-color: #AC7E55; WIDTH: 90PX; COLOR: WHITE;height: 30px">
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div class="fab-containerrr">
		<div class="fabbb fab-icon-holderrr">
			<i class="fas fa-bars"></i>
		</div>

		<ul class="fab-optionsss">
			<li>
				<span class="fab-labelll"><a style="text-decoration: none; color: white;">Home</a></span>
				<div class="fab-icon-holderrr">
					<a id="home" style="text-decoration: none;" onclick="redirectHome()"><i class="fas fa-file-alt"></i></a>
				</div>
			</li>
			<li>
				<span class="fab-labelll">
					<a id="modal-btn" style="text-decoration: none; color: white;">Publicar Livro</a>
				</span>
				<span class="fab-icon-holderrr">
					<a id="modal-btn2" style="text-decoration: none;">
						<i class="fas fa-book"></i>
					</a>
				</span>
				<!-- <div class="fab-icon-holderrr"> -->
				<!-- </div> -->

			</li>
			<li>
				<span class="fab-labelll"><a style="text-decoration: none; color: white;">Mensagens</a></span>
				<div class="fab-icon-holderrr">
					<a id="chat" style="text-decoration: none;" onclick="redirectChat()"><i class="fas fa-comments"></i></a>
				</div>
			</li>
			<li>
				<span class="fab-labelll"><a style="text-decoration: none; color: white;">Meu Perfil</a></span>
				<div class="fab-icon-holderrr">
					<a id="perfil" style="text-decoration: none;" onclick="redirectPerfil()"><i class="fas fa-user"></i></a>
				</div>
			</li>
			<li>
				<span class="fab-labelll"><a style="text-decoration: none; color: white;">Ajuda</a></span>
				<div class="fab-icon-holderrr">
					<a id="ajuda" style="text-decoration: none;" onclick="redirectAjuda()"><i class="fas fa-question"></i></a>
				</div>
			</li>
		</ul>

		<script>
			function redirectHome() {
				window.location.replace('../home/home.php');
			}

			function redirectPublicacao() {
				window.location.replace('../home/home.php');
			}

			function redirectChat() {
				window.location.replace('../chat/users-all.php');
			}

			function redirectPerfil() {
				window.location.replace('../perfil2.php');
			}

			function redirectAjuda() {
				window.location.replace('../index.php#ajuda');
			}
		</script>
	</div>

	<script>
		// Get DOM Elements
		const modal = document.querySelector('#my-modal');
		const modalBtn = document.querySelector('#modal-btn');
		const modalBtn2 = document.querySelector('#modal-btn2');
		const closeBtn = document.querySelector('.close');

		// Events
		modalBtn.addEventListener('click', openModal);
		modalBtn2.addEventListener('click', openModal);
		closeBtn.addEventListener('click', closeModal);
		window.addEventListener('click', outsideClick);

		// Open
		function openModal() {
			modal.style.display = 'block';
		}

		// Close
		function closeModal() {
			modal.style.display = 'none';
		}

		// Close If Outside Click
		function outsideClick(e) {
			if (e.target == modal) {
				modal.style.display = 'none';
			}
		}
	</script>
	<script src="../assets/js/cadastroPublicacao.js"></script>
</body>

</html>