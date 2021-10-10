<?php
    // ALL QUERY
    $data = file_get_contents('C:\xampp\htdocs\scambio2.0\babi.jpg');
    $data = base64_encode($data);
    $query2 = $pdo->prepare('UPDATE DB_SCAMBIO.TB_USUARIO SET DS_IMGP = "'. $data .'" WHERE CD_usuario = ' . $_SESSION['id']);
    $query2->execute();

    // QUERY PARA PUXAR INFORMAÇÃO DO USUPARIO
    $usuario = $pdo->prepare("SELECT * FROM DB_SCAMBIO.TB_USUARIO WHERE CD_USUARIO =  " . $_SESSION['id']);
    $usuario->execute();
    $result = $usuario->fetch();

    // QUERY PARA PUXAR LIVROS POSTADOS PELO USUARIO
    $sql = "SELECT LIV.NM_LIVRO AS NML, ANUN.CD_ANUNCIO AS CDANUN  FROM DB_SCAMBIO.TB_lIVRO AS LIV";
    $sql .= " INNER JOIN DB_SCAMBIO.TB_ANUNCIO AS ANUN ON ANUN.CD_LIVRO = LIV.CD_LIVRO";
    $sql .= " INNER JOIN DB_SCAMBIO.TB_USUARIO AS US ON US.CD_USUARIO = ANUN.CD_USUARIO WHERE US.CD_USUARIO = " . $_SESSION['id'];
    $livrouser = $pdo->prepare($sql);
    $livrouser->execute();
    $result2 = $livrouser->fetchAll(PDO::FETCH_OBJ);

    $sql2 = "SELECT COUNT(*) as total, LIV.NM_LIVRO AS NML, ANUN.CD_ANUNCIO AS CDANUN  FROM DB_SCAMBIO.TB_lIVRO AS LIV";
    $sql2 .= " INNER JOIN DB_SCAMBIO.TB_ANUNCIO AS ANUN ON ANUN.CD_LIVRO = LIV.CD_LIVRO";
    $sql2 .= " INNER JOIN DB_SCAMBIO.TB_USUARIO AS US ON US.CD_USUARIO = ANUN.CD_USUARIO WHERE US.CD_USUARIO = " . $_SESSION['id'];
    $countpublic = $pdo->prepare($sql2);
    $countpublic->execute();
    $result3 = $countpublic->fetch(PDO::FETCH_ASSOC);
    ?>