<?php

session_start();
if(!isset($_SESSION['id'])){
    header("location: ../../index.php");
    return;
}

include_once('../../config/conexao.php');

if(isset($_POST['cd_enviada'])) $outgoing_id = $_POST['cd_enviada'];
if(isset($_POST['cd_recebida'])) $incoming = $_POST['cd_recebida'];
if(isset($_POST['message'])) $message = $_POST['message'];
$date = date("Y-m-d H:i:s");

if(!empty($message)){
    $sql = $pdo->prepare("INSERT into db_scambio.messages (incoming_msg_id, outgoing_msg_id, msg, datemessage)
                            values(:incoming, :outgoing, :msg, :datam)");
    $sql->execute(array(
        ':incoming' => $incoming, 
        ':outgoing' => $outgoing_id , 
        ':msg' => $message,  
        ':datam' => $date
    ));

    if($sql->rowCount() >= 1){
        echo "foi";
    }
}

?>