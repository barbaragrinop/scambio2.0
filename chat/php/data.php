<?php
    $you = " ";
    foreach ($row as $key => $value) {
        $query2 = $pdo->prepare("SELECT * from db_scambio.messages where (incoming_msg_id = :unique_id
            or outgoing_msg_id = :unique_id) and (outgoing_msg_id = :outgoing 
            or incoming_msg_id = :outgoing) order by msg_id desc limit 1 "); //pegando a ultima mensagem
        $query2->execute(array(
            ':outgoing' => $outgoing_id, 
            ':unique_id' => $value['cd_usuario']
        ));
      
        $row2 = $query2->fetch(PDO::FETCH_ASSOC);
        if($query2->rowCount() > 0){
            $result = $row2['msg'];
        } else{
            $result = "";
        }

        //cortando a mensagem p caber na visualização
        (strlen($result) > 24) ? $msg = substr($result, 0, 24).'...' :  $msg = $result;

        ($outgoing_id != ($row2['outgoing_msg_id'] ?? "")) ? $msg = "<b>$msg</b>" : $msg ;
        // ($outgoing_id != ($row2['outgoing_msg_id'] ?? "")) ? $msg = "<b>$msg</b>" : $msg ;

        //adiocionando na frente do texto
        ($outgoing_id == ($row2['outgoing_msg_id'] ?? "")) ? $you = "Você: " : $you = "";
        
        // echo $outgoing_id . " - " . $row2['outgoing_msg_id'];
        // var_dump($row);
        //checando se o usuário está online ou offline
        ($value['nm_status'] == "Offline") ? $offline = "offline" : $offline = "";   

        $offline = $value['nm_status'] ?? "";


        $output .= '
            <a href="users-all.php?user_id='.$value['cd_usuario'].'">   
                <div class="content">
                    <img src="" alt="">
                    <div class="details">
                        <span>'. $value['nm_usuario'] .'</span>
                        <p>'. $you . $msg.'</p>
                    </div>
                </div>
                <div class="status-dot '.$offline.'">
                    <i class="fas fa-circle"></i>
                </div>
            </a>    
        ';
    }
?>

