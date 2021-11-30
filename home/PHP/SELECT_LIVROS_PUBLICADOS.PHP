<?php
/* SELECT PARA TRAZER TODOS OS LIVROS PUBLICADOS POR TODOS OS USUARIOS*/
include_once('../../config/conexao.php');

session_start();

$livro = $_POST['livro'] ?? "";
$autor = $_POST['autor'] ?? "";
$uf = $_POST['uf'] ?? "";


$sql = 'SELECT US.cd_usuario as USUARIOID,LV.STATUS_PUB AS STA, LV.CD_LIVRO AS CDLI, LV.foto1 AS FT1, LV.foto2 AS FT2, LV.foto3 AS FT3,LV.NM_LIVRO AS NMLV,LV.NM_GENERO AS genero, LV.DT_PUBLICACAO AS dt, CI.NM_CIDADE AS CITY, U.SG_UF AS UF,LV.DT_PUBLICACAO AS DT FROM DB_SCAMBIO.TB_LIVRO AS LV ';
$sql .= 'INNER JOIN DB_SCAMBIO.TB_USUARIO AS US ON ';
$sql .= 'US.CD_USUARIO = LV.CD_USUARIO ';
$sql .= 'INNER JOIN DB_SCAMBIO.TB_LOGRADOURO AS LO ON ';
$sql .= 'LO.CD_LOGRADOURO = US.CD_LOGRADOURO ';
$sql .= 'INNER JOIN DB_SCAMBIO.TB_BAIRRO AS BA ON ';
$sql .= 'BA.CD_BAIRRO = LO.CD_BAIRRO ';
$sql .= 'INNER JOIN DB_SCAMBIO.TB_CIDADE AS CI ON ';
$sql .= 'BA.CD_CIDADE = CI.CD_CIDADE ';
$sql .= 'INNER JOIN DB_SCAMBIO.TB_UF AS U ON ';
$sql .= 'U.CD_UF = CI.CD_UF WHERE LV.NM_LIVRO LIKE "%'. $livro .'%" AND LV.NM_AUTOR LIKE "%'. $autor .'%" AND U.SG_UF LIKE "%'. $uf .'%" ORDER BY LV.CD_LIVRO DESC';
$SQLANUN = $pdo->prepare($sql);
$SQLANUN->execute();

if ($SQLANUN->rowCount() > 0) {

	while ($row = $SQLANUN->fetch(PDO::FETCH_ASSOC)) {
		$idSession = $_SESSION['id'];
		$idEnviado = $row['USUARIOID'];
		$idPublicao = $row['CDLI'];

		$out = '<div class="card col-md-6" style="width: 13.3rem;">
				<img src="../fotos/' . $row['FT1'] . '" class="card-img-top" alt="...">
				<div class="card-body">
					<h5 class="card-name" style="margin-top: -11px;">' . $row['NMLV'] . '</h5>
					<p class="card-city" style="margin-top: -4px; font-size: 14px;">' . $row['CITY'] . "/" . $row['UF'] . '</p>
					<p class="card-gen" style="margin-top: -21px; font-size: 14px;">' . $row['genero'] . '</p>
					<p class="card-publi" style="margin-top: -15px; font-size: 12.5px; color: #858A8D;">' . date("d/m/Y", strtotime(($row["DT"]))) . '</p>
					<div class="btns"> ';
					if($row['USUARIOID'] != $idSession){
						$out .= '
							<a href="../Produto/produto.php?produto-id=' . $row['CDLI'] . '">   
								<button><i class="fa fa-ellipsis-h"></i></button>
							</a>
							<button onclick="inserindoMatch(' . $idSession . ',' . $idEnviado . ',' . $idPublicao  .')">
								<a href="../chat/users-all.php?user_id='.$row['USUARIOID'].'">   
									<i class="fas fa-envelope"></i>
								</a>
							</button>';
						}
						$out .= '</div>
							</div>
						</div>';
		echo $out;
	}
}
else{
	echo '<h2 style="display: flex; justify-content: center;align-items: center">Nenhum resultado encontrado<h2>';
}
