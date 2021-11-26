<!-- UPDATE NAS INFORMAÇÕES DO ANUNCIO    OBS: AINDA PRECISA DE REAJUSTES -->
<?php
    if(isset($_POST['livro']) && !empty([$_POST['livro']]) && isset($_POST['describe']) && !empty([$_POST['describe']])
    && isset($_POST['genero']) && !empty([$_POST['genero']]) /* && isset($_POST['city']) && !empty([$_POST['city']])
    && isset($_POST['uf']) && !empty([$_POST['uf']]) && isset($_POST['autor']) && !empty([$_POST['autor']]) */
    && isset($_POST['cda']) && !empty([$_POST['cda']]))
    {
        $livro = $_POST['livro'];
        $genero = $_POST['genero'];
        $describe = $_POST['describe'];
        $codigo = $_POST['cda'];

        $edit = "UPDATE DB_SCAMBIO.TB_ANUNCIO AS ANUN ";
        $edit .= "INNER JOIN DB_SCAMBIO.TB_LIVRO AS LIV ON ";
        $edit .= "LIV.CD_LIVRO = ANUN.CD_LIVRO ";
        $edit .= "INNER JOIN DB_SCAMBIO.LIVRO_GENERO ON ";
        $edit .= "LIV.CD_LIVRO = DB_SCAMBIO.LIVRO_GENERO.CD_LIVRO ";
        $edit .= "INNER JOIN DB_SCAMBIO.TB_GENERO AS GE ON ";
        $edit .= "GE.CD_GENERO = DB_SCAMBIO.LIVRO_GENERO.CD_GENERO ";
        $edit .= 'SET ANUN.DS_ANUNCIO = "' . $describe . '", LIV.NM_LIVRO = "' .  $livro;
        $edit .= '", GE.NM_GENERO = "' . $genero;
        $edit .= '" WHERE ANUN.CD_ANUNCIO = ' . $codigo;
        $updateedit = $pdo->prepare($edit);
        $updateedit->execute();
    }
?>