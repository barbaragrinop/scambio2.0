<?php

session_start();

include_once('../../config/conexao.php');

if(!isset($_SESSION['id'])){
    header("location: ../../index.php");
}

if(isset($_POST['cd_enviada'])) $outgoing_id = $_POST['cd_enviada'];
if(isset($_POST['cd_recebida'])) $incoming = $_POST['cd_recebida'];
$output = "";

$sql = $pdo->prepare("SELECT * from db_scambio.messages 
                        left join db_scambio.tb_usuario
                        on tb_usuario.cd_usuario = messages.outgoing_msg_id
                        where outgoing_msg_id = :outgoing and incoming_msg_id =  :incoming
                        or outgoing_msg_id = :incoming and incoming_msg_id =  :outgoing order by msg_id asc" );
                        $sql->execute(array(':incoming' => $incoming, ':outgoing' => $outgoing_id));

if($sql->rowCount() > 0){
    while($row = $sql->fetch(PDO::FETCH_ASSOC)){
    // echo "outgoinh banco" . $row['outgoing_msg_id'] . "   - session " . $outgoing_id ;
        if($row['outgoing_msg_id'] === $outgoing_id){ //se for igual ao q está enviando
            $output .= '
            <div class="chat outgoing">
                <div class="details">
                    <p>'.$row['msg'].'</p>
                </div>
            </div>
            ';
        } 
        else{ //se for o recpetor
            $output .= '<div class="chat incoming">
                <img src="php/images/'.$row['img'].'" alt="">
                <div class="details">
                    <p>'.$row['msg'].'</p>
                </div>
            </div>';
        }
    }
    echo $output;
}

?>