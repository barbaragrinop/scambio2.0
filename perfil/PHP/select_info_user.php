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
                <h1 style="padding-left: 15px;">Biografia | Editar</h1>
                <div class="bio-row">
                    <p><span>Nome:</span><input type="text" name="newnome" id="newnome"  value ="' . $row['nm_usuario'] .'"></p>
                </div>
                <div class="bio-row">
                    <p><span>E-mail:</span><input type="text" id="newemail" name="newemail" value ="' . $row['nm_email'] .'"></p>
                </div>
                <div class="bio-row" style="margin-top: 20px;">
                    <p><span>Nascimento:</span><input type="text" name="newborn" id="newborn" value ="' . $row['dt_nascimento'] .'"></p>
                </div>
                <div class="bio-row" style="margin-top: 20px;">
                    <p><span>CEP: </span><input type="text" name="newaddres" id="newaddres"></p>
                </div>
                <div class="up-img" style="padding-top: 20px; padding-left: 17px; display: flex; flex-direction: row;">
                    <span style="font-size: 15px;">Imagem de Perfil</span>
                    <input type="file" style="margin-left: 20px;" name="newimage" id="newimage">
                </div>
                <div class="btn-confirm-edit" style="margin-left: 700px; border: none;">
                    <button id="updateinfous" onclick="update()" style="border: none; border-radius: 10px; height: 30px; width: 90px; background-color: #AC7E55; color: white;">Confirmar</button>
                </div>
            </form>
        </div>
    </div>
    ';

    echo $out;
}
?>