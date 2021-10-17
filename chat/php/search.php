<?php

session_start();
include_once "../../config/conexao.php";
$outgoing_id = $_SESSION['id'];

$searchTerm = $_POST['searchTerm'];
$search = "%$searchTerm%";

$output = "";

$sql = $pdo->prepare("SELECT * from db_scambio.tb_usuario WHERE not cd_usuario = :outgoing and (nm_usuario LIKE :search)");
$sql->bindParam(':search', $search);
$sql->bindParam(':outgoing', $outgoing_id);
$sql->execute();

if($sql->rowCount() >= 1){
    include 'data.php';
} else{
    $output .= "Nenhum usuário encontrado";
}

echo $output;

?>