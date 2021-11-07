<?php

session_start();
if (!isset($_SESSION['id'])) {
    header("./home/home.php");
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scambio</title>
    <link rel="shortcut icon" href="../assets/imgs/logoFundo.png" />
    <link rel="stylesheet" href="css/style.css">
    <link href="../assets/css/style.css" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="login/vendor/bootstrap/css/bootstrap.min.css">


    <style>
        .img-index {
            width: 100px;
            height: 34px;
            margin-left: 20px;
            margin-top: 5px;
        }

        #inpkill {
            margin-top: -30px;
            margin-right: 20px;
        }

        .wrapper {
            height: 88vh;
            margin-top: 20px;
            margin-left: 33px;
        }
    </style>
</head>

<body style="display: block;">
    <div class="container-fluid">
        <a href="../index.php"><img class="img-index" src="../assets/imgs/LOGO_TRANSPARENTE.PNG" alt="logo Scambio" width="110" height="38" style="padding-top: 7.5px;"></a>
        </button>
        <?php
        if (isset($_SESSION['id'])) {
        ?>
            <form action="../logout.php">
                <input id="inpkill" class="inpkill glyphicon buttonLogout" name="DestroySession" type="submit" value="Sair">
            </form>
        <?php
        } else {
            header("Location: index.php");
        }
        ?>
    </div>


    <div class="wrapper">
        <section class="users">
            <?php
            include_once('../config/conexao.php');
            $sql = $pdo->prepare("SELECT * from db_scambio.tb_usuario where cd_usuario = {$_SESSION['id']}");
            $sql->execute();
            if ($sql->rowCount() > 0) {
                $row = $sql->fetch(PDO::FETCH_ASSOC);
            }
            ?>
            <header>
                <div class="content">
                    <img src="https://i1.wp.com/terracoeconomico.com.br/wp-content/uploads/2019/01/default-user-image.png?ssl=1">
                    <div class="details">
                        <span><?= $row['nm_usuario'] ?></span>
                        <p><?= $row['nm_status'] ?></p>
                    </div>
                </div>
            </header>
            <div class="search">
                <span class="text">Selecione um usuário para conversar</span>
                <input type="text" id="name-user">
                <button> <i class="fas fa-search"></i> </button>
            </div>
            <div class="users-list">

            </div>
        </section>

        <section class="chat-area">
            <header>
                <?php
                include('../config/conexao.php');
                if (isset($_GET['user_id'])) {
                    $user_id = $_GET['user_id'];
                } else {
                    $user_id = 47;
                }
                $sql = $pdo->prepare("SELECT * from db_scambio.tb_usuario where cd_usuario = :user ");
                $sql->execute(array(':user' => $user_id));
                if ($sql->rowCount() >= 1) {
                    $row = $sql->fetch(PDO::FETCH_ASSOC);
                }
                ?>
                <img src="https://i1.wp.com/terracoeconomico.com.br/wp-content/uploads/2019/01/default-user-image.png?ssl=1" alt="" srcset="">
                <a href="users-all.php"></a>
                <div class="details">
                    <span><?= $row['nm_usuario'] ?></span>
                    <p><?= $row['nm_status'] ?></p>
                </div>
            </header>
            <div class="chat-box">

            </div>

            <form action="#" class="typing-area" style="width: 90%;">
                <input type="text" name="cd_enviada" value="<?php echo $_SESSION['id']; ?>" hidden>
                <input type="text" name="cd_recebida" value="<?php echo $user_id; ?>" hidden>
                <input type="text" name="message" class="input-field" placeholder="Digite sua mensagem..">
                <button><i class="fab fa-telegram plane"></i></button>
            </form>

        </section>
    </div>
    <?php include('../menu/menu.php') ?>



    <script src="javascript/users.js"></script>
    <script src="javascript/chat.js"></script>
</body>

</html>