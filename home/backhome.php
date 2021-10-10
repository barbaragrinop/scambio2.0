<?php
			include_once('../config/conexao.php');
			
			echo $_POST['search'];

			
			$filtro = $_POST["search"];
			
		

			
			$sql = "SELECT ANUN.CD_ANUNCIO as cda,ANUN.DS_ANUNCIO as ds,ANUN.DS_IMG1 as img1,ANUN.DS_IMG2 as img2,US.nm_usuario as user,LOC.NM_LOGRADOURO as loc,LOC.CD_CASA as casa,";
			$sql .= " BAIRRO.NM_BAIRRO as bairro,CITY.NM_CIDADE as cid,UF.SG_UF as u,LIV.NM_LIVRO as livro,LIV.DT_LANCAMENTO as lanc, AUT.NM_AUTOR AS AUTOR, GE.NM_GENERO AS genero FROM db_scambio.TB_ANUNCIO AS ANUN INNER JOIN db_scambio.tb_usuario AS US ON";
			$sql .= " ANUN.cd_usuario = US.cd_usuario INNER JOIN db_scambio.tb_logradouro AS LOC ON US.cd_logradouro = LOC.CD_LOGRADOURO INNER JOIN db_scambio.TB_BAIRRO AS BAIRRO ON";
			$sql .= " BAIRRO.cd_BAIRRO = LOC.cd_BAIRRO INNER JOIN db_scambio.TB_CIDADE AS CITY ON CITY.cd_CIDADE = BAIRRO.cd_CIDADE INNER JOIN db_scambio.TB_UF AS UF ON";
			$sql .= " UF.CD_UF = CITY.CD_UF INNER JOIN db_scambio.TB_LIVRO AS LIV ON LIV.CD_LIVRO = ANUN.CD_LIVRO INNER JOIN db_scambio.TB_AUTOR AS AUT ON AUT.CD_AUTOR = LIV.CD_AUTOR";
			$sql .= " INNER JOIN DB_SCAMBIO.livro_genero AS LIVG ON  LIVG.CD_LIVRO = LIV.CD_LIVRO INNER JOIN  DB_SCAMBIO.tb_genero AS GE ON  GE.cd_genero = LIVG.cd_genero WHERE NM_LIVRO LIKE '" . $filtro . "%'";

			$publicacao = $pdo->prepare($sql);
			$publicacao->execute();
			$result = $publicacao->fetchAll(PDO::FETCH_OBJ);
		

			/* CODE PARA TRANSFORMAR IMAGEM EM BASE64 
				$data = file_get_contents('C:\xampp\htdocs\scambio2.0\515vbT3t2UL.jpg');
				$data = base64_encode($data);
				$query2 = $pdo->prepare('UPDATE DB_SCAMBIO.TB_ANUNCIO SET DS_IMG1 = "'. $data .'" WHERE CD_ANUNCIO = 1');
				$query2->execute(); */
?>