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
            header("Location: home.php");
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
