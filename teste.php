<?php
include("./config/conexao.php");

// $uf = "SE";
// $email = 'barbara@barbara.com';
// echo $email;


$uf = "SE";
$email = 'barbara.pereira65@etec.sp.gov.br';
// echo $email;

// echo "<script>alert('Cadastro Realizado com Sucesso')</script>";

$random = random_bytes(6);
$result = bin2hex($random); //transforma
//conta = strlen($result); //conta quantos tem
$SeisCaracteres = substr($result, 6);
$SeisCaracteres = strtoupper($SeisCaracteres);


$query = $pdo->prepare("UPDATE db_scambio.tb_usuario SET cd_recuperacao = :codigo where cd_usuario = (SELECT cd_usuario from db_scambio.tb_usuario where nm_email = :email)");
        $query->bindValue(':email', $email);
        echo $email;
        echo $SeisCaracteres;
        $query->bindValue(':codigo', $SeisCaracteres);
        $query->execute();
        if($query->rowCount() > 0)
        {
            echo "FOi";
        }
        else {
            echo "n foi não";
        }


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
