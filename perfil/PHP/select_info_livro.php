<?php
  // QUERY PARA PUXAR LIVROS POSTADOS PELO USUARIO
  $sql = "SELECT ANUN.CD_ANUNCIO as cda,ANUN.DS_ANUNCIO as ds,ANUN.DS_IMG1 as img1,ANUN.DS_IMG2 as img2,US.nm_usuario as user,LOC.NM_LOGRADOURO as loc,LOC.CD_CASA as casa,";
  $sql .= " BAIRRO.NM_BAIRRO as bairro,CITY.NM_CIDADE as cid,UF.SG_UF as u,LIV.NM_LIVRO as livro,LIV.DT_LANCAMENTO as lanc,NMGENERO.nm_genero as NMGE, AUT.NM_AUTOR AS AUTOR FROM db_scambio.TB_ANUNCIO AS ANUN INNER JOIN db_scambio.tb_usuario AS US ON";
  $sql .= " ANUN.cd_usuario = US.cd_usuario INNER JOIN db_scambio.tb_logradouro AS LOC ON US.cd_logradouro = LOC.CD_LOGRADOURO INNER JOIN db_scambio.TB_BAIRRO AS BAIRRO ON";
  $sql .= " BAIRRO.cd_BAIRRO = LOC.cd_BAIRRO INNER JOIN db_scambio.TB_CIDADE AS CITY ON CITY.cd_CIDADE = BAIRRO.cd_CIDADE INNER JOIN db_scambio.TB_UF AS UF ON";
  $sql .= " UF.CD_UF = CITY.CD_UF INNER JOIN db_scambio.TB_LIVRO AS LIV ON LIV.CD_LIVRO = ANUN.CD_LIVRO INNER JOIN db_scambio.TB_AUTOR AS AUT ON AUT.CD_AUTOR = LIV.CD_AUTOR";
  $sql .= " INNER JOIN db_scambio.LIVRO_GENERO AS LIGE ON LIGE.CD_LIVRO = LIV.CD_LIVRO INNER JOIN db_scambio.TB_GENERO AS NMGENERO ON NMGENERO.CD_GENERO = LIGE.CD_GENERO  WHERE US.CD_USUARIO = " . $_SESSION["id"];
  $livrouser = $pdo->prepare($sql);
  $livrouser->execute();
  $select_info_livro = $livrouser->fetchAll(PDO::FETCH_OBJ);


  /* SELECT PARA CONTAR NUMERO DE LIVRO PUBLICADOS PELO USUARIO */
  $sql2 = "SELECT COUNT(*) as total, LIV.NM_LIVRO AS NML, ANUN.CD_ANUNCIO AS CDANUN  FROM DB_SCAMBIO.TB_lIVRO AS LIV";
  $sql2 .= " INNER JOIN DB_SCAMBIO.TB_ANUNCIO AS ANUN ON ANUN.CD_LIVRO = LIV.CD_LIVRO";
  $sql2 .= " INNER JOIN DB_SCAMBIO.TB_USUARIO AS US ON US.CD_USUARIO = ANUN.CD_USUARIO WHERE US.CD_USUARIO = " . $_SESSION['id'];
  $countpublic = $pdo->prepare($sql2);
  $countpublic->execute();
  $select_count_liv_publicados = $countpublic->fetch(PDO::FETCH_ASSOC);

?>