<!DOCTYPE html>
<html lang="pt-br">

<?php
session_start();
include_once('../config/conexao.php');

if (isset($_SESSION['id'])) {

	$id = $_SESSION['id'];

	$sql = $pdo->prepare("SELECT * from db_scambio.tb_usuario
                        inner join db_scambio.tb_logradouro
                        on tb_usuario.cd_logradouro = tb_logradouro.cd_logradouro
                        inner join db_scambio.tb_bairro 
                        on tb_bairro.cd_bairro = tb_logradouro.cd_bairro
                        inner join db_scambio.tb_cidade
                        on tb_cidade.cd_cidade = tb_bairro.cd_cidade
                        inner join db_scambio.tb_uf
                        on tb_uf.cd_uf = tb_cidade.cd_uf
                        where cd_usuario = :id");
	$sql->execute(array(':id' => $id));
	if ($sql->rowCount() >= 1) {
		$userinfo = $sql->fetch((PDO::FETCH_ASSOC));
	}
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

		<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> -->

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
				margin-top: 10px;
			}

			a {
				color: black;
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
				width: 84% !important;
				height: 12.9rem !important;
				margin-top: 20px !important;

			}

			.h5,
			h5 {
				font-size: 1.15rem !important;
			}

			.card {
				display: flex;
				align-items: center;
				border-radius: 20px;
				margin-right: 15px;
				margin-bottom: 25px;
			}

			.card-body {
				margin-left: 20px;
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

			.modal-content a {
				text-decoration: none;
			}

			.modal-header h2,
			.modal-footer h3 {
				margin: 0;
			}

			.modal-header {
				height: 60px;
				margin-top: -60px;
				background: inherit;
				padding: 15px;
				color: rgb(32, 28, 29);
				border-top-left-radius: 5px;
				border-top-right-radius: 5px;
			}

			.modal-header h5 {
				font-size: 18px;
			}

			.modal-body h6 {
				font-size: 14.5px;
			}

			.modal-body hr {
				border-top: 1px solid #ccc;
			}

			.modal-body {
				/* margin-bottom: 60px; */
				padding: 10px 20px;
				background: #fff;
				display: flex;
				flex-direction: column;
			}

			.modal-footer {
				background: inherit;
				padding: 10px;
				color: #fff;
				text-align: center;
				border-bottom-left-radius: 5px;
				border-bottom-right-radius: 5px;
			}

			.modal-footer button {
				font-size: 14px;
				line-height: 1.42875;
				border: 1px solid transparent;
				font-weight: 400;
				background-color: #eee;
				color: black;
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

			.modal {
				cursor: context-menu;
			}

			.modal-content {
				width: 500px;
			}

			.modal-backdrop.show {
				opacity: 0;
			}

			.modal-backdrop {
				position: inherit;
			}

			@keyframes modalopen {
				from {
					opacity: 0;
				}

				to {
					opacity: 1;
				}
			}

			@media (max-height: 1200px) {
				.modal-content {
					margin-top: 300px !important;
				}
			}

			@media (max-height: 1100px) {
				.modal-content {
					margin-top: 286px !important;
				}
			}

			@media (max-height: 1000px) {
				.modal-content {
					margin-top: 250px !important;
				}
			}

			@media (max-height: 900px) {
				.modal-content {
					margin-top: 210px !important;
				}
			}

			@media (max-height: 800px) {
				.modal-content {
					margin-top: 150px !important;
				}
			}

			@media (max-height: 750px) {
				.modal-content {
					margin-top: 140px !important;
				}
			}

			@media (max-height: 700px) {
				.modal-content {
					margin-top: 100px !important;
				}
			}

			@media (min-width: 1700px) {
				.inpAutor {
					/* width: 100% !important; */
				}

				.selectGenero {
					width: 500px !important;
				}
			}

			@media (max-width: 1325px) {
				.inpAutor {
					/* width: 100% !important; */
				}

				.selectGenero {
					width: 360px !important;
				}
			}

			@media (min-width: 1443px) {
				.inpAutor {
					width: 100% !important;
				}

				.selectGenero {
					width: 460px;
				}
			}
		</style>
	</head>

	<body>
		<div class="container-fluid">
			<div style="display: flex; flex-direction: row; justify-content: space-around;">
				<div style="display: flex; flex-direction: row;">
					<img src="data:image;base64,<?= $userinfo["DS_IMGP"]; ?> alt="" width=" 40" height="40" style="border-radius: 30px; border: 3px solid #3CD10C; margin-top: 8px;">
					<p style="font-size: 16px; font-weight: 600; margin-top: 17px; margin-left: 7px;"><?= $userinfo['nm_usuario'] ?></p>
				</div>
				<a href="../index.php"><img class="img-index" src="../assets/imgs/LOGO_TRANSPARENTE.PNG" alt="logo Scambio" width="110" height="38" style="padding-top: 5px;"></a>
				</button>
				<?php
				if (isset($_SESSION['id'])) {
				?>
					<form action="../logout.php" style="margin-top: 32px;">
						<input id="inpkill" class="inpkill glyphicon buttonLogout" name="DestroySession" type="submit" value="Sair">
					</form>
				<?php
				} else {
					header("Location: index.php");
				}
				?>
			</div>
		</div>
		<div class="wrapper">
			<div class="form-filtro">
				<form class="filtro" style="display: flex; flex-direction: row; margin-bottom: 20px; margin-left: 35px;">
					<select name="opcao_filtro" class="opcao_filtro">
						<option value="nome">Nome</option>
						<option value="cidade">Cidade</option>
						<option value="genero">Genêro</option>
						<option selected="selected" value="dataPublicacao">Data de publicação</option>
					</select>
					<div style="margin-top: 1px;">
						<input type="text" id="search" name="search" style="border: none; height: 45px; border-radius: 5px; margin-left: 10px; padding-left: 10px; width: 270px;" placeholder="Nome do livro" />
						<input type="submit" name="Pesquisar" value="Pesquisar" style="border: none; height: 45px; border-radius: 5px;" />
					</div>
				</form>
			</div>
		</div>

		<div class="return row" style="margin-top: -38px;">

		</div>
		<div class="box-modal">

			<div id="my-modal" class="modal">
				<div class="modal-content" style="margin-top: 100px; width: 60%;">
					<form id="frmRecuperaCodigo">
						<div class="modal-header" style="background: var(--modal-color);">
							<h5>Publicar um livro</h5>
							<span class="close">&times;</span>
						</div>
						<div class="modal-body" style="margin-bottom: 60px;">
							<label style="font-size: 16px;">Nome: </label> <input type="text" name="nome" id="nomeDigitado">
							<label style="color: black !important; font-size: 16px;">Descrição: </label> <textarea id="descricaoDigitado" name="descricao" style="width: 100%; max-height: 200px;"></textarea>
							<div style="display: flex; flex-direction: row;">
								<div>
									<label style="font-size: 16px;" for="genero">Gênero:</label>
									<select class="selectGenero" style="font-size: 14.5px;" id="genero" name="genero">
										<option value="--" disabled selected>Selecione um gênero</option>
										<option value="Auto Ajuda">Auto Ajuda</option>
										<option value="Biografia">Biografia</option>
										<option value="Carta">Carta</option>
										<option value="Chick-Lit">Chick-Lit</option>
										<option value="Conto">Conto</option>
										<option value="Ciências Biológicas e Naturais">Ciências Biológicas e Naturais</option>
										<option value="Ciências Humanas e Linguagens">Ciências Humanas e Linguagens</option>
										<option value="Crônica">Crônica</option>
										<option value="Drama">Drama</option>
										<option value="Ensaio">Ensaio</option>
										<option value="Educação">Educação</option>
										<option value="Estudo">Estudo</option>
										<option value="Farmacologia">Farmacologia</option>
										<option value="Ficção">Ficção</option>
										<option value="História em Quadrinhos (HQ)">História em Quadrinhos (HQ)</option>
										<option value="Lad-Lit">Lad-Lit</option>
										<option value="Literatura Fantástica">Literatura Fantástica</option>
										<option value="Literatura Infantil">Literatura Infantil</option>
										<option value="Literatura Infanto-juvenil">Literatura Infanto-juvenil</option>
										<option value="Literatura Nacional">Literatura Nacional</option>
										<option value="Memórias">Memórias</option>
										<option value="New Adult">New Adult</option>
										<option value="Novela">Novela</option>
										<option value="Poesia">Poesia</option>
										<option value="Química">Química</option>
										<option value="Realismo Mágico ">Realismo Mágico</option>
										<option value="Resenha">Resenha</option>
										<option value="Romance">Romance</option>
										<option value="Sick-Lit">Sick-Lit</option>
										<option value="Terror">Terror</option>
									</select>
								</div>
								<div style="width: 100%; margin-left: 30px;">
									<label style="font-size: 16px;">Autor: </label>
									<input id="autorDigitado" class="inpAutor" style="height: 45px; width: 100%;" type="text" name="autor">
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
						<div class="modal-footer" style="background: inherit;">
							<a href="" onclick="btnModal()">
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
					<span class="fab-labelll"><a style="text-decoration: none; color: white;">Fórum</a></span>
					<div class="fab-icon-holderrr">
						<a href="http://localhost/scambio2.0/forum/forum.php" id="perfil" style="text-decoration: none;"><i class="far fa-newspaper"></i></a>
					</div>
				</li>
				<li>
					<span class="fab-labelll"><a style="text-decoration: none; color: white;">Ajuda</a></span>
					<div class="fab-icon-holderrr">
						<a id="ajuda" style="text-decoration: none;" onclick="redirectAjuda()"><i class="fas fa-question"></i></a>
					</div>
				</li>
				<li>
					<span class="fab-labelll"><a style="text-decoration: none; color: white;">Notificações</a></span>
					<div class="fab-icon-holderrr">
						<!-- <span>1</span> -->
						<a id="notificacoes" data-toggle="modal" data-target="#ExemploModalCentralizado" style="text-decoration: none;"><i class="fas fa-bell"></i></a>
					</div>
				</li>
			</ul>

			<div class="modal fade" id="ExemploModalCentralizado" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header" style="margin-top: 0;">
							<h5 class="modal-title" id="TituloModalCentralizado">Últimas Notificações</h5>
						</div>


						<div class="modal-body">
							<a href="#">
								<h6>Yago comentou na sua postagem do fórum.</h6>
							</a>
							<hr>
							<a href="#">
								<h6>Você recebeu uma mensagem de Josefa.</h6>
							</a>
							<hr>
							<a href="#">
								<h6>Você publicou o livro Cinquenta...</h6>
							</a>
						</div>


						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
							<!-- <button type="button" class="btn btn-primary">Salvar mudanças</button> -->
						</div>
					</div>
				</div>
			</div>

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
					window.location.replace('../perfil/perfil2.php');
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

			function btnModal() {
				let nome = document.getElementById('nomeDigitado').value.trim();
				let descricao = document.getElementById('descricaoDigitado').value.trim();
				let genero = document.getElementById('genero').value;
				let autor = document.getElementById('autorDigitado').value.trim();
				let foto1 = document.getElementById('file1').value;
				let foto2 = document.getElementById('file2').value;
				let foto3 = document.getElementById('file3').value;

				if ((nome == '' && descricao == '' && autor == '') && (foto1 == '' || foto2 == '' || foto3 == '')) {
					event.preventDefault();
					alert('Preencha com todas as informações')
				}
			}
		</script>
		<script src="../assets/js/cadastroPublicacao.js"></script>
		<script src="../assets/js/ajaxhome.js"></script>

		<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	</body>

</html>
<?php
} else {
	header('Location:../login/login.php');
}
?>