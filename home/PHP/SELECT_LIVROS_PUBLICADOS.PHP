<?php
/* SELECT PARA TRAZER TODOS OS LIVROS PUBLICADOS POR TODOS OS USUARIOS*/
include_once('../../config/conexao.php');

if(isset($_POST["search"])){
   $filtro = $_POST["search"];
}else{
   $filtro = "";
}

$sql = 'SELECT LV.CD_LIVRO AS CDLI, LV.foto1 AS FT1, LV.foto2 AS FT2, LV.foto3 AS FT3,LV.NM_LIVRO AS NMLV,LV.NM_GENERO AS genero, LV.DT_PUBLICACAO AS dta, CI.NM_CIDADE AS CITY, U.SG_UF AS UF,LV.DT_PUBLICACAO AS DT FROM DB_SCAMBIO.TB_LIVRO AS LV ';
$sql .= 'INNER JOIN DB_SCAMBIO.TB_USUARIO AS US ON ';
$sql .= 'US.CD_USUARIO = LV.CD_USUARIO ';
$sql .= 'INNER JOIN DB_SCAMBIO.TB_LOGRADOURO AS LO ON ';
$sql .= 'LO.CD_LOGRADOURO = US.CD_LOGRADOURO ';
$sql .= 'INNER JOIN DB_SCAMBIO.TB_BAIRRO AS BA ON ';
$sql .= 'BA.CD_BAIRRO = LO.CD_BAIRRO ';
$sql .= 'INNER JOIN DB_SCAMBIO.TB_CIDADE AS CI ON ';
$sql .= 'BA.CD_CIDADE = CI.CD_CIDADE ';

$sql .= 'INNER JOIN DB_SCAMBIO.TB_UF AS U ON ';
$sql .= 'U.CD_UF = CI.CD_UF WHERE LV.NM_LIVRO LIKE "%'. $filtro . '%"';
$SQLANUN = $pdo->prepare($sql);
$SQLANUN->execute();

if($SQLANUN->rowCount() > 0){
   while ($row = $SQLANUN->fetch(PDO::FETCH_ASSOC)) {
      $out = '<div class="card col-md-6" style="width: 13rem;">
				<img src="./img/a-divina-comédia-191x300.jpg" class="card-img-top" alt="...">
				<div class="card-body">
					<h5 class="card-name" style="margin-top: -11px;">' . $row['NMLV'] . '</h5>
					<p class="card-city" style="margin-top: -6px; font-size: 15px;">' . $row['CITY'] . "/" . $row['UF'] . '</p>
					<p class="card-gen" style="margin-top: -21px; font-size: 15px;">' . $row['genero'] . '</p>
					<p class="card-publi" style="margin-top: -9px; font-size: 12.5px; color: #858A8D;">' . date("d/m/Y", strtotime(($row["DT"]))) . '</p>
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
			</div>';
         echo $out;
   }
}
