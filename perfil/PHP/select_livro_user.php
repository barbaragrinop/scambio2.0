<?php

session_start();

include_once('../../config/conexao.php');

$sql = 'SELECT LV.status_pub as sts,LV.DESCRICAO AS DES,LV.NM_AUTOR AS AUTOR ,LV.CD_LIVRO AS CDLI, LV.foto1 AS FT1, LV.foto2 AS FT2, LV.foto3 AS FT3,LV.NM_LIVRO AS NMLV,LV.NM_GENERO AS genero, LV.DT_PUBLICACAO AS dta, CI.NM_CIDADE AS CITY, U.SG_UF AS UF,LV.DT_PUBLICACAO AS DT FROM DB_SCAMBIO.TB_LIVRO AS LV ';
$sql .= 'INNER JOIN DB_SCAMBIO.TB_USUARIO AS US ON ';
$sql .= 'US.CD_USUARIO = LV.CD_USUARIO ';
$sql .= 'INNER JOIN DB_SCAMBIO.TB_LOGRADOURO AS LO ON ';
$sql .= 'LO.CD_LOGRADOURO = US.CD_LOGRADOURO ';
$sql .= 'INNER JOIN DB_SCAMBIO.TB_BAIRRO AS BA ON ';
$sql .= 'BA.CD_BAIRRO = LO.CD_BAIRRO ';
$sql .= 'INNER JOIN DB_SCAMBIO.TB_CIDADE AS CI ON ';
$sql .= 'BA.CD_CIDADE = CI.CD_CIDADE ';
$sql .= 'INNER JOIN DB_SCAMBIO.TB_UF AS U ON ';
$sql .= 'U.CD_UF = CI.CD_UF WHERE US.CD_USUARIO = ' . $_SESSION['id'];
$SQLANUN = $pdo->prepare($sql);
$SQLANUN->execute();

if($SQLANUN->rowCount() > 0){
    while ($row = $SQLANUN->fetch(PDO::FETCH_ASSOC)) {
        $row['sts'] == 1 ? $status = 'Ativa' : $status = 'Desativa'; 
       $out = '
    <div class="col-xs-12 col-md-6 bootstrap snippets bootdeys">
       <!-- product -->
       <div class="product-content product-wrap clearfix">
           <div class="row">
               <div class="col-md-5 col-sm-12 col-xs-12">
                   <div class="product-image">
                       <img src="../fotos/'. $row['FT1'] .'" alt="194x228" class="img-responsive">
                   </div>
               </div>
               <div class="col-md-7 col-sm-12 col-xs-12 div-inff" style="height: 238px;">
                   <div class="product-deatil">
                       <h5 class="name">
                           <a href="#">
                               ' . $row['NMLV'] . '<span style="font-size: 14px;">'. $row['AUTOR'] . '</span>
                           </a>
                       </h5>
                       <p class="status-container">
                           <span>Status:' . $status . '</span>
                       </p> 
                       <span class="tag1"></span>
                   </div>
                   <div class="description">
                       <p>' . $row['DES'] .'</p>
                   </div>
                   <div class="product-info smart-form">
                       <div class="row">
                           <div class="col-md-6 col-sm-6 col-xs-6">
                               <a href="javascript:void(0);" class="fas fa-trash-alt btn btn-danger"></a>
                           </div>
                           <div class="col-md-4 col-sm-4 col-xs-4">
                               <a href="javascript:void(0);" class="fas fa-edit btn btn-info"></a>
                           </div>
                       </div>
                   </div>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <h3>Adicionar foto das duas pessoas, e se tem match ou não.</h3>
                    </div>
                </div>
            </div>
            <!-- end product -->
        </div>';
          echo $out;
    }
 }


?>