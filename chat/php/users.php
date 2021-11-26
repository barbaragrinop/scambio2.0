<?php
session_start();
include('../../config/conexao.php');

$outgoing_id = $_SESSION['id'];

$output = " ";

$sql = $pdo->prepare("SELECT DISTINCT * from db_scambio.tb_usuario
                        left join db_scambio.messages on 
                        tb_usuario.cd_usuario = messages.outgoing_msg_id 
                        where not cd_usuario = :user
                        group by cd_usuario
                        order by datemessage desc
");
$sql->execute(array(':user' => $outgoing_id));

if($sql->rowCount() <= 0){ 
    $output = "Sem usuários para conversar.";
    // echo $output;
    echo $sql->rowCount();
}

if($sql->rowCount() > 0){
    include 'data.php';
}

echo $output;   
?>