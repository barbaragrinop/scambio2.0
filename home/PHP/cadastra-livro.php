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
    $extensao1 = strtolower(substr($_FILES['file1']['name'], -4));
    $file1 = md5(time()) . '1' . $extensao1 ?? '';
    if($extensao1 != ".jpg" && ".png"){
        $file1 = "";
      }
    $diretorio = '../../fotos/';

    move_uploaded_file($_FILES['file1']['tmp_name'], $diretorio.$file1);
};

if (isset($_FILES['file2'])) {
    $extensao2 = strtolower(substr($_FILES['file2']['name'], -4));
    $file2 = md5(time()) . '2' . $extensao2 ?? '';
    if($extensao2 != ".jpg" && ".png"){
        $file2 = "";
      }
    $diretorio = '../../fotos/';
    move_uploaded_file($_FILES['file2']['tmp_name'], $diretorio.$file2);
};


if (isset($_FILES['file3'])) {
    $extensao3 = strtolower(substr($_FILES['file3']['name'], -4));;
    $file3 = md5(time()) . '3' . $extensao3 ?? '';
    if($extensao3 != ".jpg" && ".png"){
        $file3 = "";
      }
    $diretorio = '../../fotos/';
    move_uploaded_file($_FILES['file3']['tmp_name'], $diretorio.$file3);
};


$date = date("Y-m-d h:i");

// ECHO $date

try{
    $sql = $pdo->prepare("CALL db_scambio.sp_cadastrapublicacao(:livro, :descricao, :genero, :autor,  :ft1, :ft2, :ft3, :us, :dt)");
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
}
catch(Exception $e){
    echo $e;
}

?>