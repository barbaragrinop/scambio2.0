<?php
    // QUERY PARA PUXAR INFORMAÇÃO DO USUPARIO
    $usuario = $pdo->prepare("SELECT * FROM DB_SCAMBIO.TB_USUARIO WHERE CD_USUARIO =  " . $_SESSION['id']);
    $usuario->execute();
    $select_info_usuario = $usuario->fetch();
?>