<?php
// include("./config/conexao.php");

// $uf = "SE";
// $email = 'barbara@barbara.com';
// echo $email;

session_start();
if(isset($_SESSION['recuperacao'])){
    header('Location: ../home.php');
}
else{
    print_r($_SESSION['recuperacao']);
}
$uf = "SE";
$email = 'barbara@barbara.com';
// echo $email;

// echo "<script>alert('Cadastro Realizado com Sucesso')</script>";

$random = random_bytes(6);
$result = bin2hex($random); //transforma
//conta = strlen($result); //conta quantos tem
$SeisCaracteres = substr($result, 6);
$SeisCaracteres = strtoupper($SeisCaracteres);
echo $SeisCaracteres;



// -------------------------------TESTE RETORNO DE LINHAS------------------------------------------------------------------
//     $insereUF = $pdo->query("SELECT cd_uf from db_scambio.tb_uf where sg_uf= '$uf'");
//     // $retorno = $insereUF->fetchColumn();

// //teste mostrar resultado
// $result = $insereUF->fetch(PDO::FETCH_ASSOC); //as
// print_r($result);

// $buscaCI = $pdo->query("SELECT cd_cidade from db_scambio.tb_cidade where sg_uf= 'SP' and nm_cidade = '$cidade'");
// $retornoCI = $buscaCI->fetchColumn();
// if($retornoUF >= 1){

// }

//-------------------------------------TESTE VERIFICAR SE EMAIL EXISTE------------------------------------------

    // $query = $pdo->prepare("SELECT * from db_scambio.tb_usuario where nm_email = :email");
    // $query->bindValue(':email', $email);
    // $query->execute();
    // $result = $query->rowCount();
    // echo $result;
    // echo $email;

//-----------------------------------------------------------------------------

?>