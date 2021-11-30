<?php

session_start();

include_once('../../config/conexao.php');

var_dump($_POST['id']);

$id = $_POST['id'];
$userid = $_SESSION['id'];

$sql = 'DELETE FROM DB_SCAMBIO.TB_LIVRO WHERE CD_LIVRO = ' . $id .' AND CD_USUARIO = ' . $userid;
$del = $pdo->prepare($sql);
$del->execute();

echo $id
?>