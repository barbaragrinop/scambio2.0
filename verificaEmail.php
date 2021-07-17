<?php
include_once('./config/conexao.php');
if(isset($_POST['check_submit_btn'])){
    $email = $_POST['email_id'];
    $query = $pdo->prepare("SELECT * from db_scambio.tb_usuario where nm_email = :email");
    $query->bindValue(':email', $email);
    $query->execute();
    $result = $query->rowCount();   
    if($result >= 1){
        echo "E-mail indisponível";
    }  else{
        echo "E-mail disponível";
    }
}

?>