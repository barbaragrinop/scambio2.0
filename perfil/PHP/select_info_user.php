<?php

session_start();
include('../../config/conexao.php');

$sql = 'SELECT * FROM DB_SCAMBIO.TB_USUARIO WHERE CD_USUARIO = ' . $_SESSION['id'];
$query = $pdo->prepare($sql);
$query->execute();

if ($query->rowCount() > 0) {
    $row = $query->fetch(PDO::FETCH_ASSOC);
    $out = '
    <div style="display: flex; justify-content: center;">
        <div class="display: flex; justify-content: center;" style="margin-top: 50px;">
            <form id="formupdate">
                <h1 style="padding-left: 1px; margin-top: -50px;">Biografia | Editar</h1>
                <div class="bio-row">
                    <p style="margin-top: 25px;"><span>Nome:</span><input type="text" class="form-control" name="newnome" id="newnome" style="width: 400px !important;" value ="' . $row['nm_usuario'] .'"></p>
                </div>
                <div class="bio-row">
                    <p style="margin-top: 25px;"><span>E-mail:</span><input type="text" class="form-control" id="newemail" name="newemail" style="width: 400px !important;" value ="' . $row['nm_email'] .'"></p>
                </div>
                <div class="bio-row">
                    <p style="margin-top: 35px;"><span>Nascimento:</span><input type="text" class="form-control" name="newborn" id="newborn" style="width: 400px !important;" value ="' . $row['dt_nascimento'] .'"></p>
                </div>
                <div class="bio-row">
                    <p style="margin-top: 35px;"><span>CEP: </span><input type="text"class="form-control" name="newaddres" id="newaddres" style="width: 400px !important;"></p>
                </div>
                <div class="up-img" style="padding-top: 20px; padding-left: 17px; display: flex; flex-direction: row; margin-top: 260px;">
                    <span style="font-size: 15px;">Imagem de Perfil</span>
                    <input type="file" style="margin-left: 20px;" name="newimage" id="newimage">
                </div>
                <div class="btn-confirm-edit" style="margin-left: 700px; border: none;">
                    <button id="updateinfous" onclick="update()" style="border: none; border-radius: 7px; height: 35px; width: 90px; background-color: #AC7E55; color: white; margin-left: 90px;">Confirmar</button>
                </div>
            </form>
        </div>
    </div>
    ';

    echo $out;
}
?>