<?php


session_start();
include_once('../../config/conexao.php');


$publicacao = $_POST['publicacao'];
$genero = $_POST['genero'];
$user = $_SESSION['id'];
$date = date("Y-m-d h:i:s");

$sql = 'INSERT INTO DB_SCAMBIO.TB_PUBLICACAO (cd_publicacao, cd_usuario, dt_publicacao, ds_publicacao, nm_genero) VALUES ("",'. $user .',"'. $date .'","'. $publicacao .'","'. $genero .'")';
$ins = $pdo->prepare($sql);
$ins->execute();

?>