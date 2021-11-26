
<!-- UPDATE NAS INFORMAÇÕES DO USUARIO    OBS: AINDA PRECISA DE REAJUSTES -->
<?php
  session_start();
  include('../../config/conexao.php');


  if (isset($_FILES['newimage'])) {
    $extensao1 = strtolower(substr($_FILES['newimage']['name'], -4));
    $file1 = md5(time()) . $extensao1 ?? '';
    if($extensao1 != ".jpg" && ".png"){
      $file1 = "";
    }
    $diretorio = '../../fotosuser/';

    move_uploaded_file($_FILES['newimage']['tmp_name'], $diretorio.$file1);
} 
 if(isset($_POST['newnome']) && !empty($_POST['newnome']) && isset($_POST['newemail']) && !empty($_POST['newemail']) && isset($_POST['newborn']) && !empty($_POST['newborn']))
  {
    if(isset($file1) && !empty($file1)){
      $newnome = $_POST['newnome'];
      $newemail = $_POST['newemail'];
      $newborn = $_POST['newborn'];
      $codigo = $_SESSION['id'];

      $edit = 'UPDATE DB_SCAMBIO.TB_USUARIO AS US set NM_USUARIO = "'. $newnome .'", NM_EMAIL = "'. $newemail . '",DT_NASCIMENTO = "'. $newborn . '", DS_IMGP = "'. $file1 .'" WHERE CD_USUARIO = ' . $codigo;
      $updateedit = $pdo->prepare($edit);
      $updateedit->execute();
    }
    else{
      $newnome = $_POST['newnome'];
      $newemail = $_POST['newemail'];
      $newborn = $_POST['newborn'];
      $codigo = $_SESSION['id'];

      $edit = 'UPDATE DB_SCAMBIO.TB_USUARIO AS US set NM_USUARIO = "'. $newnome .'", NM_EMAIL = "'. $newemail . '",DT_NASCIMENTO = "'. $newborn . '" WHERE CD_USUARIO = ' . $codigo;
      $updateedit = $pdo->prepare($edit);
      $updateedit->execute();
    }
  } 
?>