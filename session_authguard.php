<?php

session_start();

if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['pass']) && !empty($_POST['pass'])){
    
    require("config/conexao.php");
    require 'assets/function/UsuarioClass.php';
    
    $u = new Usuario();
    
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['pass']);
    
    if($u->login($email,$senha) == true){
        if(isset($_SESSION['id'])){
                $online = $pdo->prepare("UPDATE DB_SCAMBIO.TB_USUARIO SET NM_STATUS = 1 WHERE CD_USUARIO = :usuario");
                $online->execute(array(
                    ':usuario' => $_SESSION['id']
                ));
                
                $getStatus = $pdo->prepare("SELECT * from db_scambio.tb_usuario WHERE CD_USUARIO = :usuario");
                $getStatus->execute(array(
                    ':usuario' => $_SESSION['id']
                ));
                if($getStatus->rowCount() >= 1) {
                    $row = $getStatus->fetch(PDO::FETCH_ASSOC);
                }

                $row['nm_status'] == 1 ? $_SESSION['status'] = 'Online' : $_SESSION['status'] = 'Offline';   
                
                
            header("Location: home/home.php");
        }else{
            header("Location: login/login.php");
        } 
    }
    else{
        header("Location: login/login.php");
    } 
}
else{
    header("Location: login/login.php");
}
