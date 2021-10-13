<?php

session_start();
if(!isset($_SESSION['id'])) {
    header("./home/home.php");
} 

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="wrapper">
        <section class="users">
            <header>
                <div class="content">
                    <img src="https://i.ytimg.com/vi/hMrYuuOq0Jg/mqdefault.jpg">
                    <div class="details">
                        <span>Barbara Hellen</span>
                        <p>Online</p>
                    </div>
                </div>
            </header>
        </section>
    </div>
</body>
</html>