<?php
session_start();
if (isset($_SESSION['id'])) {
?>
    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <title>Scambio | Mensagem</title>


        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" type="text/css" href="login/vendor/bootstrap/css/bootstrap.min.css">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link href="../assets/css/style.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/message.css">

        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="shortcut icon" href="../../assets/imgs/logoFundo.png" />

        <style>
            span.name {
                font-size: 14px;
            }

            span.time {
                font-size: 12px !important;
                margin-left: 10px;
            }

            .chat-name {
                font-size: 13px !important;
            }

            .chat-hour {
                font-size: 12px !important;
            }

            .fa-check-circle {
                padding-left: 3px;
            }
        </style>

    </head>

    <body style="background-color: #F2EEE8;">
        <nav class="secondaryColor navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand navbar-brand-top" href="../home/home.php">
                        <img class="img-index" src="../assets/imgs/logo1.PNG" alt="logo Scambio" width="110" height="38">
                    </a>
                </div>
                <div class="collapse navbar-collapse" style="background-color: #F2EEE8;" id="myNavbar">
                    <ul class="textCor nav navbar-nav">
                        <li><a class="links-nav-index" href="../home/home.php">Home</a></li>
                        <li><a class="links-nav-index" href="../perfil.php">Perfil</a></li>
                        <li><a class="links-nav-index" href="../index.php#ajuda">Ajuda</a></li>
                    </ul>
                    <?php
                    if (isset($_SESSION['id'])) {
                    ?>
                        <!-- Modificar este Botão  ----  Botão Logout -->
                        <form action="logout.php">
                            <input id="inpkill" class="inpkill glyphicon buttonLogout" name="DestroySession" type="submit" value="Sair">
                        </form>
                    <?php
                    } else {
                    ?>
                        <ul class="textCor nav navbar-nav navbar-right">
                            <li><a class="links-nav-index" href="cadastro/cadastro.php"><span class="glyphicon glyphicon-user "></span> Cadastre-se</a></li>
                            <li><a class="links-nav-index" href="login/login.php"><span class="glyphicon glyphicon-log-in"></span> Entrar</a></li>
                        </ul>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </nav>

        <div class="container">

            <!-- Page header start -->
            <div class="page-title">
                <div class="row gutters">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <h5 class="title">Chat App</h5>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12"> </div>
                </div>
            </div>
            <!-- Page header end -->

            <!-- Content wrapper start -->
            <div class="content-wrapper">

                <!-- Row start -->
                <div class="row gutters">

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                        <div class="card m-0">

                            <!-- Row start -->
                            <div class="row no-gutters">
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-3 col-3">
                                    <div class="users-container">
                                        <div class="chat-search-box">
                                            <div class="input-group">
                                                <input class="form-control" placeholder="Search">
                                                <div class="input-group-btn">
                                                    <button type="button" class="btn btn-info">
                                                        <i class="fa fa-search"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="users">
                                            <li class="person" data-chat="person1">
                                                <div class="user">
                                                    <img src="https://www.bootdey.com/img/Content/avatar/avatar3.png" alt="Retail Admin">
                                                    <span class="status busy"></span>
                                                </div>
                                                <p class="name-time">
                                                    <span class="name">Steve Bangalter</span>
                                                    <span class="time">15/02/2019</span>
                                                </p>
                                            </li>
                                            <li class="person" data-chat="person1">
                                                <div class="user">
                                                    <img src="https://www.bootdey.com/img/Content/avatar/avatar1.png" alt="Retail Admin">
                                                    <span class="status offline"></span>
                                                </div>
                                                <p class="name-time">
                                                    <span class="name">Steve Bangalter</span>
                                                    <span class="time">15/02/2019</span>
                                                </p>
                                            </li>
                                            <li class="person active-user" data-chat="person2">
                                                <div class="user">
                                                    <img src="https://www.bootdey.com/img/Content/avatar/avatar3.png" alt="Retail Admin">
                                                    <span class="status away"></span>
                                                </div>
                                                <p class="name-time">
                                                    <span class="name">Emily Russell</span>
                                                    <span class="time">12/02/2019</span>
                                                </p>
                                            </li>
                                            <li class="person" data-chat="person3">
                                                <div class="user">
                                                    <img src="https://www.bootdey.com/img/Content/avatar/avatar3.png" alt="Retail Admin">
                                                    <span class="status busy"></span>
                                                </div>
                                                <p class="name-time">
                                                    <span class="name">Jessica Larson</span>
                                                    <span class="time">11/02/2019</span>
                                                </p>
                                            </li>
                                            <li class="person" data-chat="person4">
                                                <div class="user">
                                                    <img src="https://www.bootdey.com/img/Content/avatar/avatar4.png" alt="Retail Admin">
                                                    <span class="status offline"></span>
                                                </div>
                                                <p class="name-time">
                                                    <span class="name">Lisa Guerrero</span>
                                                    <span class="time">08/02/2019</span>
                                                </p>
                                            </li>
                                            <li class="person" data-chat="person5">
                                                <div class="user">
                                                    <img src="https://www.bootdey.com/img/Content/avatar/avatar5.png" alt="Retail Admin">
                                                    <span class="status away"></span>
                                                </div>
                                                <p class="name-time">
                                                    <span class="name">Michael Jordan</span>
                                                    <span class="time">05/02/2019</span>
                                                </p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-9 col-9">
                                    <div class="selected-user">
                                        <span>To: <span class="name">Emily Russell</span></span>
                                    </div>
                                    <div class="chat-container">
                                        <ul class="chat-box chatContainerScroll">
                                            <li class="chat-left">
                                                <div class="chat-avatar">
                                                    <img src="https://www.bootdey.com/img/Content/avatar/avatar3.png" alt="Retail Admin">
                                                    <div class="chat-name">Russell</div>
                                                </div>
                                                <div class="chat-text">Oi!
                                                    <br>Tudo bem?
                                                </div>
                                                <div class="chat-hour">08:55 <span class="fa fa-check-circle"></span></div>
                                            </li>
                                            <li class="chat-right">
                                                <div class="chat-hour">08:56 <span class="fa fa-check-circle"></span></div>
                                                <div class="chat-text">Ii, Russell
                                                    <br> Tudo sim e com você?
                                                </div>
                                                <div class="chat-avatar">
                                                    <img src="https://www.bootdey.com/img/Content/avatar/avatar5.png" alt="Retail Admin">
                                                    <div class="chat-name">Marcos</div>
                                                </div>
                                            </li>
                                            <li class="chat-left">
                                                <div class="chat-avatar">
                                                    <img src="https://www.bootdey.com/img/Content/avatar/avatar3.png" alt="Retail Admin">
                                                    <div class="chat-name">Russell</div>
                                                </div>
                                                <div class="chat-text">Tudo bem também!
                                                    <br>o livro A culpa é das estrelas ainda está disponivel?
                                                </div>
                                                <div class="chat-hour">08:57 <span class="fa fa-check-circle"></span></div>
                                            </li>
                                            <li class="chat-right">
                                                <div class="chat-hour">08:56 <span class="fa fa-check-circle"></span></div>
                                                <div class="chat-text">Está sim.
                                                    <br>Ele apenas esta com marcas de uso!
                                                </div>
                                                <div class="chat-avatar">
                                                    <img src="https://www.bootdey.com/img/Content/avatar/avatar5.png" alt="Retail Admin">
                                                    <div class="chat-name">Marcos</div>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="form-group mt-3 mb-0">
                                            <textarea class="form-control" rows="3" placeholder="Type your message here..."></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Row end -->
                        </div>

                    </div>

                </div>
                <!-- Row end -->

            </div>
            <!-- Content wrapper end -->

        </div>

        <!--===============================================================================================-->
        <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
        <!--===============================================================================================-->
        <script src="vendor/bootstrap/js/popper.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
        <!--===============================================================================================-->
        <script src="vendor/select2/select2.min.js"></script>
        <!--===============================================================================================-->
        <script src="vendor/tilt/tilt.jquery.min.js"></script>
        <script>
            $('.js-tilt').tilt({
                scale: 1.1
            })
        </script>
        <!--===============================================================================================-->
        <script src="js/main.js"></script>
    </body>

    </html>
<?php
} else {
    header('Location: ../login/login.php');
}
?>