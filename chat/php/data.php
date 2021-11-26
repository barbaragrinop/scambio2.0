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

        //adiocionando na frente do texto
        ($outgoing_id == ($row2['outgoing_msg_id'] ?? "")) ? $you = "Você: " : $you = "";
        
        // if(isset($value['nm_status'])){
        //     ($value['nm_status'] == "Offline") ? $offline = "offline" : $offline = "";
        // }

        $offline = $value['nm_status'] ?? "";

        //checando se o usuário está online ou offline
        ($row['nm_status'] == 1) ? $offline = "Online" : $offline = "Offline"; ;   

        /* verificando se o usuario tem uma imagem setada */
        if(!isset($row['DS_IMGP']) && empty($row['DS_IMGP'])){
           $img  = '<img src="https://i1.wp.com/terracoeconomico.com.br/wp-content/uploads/2019/01/default-user-image.png?ssl=1" alt="" srcset="">';
        }
        else{
           $img = '<img src="../fotosuser/' . $row['DS_IMGP'] .'" alt="">';
        }

        $output .= '
            <a href="users-all.php?user_id='.$row['cd_usuario'].'">   
                <div class="content">'.
                    $img . '
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

    
        
    //     //adiocionando na frente do texto



    //     $output .= '
    //         <a href="users-all.php?user_id='.$row['cd_usuario'].'">   
    //             <div class="content">
    //                 <img src="" alt="">
    //                 <div class="details">
    //                     <span>'. $row['nm_usuario'] .'</span>
    //                     <p>'. $you . $msg.'</p>
    //                 </div>
    //             </div>
    //             <div class="status-dot '.$offline.'">
    //                 <i class="fas fa-circle"></i>
    //             </div>
    //         </a>    
    //     ';
    // }
?>