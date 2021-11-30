<?php

include_once('../../config/conexao.php');

$sql = 'SELECT US.NM_USUARIO AS NM, PUB.CD_PUBLICACAO AS CDP, PUB.DS_PUBLICACAO AS DSP, PUB.DT_PUBLICACAO AS DTP, PUB.NM_GENERO AS GEP FROM DB_SCAMBIO.TB_PUBLICACAO AS PUB INNER JOIN DB_SCAMBIO.TB_USUARIO AS US ON US.CD_USUARIO = PUB.CD_USUARIO';
$publicacao = $pdo->prepare($sql);
$publicacao->execute();

if ($publicacao->rowCount() > 0) {
    while ($row1 = $publicacao->fetch(PDO::FETCH_ASSOC)) {
        $output = ' <div class="panel-body">
            <div class="media-block all">
              <a class="media-left" href="#"><img class="img-circle img-sm" alt="Profile Picture" src="https://bootdey.com/img/Content/avatar/avatar3.png"></a>
              <div class="media-body">
                <div class="mar-btm">
                  <div style="display: flex; justify-content: space-between;">
                    <a href="#" class="btn-link text-semibold media-heading box-inline">'. $row1['NM'] .'</a>
                    <!-- Default dropleft button -->
                    <div class="btn-group dropleft">
                      <button type="button" class="btn btn-secondary dropdown-toggle" style="background-color: #ac7e55;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        ...
                      </button>
                      <div class="dropdown-menu">
                        <a href="">Reportar</a>
                        <br>
                        <a href="">Enviar mensagem</a>
                      </div>
                    </div>
                  </div>
                </div>
                <p class="text-muted text-sm"> '. $row1['GEP'] .' - '. date("d/m/Y h:i", strtotime(($row1["DTP"]))) . '</p>
                <p style="font-size: 16.5px;">'. $row1['DSP'] .'</p>
                <hr>
                ';

        $sql2 = 'SELECT US.NM_USUARIO AS NMC, CO.DS_COMENTARIO AS COM, CO.DT_COMENTARIO AS DTC FROM DB_SCAMBIO.TB_COMENTARIO AS CO INNER JOIN DB_SCAMBIO.TB_USUARIO AS US ON US.CD_USUARIO = CO.CD_USUARIO WHERE CD_PUBLICACAO = ' . $row1['CDP'];
        $comentario = $pdo->prepare($sql2);
        $comentario->execute();
        if ($comentario->rowCount() > 0) {
            while($row2 = $comentario->fetch(PDO::FETCH_ASSOC)) {
                $output .= '
                    <div class="comentario">
                        <div class="media-block">
                            <a class="media-left" href="#"><img class="img-circle img-sm" alt="Profile Picture" src="https://bootdey.com/img/Content/avatar/avatar3.png"></a>
                            <div class="media-body">
                            <div class="mar-btm">
                                <div style="display: flex; justify-content: space-between;">
                                <a href="#" class="btn-link text-semibold media-heading box-inline">'. $row2['NMC'] .'</a>
                                <!-- Default dropleft button -->
                                <div class="btn-group dropleft">
                                    <button type="button" class="btn btn-secondary dropdown-toggle" style="background-color: #ac7e55;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    ...
                                    </button>
                                    <div class="dropdown-menu">
                                    <a href="">Reportar</a>
                                    <br>
                                    <a href="">Enviar mensagem</a>
        
                                    </div>
                                </div>
                                </div>
                                <p class="text-muted text-sm"> '. date("d/m/Y h:i", strtotime(($row2['DTC']))) . ' </p>
                                <p style="font-size: 16.5px;">'. $row2['COM'] .'</p>
                                <hr>
                            </div>
                        </div>
                    </div>';
            };
 
        };

        $output .= '<div class="bg-light p-2">
                    <div class="d-flex flex-row align-items-start" style="display: flex; padding-left: 120px;">
                      <img class="rounded-circle" src="../assets/imgs/munir.jpeg" width="70" style="margin-right: 15px; margin-top: 5px;">
                      <textarea class="form-control ml-1 shadow-none textarea" style="width: 95%;"></textarea>
                    </div>
                    <br>
                    <div class="mt-2 text-right"><button class="btn btn-primary btn-sm shadow-none" style="background-color: #AC7E55; border: none; font-size: 15px;" type="button">Comentar</button></div>
                  </div>
                </div>
              </div>
            </div>
          </div>';
    }
    echo $output;
}



?>