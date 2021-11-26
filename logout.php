<?php
    session_start();
    include_once 'config/conexao.php';
    if(isset($_SESSION['id'])){
        $online = $pdo->prepare("UPDATE DB_SCAMBIO.TB_USUARIO SET NM_STATUS = 0 WHERE CD_USUARIO = :usuario");
                $online->execute(array(
                    ':usuario' => $_SESSION['id']
                ));
        session_destroy();  
        header('Location: login/login.php'); 
    }
