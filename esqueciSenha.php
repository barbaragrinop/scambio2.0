<?php

session_start();

include("./config/conexao.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'lib/vendor/autoload.php';

if(isset($_SESSION['recuperacao'])){
     header("Location: ./recuperacao/codigo.php");
}  

if(isset($_POST['email']) && !empty($_POST['email'])){ 
        $email = $_POST['email'];
}

//verificacao email do usuario
$query = $pdo->prepare("SELECT * from db_scambio.tb_usuario where nm_email = :email");
$query->bindValue(':email', $email);
$query->execute();
if($query->rowCount() > 0) {
        $dado = $query->fetch();
        $nomeUsuario = $dado['nm_usuario'];
        $_SESSION['recuperacao'] = $dado['nm_email'];
} else { echo "E-mail Invalido"; return; }

//criação codigo de recuperação
$random = random_bytes(6);
$result = bin2hex($random);
$codigo = substr($result, 6);
$codigo = strtoupper($codigo);
$_SESSION['codigoRecuperacao'] = $codigo;

//setando o codigo no banco
$query = $pdo->prepare("UPDATE db_scambio.tb_usuario SET cd_recuperacao = :codigo where cd_usuario = (SELECT cd_usuario from db_scambio.tb_usuario where nm_email = :email)");
$query->bindValue(':email', $email);
$query->bindValue(':codigo', $codigo);
$query->execute();

//iniciando phpmailer
$mail = new PHPMailer(true);
$mail->Encoding = 'base64';
$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
$mail->isSMTP();                                            //Send using SMTP
$mail->Host       = 'smtp.office365.com';                     //Set the SMTP server to send through
$mail->SMTPAuth   = true;   
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;                                //Enable SMTP authentication
$mail->Username   = 'scambioproject@outlook.com';                     //SMTP username
$mail->Password   = 'scambio40028922';                               //SMTP password            //Enable implicit TLS encryption
$mail->Port       = 587;     

$mail->setFrom('scambioproject@outlook.com', 'Robo de atendimento Scambio');
$mail->addAddress($email, 'Yago');   

        //Content
$mail->isHTML(true);          //Set emailscambio';
$mail->Subject = 'Mrs. Robot Scambio';
$mail->Body    = "<b>Bem-vindo de volta, ${nomeUsuario}!</b><br><br> Seu codigo para recuperacao e: $codigo";
$mail->Send();  

header('Location: ./recuperacao/codigo.php');
echo "<script>window.location.href='./recuperacao/codigo.php';</script>";
if(isset($_SESSION['recuperacao'])){
        header("Location: ./recuperacao/codigo.php");
   }  
?>