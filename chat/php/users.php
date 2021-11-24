<?php
session_start();
include('../../config/conexao.php');

$outgoing_id = $_SESSION['id'];

$output = " ";

$sql = $pdo->prepare("CALL db_scambio.sp_ordenaConversasChat(:user)");
$sql->execute(array(':user' => $outgoing_id));


if($sql->rowCount() <= 0){ 
    $output = "Sem usuários para conversar.";
    // echo $output;
    // echo $sql->rowCount();
}

if($sql->rowCount() > 0){
    include 'data.php';
    $sql->closeCursor();        
}

echo $output;   


?>