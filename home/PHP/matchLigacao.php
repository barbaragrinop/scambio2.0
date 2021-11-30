<?php
session_start();

$idEnviado = $_POST['idEnviado'];
$idSession = $_POST['idSession'];
$idPublicacao = $_POST['idPublicacao'];


include '../../config/conexao.php';


$sql = $pdo->prepare('CALL db_scambio.sp_inserePrimeiraChamadaProd(:session, :enviado, :publicacao)');
$sql->execute(array(
    ':session' => $idSession,   
    ':enviado' => $idEnviado, 
    ':publicacao' => $idPublicacao
));

if($sql->rowCount() >= 1) {
    echo $idEnviado;
} 

else {
    echo 0;
}

// idConfUsu1 bool,
// idConfUsu2 bool,
// cd_usuario1 int, 
// cd_usuario2 int,
// cd_livro int,


?>