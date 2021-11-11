<?php
include("./config/conexao.php");
session_start();

$novaSenha2 = $_POST['senha1'];
$novaSenha1 = $_POST['senha2'];

if($novaSenha1 === $novaSenha2){
    $senha = $novaSenha2;
}

if(isset($_SESSION['codigoRecuperacao'])){
    $codigo = $_SESSION['codigoRecuperacao'];
}

$query = $pdo->prepare("UPDATE db_scambio.tb_usuario set nm_senha = :senha where cd_recuperacao = :codigo");
$query->execute(array(
    ':codigo' => $codigo, 
    ':senha' => $senha
));

if($query->rowCount() >= 1){ 
    echo 1;  
    // header("Location: index.php");
    unset($_SESSION['codigoRecuperacao']);
    unset($_SESSION['codigo']);     
}

// header("Location: index.php");
