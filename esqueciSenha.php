<?php
include("./config/conexao.php");
if(isset($_POST['email'])){
    $email = $_POST['email'];
} 

$query = $pdo->prepare("SELECT * from db_scambio.tb_usuario where nm_email = :email");
$query->bindValue(':email', $email);
$query->execute();
$result = $query->rowCount();
if($result <= 0) {
    echo "email inexistente";
} else {
    $exibe = $query->fetch(PDO::FETCH_ASSOC);
    $recebeNome = $exibe['nm_usuario'];
    $recebeSenha = $exibe['nm_senha'];
    



}
?>