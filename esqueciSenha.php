<?php


session_start();

include("./config/conexao.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'lib/vendor/autoload.php';


if(isset($_SESSION['recuperacao'])){
     header('Location:recuperacao/codigo.php');
}else{

if(isset($_POST['email']) && !empty($_POST['email'])){

         $email = $_POST['email'];    
         $mail = new PHPMailer(true);

         $query = $pdo->prepare("SELECT * from db_scambio.tb_usuario where nm_email = :email");
         $query->bindValue(':email', $email);
         $query->execute();
         if($query->rowCount() > 0) {
            $dado = $query->fetch();

            // Criação session recuperação
            $_SESSION['recuperacao'] = $dado['nm_email'];

            // Criação codigo recuperacao
            $random = random_bytes(6);
            $result = bin2hex($random); //transforma
            //conta = strlen($result); //conta quantos tem
            $SeisCaracteres = substr($result, 6);
            $SeisCaracteres = strtoupper($SeisCaracteres);


            // Setando no banco na coluna cd_codigo
            $query = $pdo->prepare("UPDATE db_scambio.tb_usuario SET cd_recuperacao = :codigo where nm_email = :email");
            $query->bindValue(':email', $email);
            $query->bindValue(':codigo', $SeisCaracteres);
            $query->execute();


            //Server settings
            $mail->CharSet = 'UTF-8';
            $mail->Encoding = 'base64';
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.office365.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;   
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;                                //Enable SMTP authentication
            $mail->Username   = 'scambioproject@outlook.com';                     //SMTP username
            $mail->Password   = 'scambio40028922';                               //SMTP password            //Enable implicit TLS encryption
            $mail->Port       = 587;     
                
                    //Recipients
            $mail->setFrom('scambioproject@outlook.com', 'Robo de atendimento Scambio');
            $mail->addAddress($email, 'Yago');   

                    //Content
            $mail->isHTML(true);          //Set emailscambio';
            $mail->Subject = 'Mrs. Robot Scambio';
            $mail->Body    = "<b>Olá prezado usuario  Bom dia!</b><br><br>O codigo para recuperação de senha é $SeisCaracteres";
            $mail->AltBody = 'Para recuperar a senha entre no Link';
            $mail->Send();  
        } 
    }
}
?>