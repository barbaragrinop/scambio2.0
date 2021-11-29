<?php
session_start();
include('../../config/conexao.php');

$outgoing_id = $_SESSION['id'];

$output = " ";

$sql = $pdo->prepare("CALL db_scambio.sp_ordenaChat(:user)");
$sql->execute(array(':user' => $outgoing_id));
$row = $sql->fetchAll(PDO::FETCH_ASSOC);
$sql->closeCursor();

if($sql->rowCount() <= 0){ 
    $output = "Sem usuários para conversar.";
}

if($sql->rowCount() > 0){
    include 'data.php';
}

echo $output;   
?>