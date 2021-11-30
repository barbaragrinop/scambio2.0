<?php

session_start();

include_once('../../config/conexao.php');

$sql = $pdo->prepare("SELECT * from db_scambio.notificacao order by cd_notificacao desc");
$sql->execute();

$id = $_SESSION['id'];

if($sql->rowCount() >= 1){
    $row = $sql->fetchAll(PDO::FETCH_ASSOC);
}

//descricao
//data
//lugar
//de
//para
//livro

foreach ($row as $key => $value) {
    $livro = $pdo->prepare("SELECT nm_livro from db_scambio.tb_livro where cd_livro = :livro");
    $livro->execute(array(
        ':livro' => $value['cd_livro']
    ));
    $getLivro = $livro->fetch(PDO::FETCH_ASSOC);
    $nomeLivro = $getLivro['nm_livro'] ?? "";

    // echo $nomeLivro;
    
    
    $from = $pdo->prepare("SELECT cd_usuario, nm_usuario from db_scambio.tb_usuario where cd_usuario = :usuario");
    $from->execute(array(
        ':usuario' => $value['de']
    ));
    $de = $from->fetch(PDO::FETCH_ASSOC);
    $idFrom = $de["cd_usuario"];
    $nmFrom = $de["nm_usuario"];
    // echo $nmFrom;

    $to = $pdo->prepare("SELECT cd_usuario, nm_usuario from db_scambio.tb_usuario where cd_usuario = :usuarioTo");
    $to->execute(array(
        ':usuarioTo' => $value['para']
    ));
    $para = $to->fetch(PDO::FETCH_ASSOC);
    $idPara = $para['cd_usuario'];
    $nmPara = $para['nm_usuario'];

    // echo $idFrom . " = " . $nmPara;

    if($idPara == $id){
        // echo "aham";
           
                                if($value['cd_livro']) {
                                    $out = '<div>
                                                <a href="#" style="display: flex; flex-direction: row; height: 34px;"><p></p>
                                                    <img width="40" height="40" src="../babi.jpg" alt="" style="border-radius: 20px;">
                                                    <div style="display: flex; flex-direction: column">
                                                        <h6 style=" font-weight: 700; margin-left: 10px;">'.$value['nm_lugar'].'</h6>
                                                        <h6 style=" margin-left: 10px; margin-top: -3px;"> <b>'.$nmFrom.'</b>  quer dar match no livro '.$nomeLivro.'</h6>
                                                    </div>
                                                </a>
                                            </div>
                                            <hr style="margin-bottom: 12px;">';
                                } else if($value['nm_lugar'] == "Mensagens"){
                                    $out ='<div>
                                                <a href="#" style="display: flex; flex-direction: row; height: 34px;"><p></p>
                                                    <img width="40" height="40" src="../babi.jpg" alt="" style="border-radius: 20px;">
                                                    <div style="display: flex; flex-direction: column">
                                                        <h6 style=" font-weight: 700; margin-left: 10px;">'.$value['nm_lugar'].'</h6>
                                                        <h6 style=" margin-left: 10px; margin-top: -3px;"> <b>'.$nmFrom.'</b>  mandou uma mensagem </h6>
                                                    </div>
                                                </a>
                                            </div>
                                            <hr style="margin-bottom: 12px;">';
                                } else if($value['nm_lugar'] == "Fórum"){
                                    $out ='<div>
                                                <a href="#" style="display: flex; flex-direction: row; height: 34px;"><p></p>
                                                    <img width="40" height="40" src="../babi.jpg" alt="" style="border-radius: 20px;">
                                                    <div style="display: flex; flex-direction: column">
                                                        <h6 style=" font-weight: 700; margin-left: 10px;">'.$value['nm_lugar'].'</h6>
                                                        <h6 style=" margin-left: 10px; margin-top: -3px;"> <b>'.$nmFrom.'</b>  mandou uma mensagem </h6>
                                                    </div>
                                                </a>
                                            </div>
                                            <hr style="margin-bottom: 12px;">';
                                }
                            
            echo $out;
        } 
    }









?>