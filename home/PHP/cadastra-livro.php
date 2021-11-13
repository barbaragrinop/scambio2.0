<?php

session_start();
require_once '../../config/conexao.php';

if (isset($_POST['autor'])) {
    $autor = $_POST['autor'];
}

if (isset($_POST['genero'])) {
    $genero = $_POST['genero'];
}

if (isset($_POST['descricao'])) {
    $descricao = $_POST['descricao'];
}

if (isset($_POST['nome'])) {
    $nome = $_POST['nome'];
}


if (isset($_FILES['file1'])) {
    $file1 = $_FILES['file1'] ?? '';
    $file1 = base64_encode($file1['tmp_name']) ?? '';
}

if (isset($_FILES['file2'])) {
    $file2 = $_FILES['file2'] ?? '';
    $file2 = base64_encode($file2['tmp_name'] ?? '');
}

if (isset($_FILES['file3'])) {
    $file3 = $_FILES['file3'] ?? '';
    $file3 = base64_encode($file3['tmp_name'] ?? '');
}

$date = date("Y-m-d h:i:sa");

try{
    $sql = $pdo->prepare("CALL db_scambio.sp_cadastraPublicacao(:livro, :descricao, :genero, :autor,  :ft1, :ft2, :ft3, :us, :dt)");
    $sql->execute(array(
        ':livro' => $nome,
        ':autor' => $autor,
        ':genero' => $genero,
        ':descricao' => $descricao,
        ':ft1' => $file1,
        ':ft2' => $file2,
        ':ft3' => $file3,
        ':us' => $_SESSION['id'],
        ':dt' => $date
    ));

    if($sql->rowCount() >= 1) {
        echo "Cadastro realizado com sucesso";
    }
}
catch(Exception $e){
    echo $e;
}

?>