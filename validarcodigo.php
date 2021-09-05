<?php

    include("config/conexao.php");
    session_start();

    $codigo = $_POST['codigo'];
    if(isset($_SESSION['recuperacao'])){
        $email = $_SESSION['recuperacao'];

        $query = $pdo->prepare("SELECT cd_recuperacao FROM db_scambio.tb_usuario where nm_email = :email");
        $query->bindValue(':email', $email);
        $query->execute();
        if($query->rowCount() > 0){
            $user = $query->fetch();
            if($user['cd_recuperacao'] === $codigo){
                echo "Código válido!";
                //header("Location: ./recuperacao/novaSenha.php");
            } else {
                echo "Código inválido!";
                return;
            }
        }
    }
