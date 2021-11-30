<?php

session_start();

require_once '../../config/conexao.php';

if(isset($_POST['idUser'])) $idUser = $_POST['idUser'];
if(isset($_POST['idLivro'])) $idPublicacao = $_POST['idLivro'];
if(isset($_POST['estadoBotao'])) $estadoBotao = $_POST['estadoBotao'];

if($estadoBotao == false || $estadoBotao == 'false') $estadoBotao = 0;
if($estadoBotao == true || $estadoBotao == 'true') $estadoBotao = 1;



$sql = $pdo->prepare("SELECT * from db_scambio.tb_match where cd_livro = :idLivro");
$sql->execute(array('idLivro' => $idPublicacao));

$arr = $sql->fetch(PDO::FETCH_ASSOC);

if($arr['cd_usuario1'] == $idUser){
    // echo '[cd_usuario1]  igual a session ' ;
    $check1 = $pdo->prepare('UPDATE db_scambio.tb_match set idConfUsu1 = :estado where cd_livro = :idPub');
    $check1->execute(array(
        ':estado' => $estadoBotao, 
        'idPub' => $idPublicacao
    ));
} else if($arr['cd_usuario2'] == $idUser){
    // echo '[cd_usuario2]  igual a session ' ;
    $check1 = $pdo->prepare('UPDATE db_scambio.tb_match set idConfUsu2 = :estado where cd_livro = :idPub');
    $check1->execute(array(
        ':estado' => $estadoBotao, 
        'idPub' => $idPublicacao
    ));
} 


if(($arr['idConfUsu1'] == 1) && ($arr['idConfUsu2'] == 1)){
    $asd = $pdo->prepare("SELECT * from db_scambio.relacoesmatches where 
        usuario1 = :usu1 and usuario2 = :usu2 and cd_pub = :cdPub
    ");
    $asd->execute(array(
        ':usu1' => $arr['cd_usuario1'], 
        ':usu2' => $arr['cd_usuario2'], 
        ':cdPub' => $idPublicacao
    ));

    if($asd->rowCount() >= 1 ){
        // echo "sim";
    } else {
        $mac = $pdo->prepare("INSERT INTO db_scambio.relacoesmatches(usuario1, usuario2, cd_pub)
                            values(:usu1, :usu2, :cdPub)");
        $mac->execute(array(
            ':usu1' => $arr['cd_usuario1'], 
            ':usu2' => $arr['cd_usuario2'], 
            ':cdPub' => $idPublicacao
        ));
        // echo "aqui";
    }

    echo "sim";

} 
?>