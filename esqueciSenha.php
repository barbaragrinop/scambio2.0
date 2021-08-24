<?php
include("./config/conexao.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'lib/vendor/autoload.php';

if(isset($_POST['email']) && !empty($_POST['email'])){

         $email = $_POST['email'];    
         $mail = new PHPMailer(true);

         $query = $pdo->prepare("SELECT * from db_scambio.tb_usuario where nm_email = :email");
         $query->bindValue(':email', $email);
         $query->execute();
         if($query->rowCount() > 0) {
             $dado = $query->fetch();
             $_SESSION['recuperacao'] = $dado['nm_email'];
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
                    $mail->Body    = '<b>Olá prezado usuario  Bom dia!</b><br><br>Para realizar a recuperação da senha entre nesse Link: abc';
                    $mail->AltBody = 'Para recuperar a senha entre no Link';
                    if(!$mail->send()){
                        die("Erro no envio do email: {$mail->ErrorInfo}");
                    }
                    header('Location:teste.php');
    }
}
?>