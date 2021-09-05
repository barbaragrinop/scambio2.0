<?php
include("./config/conexao.php");
session_start();

$novaSenha2 = $_POST['novaSenha2'];
$novaSenha1 = $_POST['novaSenha1'];

if($novaSenha1 === $novaSenha2){
    $senha = $novaSenha2;
}

if(isset($_SESSION['recuperacao'])){
    $email = $_SESSION['recuperacao'];
}

$query = $pdo->prepare("UPDATE db_scambio.tb_usuario set nm_senha = :senha where cd_usuario = (SELECT cd_usuario from db_scambio.tb_usuario where nm_email = :email)");
$query->execute(array(
    ':email' => $email, 
    ':senha' => $senha
));

if($query->rowCount() >= 1){ 
    echo "<script>alert('Cadastro Realizado com Sucesso')</script>";
    header("Location: index.php");
    unset($_SESSION['recuperacao']);
    unset($_SESSION['codigo']);       
}

header("Location: index.php");
