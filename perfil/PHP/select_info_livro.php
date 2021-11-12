<?php
  // QUERY PARA PUXAR LIVROS POSTADOS PELO USUARIO
  $sql = 'SELECT LV.CD_LIVRO AS CDLI,  LV.NM_LIVRO AS NMLV, CI.NM_CIDADE AS CITY, U.SG_UF AS UF FROM DB_SCAMBIO.TB_LIVRO AS LV ';
  $sql .= 'INNER JOIN DB_SCAMBIO.TB_USUARIO AS US ON ';
  $sql .= 'US.CD_USUARIO = LV.CD_USUARIO ';
  $sql .= 'INNER JOIN DB_SCAMBIO.TB_CIDADE AS CI ON ';
  $sql .= 'US.CD_CIDADE = CI.CD_CIDADE ';
  $sql .= 'INNER JOIN DB_SCAMBIO.TB_UF AS U ON ';
  $sql .= 'U.CD_UF = CI.CD_UF WHERE US.CD_USUARIO = ' . $_SESSION['id'];
  $livrouser = $pdo->prepare($sql);
  $livrouser->execute();
  $select_info_livro = $livrouser->fetchAll(PDO::FETCH_OBJ);


  /* SELECT PARA CONTAR NUMERO DE LIVRO PUBLICADOS PELO USUARIO */
  $sql2 = "SELECT COUNT(*) as total, LIV.NM_LIVRO AS NML FROM DB_SCAMBIO.TB_lIVRO AS LIV";
  $sql2 .= " INNER JOIN DB_SCAMBIO.TB_USUARIO AS US ON US.CD_USUARIO = LIV.CD_USUARIO WHERE US.CD_USUARIO = " . $_SESSION['id'];
  $countpublic = $pdo->prepare($sql2);
  $countpublic->execute();
  $select_count_liv_publicados = $countpublic->fetch(PDO::FETCH_ASSOC);

?>