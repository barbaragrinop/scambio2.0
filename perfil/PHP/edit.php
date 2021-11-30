<?php

session_start();
include('../../config/conexao.php');

if(isset($_POST['livro']) && !empty([$_POST['livro']]) && isset($_POST['describe']) && !empty([$_POST['describe']])
&& isset($_POST['genero']) && !empty([$_POST['genero']])  && isset($_POST['autor']) && !empty([$_POST['autor']])
&& isset($_POST['codigo']) && !empty([$_POST['codigo']]))
{
    $livro = $_POST['livro'];
    $genero = $_POST['genero'];
    $describe = $_POST['describe'];
    $codigo = $_POST['codigo'];
    $autor = $_POST['autor'];
    $usercd = $_SESSION['id'];

    $edit = 'UPDATE db_scambio.tb_livro AS lv SET lv.nm_livro = "' . $livro .'", lv.nm_genero = "' . $genero . '", lv.descricao = "' . $describe . '", lv.nm_autor = "' . $autor . '" WHERE lv.cd_livro = ' . $codigo .'';
    $updateedit = $pdo->prepare($edit);
    $updateedit->execute();



}
?>