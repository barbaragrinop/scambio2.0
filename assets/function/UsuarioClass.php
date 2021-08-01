<?php
class Usuario{
    public function login($email,$senha){
        global $pdo;

        $query = $pdo->prepare("SELECT * from db_scambio.tb_usuario where nm_email = :email and nm_senha = :senha");
        $query->bindValue(':email', $email);
        $query->bindValue(':senha', $senha);
        $query->execute();

        if($query->rowCount() > 0){
            $dado = $query->fetch();
            $_SESSION['id'] = $dado['cd_usuario'];

            echo $dado['cd_usuario'];

            return true;
        }else{
            return false;
        }
    }
}
?>