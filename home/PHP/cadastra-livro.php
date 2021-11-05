<?php

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
    $file1 = $_POST['file1'] ?? '';
}

if (isset($_FILES['file2'])) {
    $file2 = $_POST['file2'] ?? '';
}

if (isset($_FILES['file3'])) {
    $file3 = $_POST['file3'] ?? '';
}


try{
    $sql = $pdo->prepare("CALL db_scambio.sp_cadastraPublicacao(:livro, :autor, :genero, :descricao, :ft1, :ft2, :ft3)");
    $sql->execute(array(
        ':livro' => $nome,
        ':autor' => $autor,
        ':genero' => $genero,
        ':descricao' => $descricao,
        ':ft1' => $file1,
        ':ft2' => $file2,
        ':ft3' => $file3
    ));

    if($sql->rowCount() >= 1) {
        echo "Cadastro realizado com sucesso";
    }
}
catch(Exception $e){
    echo $e;
}

?>