<?php

session_start();
include_once('../../config/conexao.php');


$search = $_POST['search'];

if(isset($search)){
  $sql = 'SELECT US.NM_USUARIO AS NM,US.DS_IMGP AS IMG, PUB.CD_PUBLICACAO AS CDP, PUB.DS_PUBLICACAO AS DSP, PUB.DT_PUBLICACAO AS DTP, PUB.NM_GENERO AS GEP FROM DB_SCAMBIO.TB_PUBLICACAO AS';
  $sql .= ' PUB INNER JOIN DB_SCAMBIO.TB_USUARIO AS US ON US.CD_USUARIO = PUB.CD_USUARIO';
  $sql .= ' WHERE PUB.DS_PUBLICACAO LIKE "%' . $search .'%"';
  $publicacao = $pdo->prepare($sql);
  $publicacao->execute();
}
else{
  $sql = 'SELECT US.NM_USUARIO AS NM,US.DS_IMGP AS IMG, PUB.CD_PUBLICACAO AS CDP, PUB.DS_PUBLICACAO AS DSP, PUB.DT_PUBLICACAO AS DTP, PUB.NM_GENERO AS GEP FROM DB_SCAMBIO.TB_PUBLICACAO AS';
  $sql .= ' PUB INNER JOIN DB_SCAMBIO.TB_USUARIO AS US ON US.CD_USUARIO = PUB.CD_USUARIO ORDER BY PUB.CD_PUBLICACAO DESC';
  $publicacao = $pdo->prepare($sql);
  $publicacao->execute();
}


if ($publicacao->rowCount() > 0) {
    while ($row1 = $publicacao->fetch(PDO::FETCH_ASSOC)) {

      $useron = 'SELECT US.DS_IMGP AS IMG2 FROM DB_SCAMBIO.TB_USUARIO AS US WHERE CD_USUARIO = ' . $_SESSION['id'];
      $user = $pdo->prepare($useron);
      $user->execute();
      $row3 = $user->fetch(PDO::FETCH_ASSOC);


      if (!isset($row1['IMG']) && empty($row1['IMG'])) {
        $img  = '<img src="https://i1.wp.com/terracoeconomico.com.br/wp-content/uploads/2019/01/default-user-image.png?ssl=1"  alt="" width="40" height="40" style="border-radius: 30px; border: 3px solid #3CD10C; margin-top: 8px;">';
      } else {
        $img = '<img class="img-circle img-sm" alt="Profile Picture" src="../fotosuser/' . $row1['IMG'] .'">';
      }

      if (!isset($row3['IMG2']) && empty($row3['IMG2'])) {
        $imgUS  = '<img class="rounded-circle" src="https://i1.wp.com/terracoeconomico.com.br/wp-content/uploads/2019/01/default-user-image.png?ssl=1"  width="70" style="margin-right: 15px; margin-top: 5px;">';
      } else {
        $imgUS = '<img class="rounded-circle" src="../fotosuser/'. $row3['IMG2'] .'"  width="70" style="margin-right: 15px; margin-top: 5px;">';
      }

     
        $output = ' <div class="panel-body">
            <div class="media-block all">
              <a class="media-left" href="#">'. $img .'</a>
              <div class="media-body">
                <div class="mar-btm">
                  <div style="display: flex; justify-content: space-between;">
                    <a href="#" class="btn-link text-semibold media-heading box-inline">'. $row1['NM'] .'</a>
                    <!-- Default dropleft button -->
                  </div>
                </div>
                <p class="text-muted text-sm"> '. $row1['GEP'] .' - '. date("d/m/Y h:i", strtotime(($row1["DTP"]))) . '</p>
                <p style="font-size: 16.5px;">'. $row1['DSP'] .'</p>
                <hr>
                ';
/* 
        $sql2 = 'SELECT US.NM_USUARIO AS NMC, CO.DS_COMENTARIO AS COM, CO.DT_COMENTARIO AS DTC FROM DB_SCAMBIO.TB_COMENTARIO AS CO INNER JOIN DB_SCAMBIO.TB_USUARIO AS ';
        $sql2 .= ' US ON US.CD_USUARIO = CO.CD_USUARIO WHERE CD_PUBLICACAO = ' . $row1['CDP'];
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
        */
        $output .= '<div class="bg-light p-2">
                  </div>
                </div>
              </div>
            </div>
          </div>';

          echo $output;
    }
}



?>