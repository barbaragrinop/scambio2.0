<?php 
include("config/conexao.php");

$nome = $_POST['nome'];
$dtnasc = $_POST['dtnasc'];
$cel = $_POST['celular'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$cep = $_POST['cep'];
$rua = $_POST['rua'];
$numero = $_POST['numero'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$uf = $_POST['estado']; 

//Verificando cadastro do email
try{
    $insere = $pdo->prepare("call db_scambio.sp_cadastraUsuario(:nome, :senha, :celular, :datanasc, :email, :cep, :rua, :bairro, :cidade, :uf, :numerocasa)");
    $insere->execute(array(
        ':nome' => $nome, 
        ':senha' => $senha,
        ':celular' => $cel,
        ':datanasc' => $dtnasc,
        ':email' => $email, 
        ':cep' => $cep,
        ':rua' => $rua, 
        ':bairro' => $bairro,
        ':cidade' => $cidade,
        ':uf' => $uf,
        ':numerocasa' => $numero
    ));
    header('Location: login/login.php');
    
} 
catch(Exception $ex){
    echo "Erro na inserção: " . $ex->getMessage();
}





// $buscaUF = $pdo->query("SELECT * from db_scambio.tb_uf where sg_uf= '$uf'");
// $retornoUF = $buscaUF->fetchColumn();
// if($retornoUF >= 1){
//     $resultUF = $buscaUF->fetch(PDO::FETCH_ASSOC); //pega resultado e mostra
// } 

// $buscaCI = $pdo->query("SELECT * from db_scambio.tb_cidade where sg_uf= '$resultUF' and nm_cidade = '$cidade'");
// $retornoCI = $buscaCI->fetchColumn();       
// if($retornoUF >= 1){
//     $buscaCI2 = $pdo->query("SELECT * from db_scambio.tb_cidade where sg_uf= '$resultUF' and nm_cidade = '$cidade'");
// }

// try{
   
//     $inserir = $pdo->prepare("INSERT INTO db_scambio.tb_usuario(nm_usuario, dt_nascimento, nm_email, cd_celular, nm_senha ) VALUES( :nome, :dtnasc, :email, :celular, :senha)");
//     $inserir->execute(array(
//         ':nome' => $nome,
//         ':dtnasc'=> $dtnasc,
//         ':celular'=> $cel,
//         ':email'=> $email,
//         ':senha' => $senha
//     ));
//     // $inserir->bindValue(":nome", $nome);
//     // $inserir->bindValue(":dtnasc", $dtnasc); 
//     // $inserir->bindValue(":email", $email); 
//     // $inserir->bindValue(":senha", $senha); 
//     // $inserir->execute();
//     // echo  $inserir->rowCount();
//     echo "inseriu";
// } 
// catch(Exception $ex){
//     echo "inseriu não: " . $ex->getMessage();
// }

// // Verificar se o email já está cadastrado.
// // $verificar = $pdo->query("SELECT * from db_scambio.tb_usuario where nm_email = '$email'");

// // $res = $verificar->fetchAll(PDO::FETCH_ASSOC);
// // $total_reg = @count($res);
// // if($total_reg > 0){
// //     echo 'O e-m já está Cadastrado!';
// //     exit();
// // } else {
// //     try{
// //         $inserir = $pdo->query("INSERT INTO tb_usuario SET nm_usuario = :nome,dt_nascimento = :dtnasc, cd_celular = :celular,nm_senha = :senha");
// //         $inserir->bindValue(":nome", $nome);
// //         $inserir->bindValue(":dtnasc", $dtnasc ); 
// //         $inserir->bindValue(":celular", $cel); 
// //         $inserir->bindValue(":email", $email); 
// //         $inserir->bindValue(":senha", $senha); 
// //         $inserir->execute();
// //         echo "inseriu";
// //     } 
// //     catch(Exception $ex){
// //         echo "inseriu não";
// //     }
// // }
