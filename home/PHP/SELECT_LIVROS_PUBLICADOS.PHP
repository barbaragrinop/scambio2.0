<?php

/* SELECT PARA TRAZER TODOS OS LIVROS PUBLICADOS POR TODOS OS USUARIOS*/

if(isset($_POST["search"])){
   $filtro = $_POST["search"];
}else{
   $filtro = "";
}


$sql = 'SELECT LV.CD_LIVRO AS CDLI, LV.foto1 AS FT1, LV.foto2 AS FT2, LV.foto3 AS FT3,LV.NM_LIVRO AS NMLV,LV.NM_GENERO AS genero, LV.DT_PUBLICACAO AS dta, CI.NM_CIDADE AS CITY, U.SG_UF AS UF FROM DB_SCAMBIO.TB_LIVRO AS LV ';
$sql .= 'INNER JOIN DB_SCAMBIO.TB_USUARIO AS US ON ';
$sql .= 'US.CD_USUARIO = LV.CD_USUARIO ';
$sql .= 'INNER JOIN DB_SCAMBIO.TB_CIDADE AS CI ON ';
$sql .= 'US.CD_CIDADE = CI.CD_CIDADE ';
$sql .= 'INNER JOIN DB_SCAMBIO.TB_UF AS U ON ';
$sql .= 'U.CD_UF = CI.CD_UF;';
$SQLANUN = $pdo->prepare($sql);
$SQLANUN->execute();
$result_select_anuncio = $SQLANUN->fetchAll(PDO::FETCH_OBJ);

?>