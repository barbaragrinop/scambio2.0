<?php
session_start();
include_once './config/conexao.php';

if (!isset($_SESSION['id'])) {
    header("Location: index.php");
}

$id = $_SESSION['id'];


$sql = $pdo->prepare("SELECT * from db_scambio.tb_usuario
                        inner join db_scambio.tb_logradouro
                        on tb_usuario.cd_logradouro = tb_logradouro.cd_logradouro
                        inner join db_scambio.tb_bairro 
                        on tb_bairro.cd_bairro = tb_logradouro.cd_bairro
                        inner join db_scambio.tb_cidade
                        on tb_cidade.cd_cidade = tb_bairro.cd_cidade
                        inner join db_scambio.tb_uf
                        on tb_uf.cd_uf = tb_cidade.cd_uf
                        where cd_usuario = :id");
$sql->execute(array(':id' => $id));
if ($sql->rowCount() >= 1) {
    $row = $sql->fetch((PDO::FETCH_ASSOC));
}


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Scambio | Perfil</title>
    <link rel="shortcut icon" href="assets/imgs/logoFundo.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./home/style.css">
    <link rel="stylesheet" href="./fab/fab.css">


    <style>
        #inpkill {
            margin-right: 9px;
            margin-top: -25px;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <a href="index.php"><img class="img-index" src="./assets/imgs/LOGO_TRANSPARENTE.PNG" alt="logo Scambio" width="104" height="30" style="margin-top: 9px;"></a>
        </button>
        <?php
        if (isset($_SESSION['id'])) {
        ?>
            <form action="./logout.php">
                <input style="font-size: 14px;" id="inpkill" class="inpkill glyphicon buttonLogout" name="DestroySession" type="submit" value="Sair">
            </form>
        <?php
        } else {
            header("Location: index.php");
        }
        ?>
    </div>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <div class="container bootstrap snippets bootdey">
        <div class="row">
            <div class="profile-nav col-md-3">
                <div class="panel">
                    <div class="user-heading round">
                        <a href="#">
                            <img src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="">
                        </a>
                        <h1><?= $row['nm_usuario'] ?></h1>
                    </div>

                    <ul class="nav nav-pills nav-stacked">
                        <li class="active"><a href="#"> <i class="fa fa-user"></i> Perfil</a></li>
                        <li><a href="#"> <i class="fa fa-calendar"></i>,Match <span class="label label-warning pull-right r-activity">9</span></a></li>
                        <li><a href="#"> <i class="fa fa-edit"></i>Editar Perfil</a></li>
                    </ul>
                </div>
            </div>
            <div class="profile-info col-md-9">
                <div class="panel">
                    <div class="panel-body bio-graph-info">
                        <h1>Biografia</h1>
                        <div class="row">
                            <div class="bio-row">
                                <p><span>Nome:</span><?= $row['nm_usuario'] ?></p>
                            </div>
                            <div class="bio-row">
                                <p><span>Estado:</span><?= $row['sg_uf'] ?></p>
                            </div>
                            <div class="bio-row">
                                <p><span>Cidade:</span><?= $row['nm_cidade'] ?></p>
                            </div>
                            <div class="bio-row">
                                <p><span>Aniversario:</span><?= date('d/m/Y', strtotime(($row['dt_nascimento']))) ?></p>
                            </div>
                            <div class="bio-row">
                                <p><span>Status:</span><?= $_SESSION['status'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
    <div class="container" style="margin-left: -27px; width: 107%;">
    <div class="col-xs-12 col-md-6 bootstrap snippets bootdeys">
	<!-- product -->
	<div class="product-content product-wrap clearfix">
		<div class="row">
				<div class="col-md-5 col-sm-12 col-xs-12">
					<div class="product-image"> 
						<img src="assets/imgs/livrover.jpg" alt="194x228" class="img-responsive">  
					</div>
				</div>
				<div class="col-md-7 col-sm-12 col-xs-12">
				<div class="product-deatil">
						<h5 class="name">
							<a href="#">
								Livro Verde <span>Autor Verde</span>
							</a>
						</h5>
						<p class="status-container">
							<span>status: ativo</span>
						</p>
						<span class="tag1"></span> 
				</div>
				<div class="description">
					<p>Proin in ullamcorper lorem. Maecenas eu ipsum </p>
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
		</div>
	</div>
	<!-- end product -->
</div>
<div class="col-xs-12 col-md-6 bootstrap snippets bootdeys">
	<!-- product -->
	<div class="product-content product-wrap clearfix">
		<div class="row">
				<div class="col-md-5 col-sm-12 col-xs-12">
					<div class="product-image"> 
						<img src="assets/imgs/livrozul.jpg" alt="194x228" class="img-responsive"> 
					</div>
				</div>
				<div class="col-md-7 col-sm-12 col-xs-12">
				<div class="product-deatil">
						<h5 class="name">
							<a href="#">
								Livro Azul <span>Autor Azul</span>
							</a>
						</h5>
						<p class="status-container">
							<span>status: match</span>
						</p>
						<span class="tag1"></span> 
				</div>
				<div class="description">
					<p>Proin in ullamcorper lorem. Maecenas eu ipsum </p>
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
		</div>
	</div>
	<!-- end product -->
</div>
<div class="col-xs-12 col-md-6 bootstrap snippets bootdeys">
	<!-- product -->
	<div class="product-content product-wrap clearfix">
		<div class="row">
				<div class="col-md-5 col-sm-12 col-xs-12">
					<div class="product-image"> 
						<img src="assets/imgs/acabana.jpg" alt="194x228" class="img-responsive"> 
					</div>
				</div>
				<div class="col-md-7 col-sm-12 col-xs-12">
				<div class="product-deatil">
						<h5 class="name">
							<a href="#">
								A Cabana <span>Desconhecido</span>
							</a>
						</h5>
						<p class="status-container">
							<span>status: ativo</span>
						</p>
						<span class="tag1"></span> 
				</div>
				<div class="description">
					<p>Proin in ullamcorper lorem. Maecenas eu ipsum </p>
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
		</div>
	</div>
	<!-- end product -->
</div>
<div class="col-xs-12 col-md-6 bootstrap snippets bootdeys">
	<!-- product -->
	<div class="product-content product-wrap clearfix">
		<div class="row">
				<div class="col-md-5 col-sm-12 col-xs-12">
					<div class="product-image"> 
						<img src="assets/imgs/aculpaedasestrelas.jpg" alt="194x228" class="img-responsive"> 
					</div>
				</div>
				<div class="col-md-7 col-sm-12 col-xs-12">
				<div class="product-deatil">
						<h5 class="name">
							<a href="#">
								A Culpa E Das Estrelas <span>John Green</span>
							</a>
						</h5>
						<p class="status-container">
							<span>status: ativo</span>
						</p>
						<span class="tag1"></span> 
				</div>
				<div class="description">
					<p>Proin in ullamcorper lorem. Maecenas eu ipsum </p>
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
		</div>
	</div>
	<!-- end product -->
</div>
</div>            </div>
        </div>

        <?php include('./menu/menu.php') ?>


        <style type="text/css">
            body {
                color: #797979;
                font-family: 'Open Sans', sans-serif;
                padding: 0px !important;
                margin: 0px !important;
                font-size: 13px;
                text-rendering: optimizeLegibility;
                -webkit-font-smoothing: antialiased;
                -moz-font-smoothing: antialiased;
                background-image: linear-gradient(to right, #f2eee8, #d4c1a5, #f2eee8);
            }

.product-content {
    border: 2px solid #dfe5e9;
    margin-bottom: 20px;
    margin-top: 12px;
    background: #fff;
    padding: 4px;
        -webkit-box-shadow: 0 1px 4px 0 rgba(0,0,0,0.37);
    box-shadow: 0 1px 4px 0 rgba(0,0,0,0.37);
}

.product-content .carousel-control.left {
    margin-left: 0
}

.product-content .product-image {
    background-color: #fff;
    display: block;
    min-height: 238px;
    overflow: hidden;
    position: relative
}

.product-content .product-deatil {
    border-bottom: 1px solid #dfe5e9;
    padding-bottom: 17px;
    padding-left: 16px;
    padding-top: 16px;
    position: relative;
    background: #fff
}

.product-content .product-deatil h5 a {
    color: #2f383d;
    font-size: 20px;
    line-height: 19px;
    text-decoration: none;
    padding-left: 0;
    margin-left: 0
}

.product-content .product-deatil h5 a span {
    color: #9aa7af;
    display: block;
    font-size: 13px
}

.product-content .product-deatil span.tag1 {
    border-radius: 50%;
    color: #fff;
    font-size: 15px;
    height: 50px;
    padding: 13px 0;
    position: absolute;
    right: 10px;
    text-align: center;
    top: 10px;
    width: 50px
}

.product-content .product-deatil span.sale {
    background-color: #21c2f8
}

.product-content .product-deatil span.discount {
    background-color: #71e134
}

.product-content .product-deatil span.hot {
    background-color: #fa9442
}

.product-content .description {
    font-size: 12.5px;
    line-height: 20px;
    padding: 10px 14px 16px 19px;
    background: #fff
}

.product-content .product-info {
    padding: 11px 19px 10px 20px
}

.product-content .product-info a.add-to-cart {
    color: #2f383d;
    font-size: 13px;
    padding-left: 16px
}

.product-content name.a {
    padding: 5px 10px;
    margin-left: 16px
}

.product-info.smart-form .btn {
    padding: 6px 20px;
    margin-left: 5px;
    margin-top: -10px
}

.product-entry .product-deatil {
    border-bottom: 1px solid #dfe5e9;
    padding-bottom: 17px;
    padding-left: 16px;
    padding-top: 16px;
    position: relative
}

.product-entry .product-deatil h5 a {
    color: #2f383d;
    font-size: 15px;
    line-height: 19px;
    text-decoration: none
}

.product-entry .product-deatil h5 a span {
    color: #9aa7af;
    display: block;
    font-size: 13px
}

.load-more-btn {
    background-color: #21c2f8;
    border-bottom: 2px solid #037ca5;
    border-radius: 2px;
    border-top: 2px solid #0cf;
    margin-top: 20px;
    padding: 9px 0;
    width: 100%
}

.product-block .product-deatil p.status-container span,
.product-content .product-deatil p.status-container span,
.product-entry .product-deatil p.status-container span,
.shipping table tbody tr td p.status-container span,
.shopping-items table tbody tr td p.status-container span {
    color: #020202;
    font-family: Lato, sans-serif;
    font-size: 16px;
    line-height: 20px
}

.product-info.smart-form .rating label {
    margin-top: 0
}

.product-wrap .product-image span.tag2 {
    position: absolute;
    top: 10px;
    right: 10px;
    width: 36px;
    height: 36px;
    border-radius: 50%;
    padding: 10px 0;
    color: #fff;
    font-size: 11px;
    text-align: center
}

.product-wrap .product-image span.sale {
    background-color: #57889c
}

.product-wrap .product-image span.hot {
    background-color: #a90329
}

.shop-btn {
    position: relative
}

.shop-btn>span {
    background: #a90329;
    display: inline-block;
    font-size: 10px;
    box-shadow: inset 1px 1px 0 rgba(0, 0, 0, .1), inset 0 -1px 0 rgba(0, 0, 0, .07);
    font-weight: 700;
    border-radius: 50%;
    padding: 2px 4px 3px!important;
    text-align: center;
    line-height: normal;
    width: 19px;
    top: -7px;
    left: -7px
}

.description-tabs {
    padding: 30px 0 5px!important
}

.description-tabs .tab-content {
    padding: 10px 0
}

.product-deatil {
    padding: 30px 30px 50px
}

.product-deatil hr+.description-tabs {
    padding: 0 0 5px!important
}

.product-deatil .carousel-control.left,
.product-deatil .carousel-control.right {
    background: none!important
}

.product-deatil .glyphicon {
    color: #3276b1
}

.product-deatil .product-image {
    border-right: 0px solid #fff !important
}

.product-deatil .name {
    margin-top: 0;
    margin-bottom: 0
}

.product-deatil .name small {
    display: block
}

.product-deatil .name a {
    margin-left: 0
}

.product-deatil .status-container {
    font-size: 24px;
    margin: 0;
    font-weight: 300
}

.product-deatil .status-container small {
    font-size: 12px
}

.product-deatil .fa-2x {
    font-size: 16px!important
}

.product-deatil .fa-2x>h5 {
    font-size: 12px;
    margin: 0
}

.product-deatil .fa-2x+a,
.product-deatil .fa-2x+a+a {
    font-size: 13px
}

.product-deatil .certified {
    margin-top: 10px
}

.product-deatil .certified ul {
    padding-left: 0
}

.product-deatil .certified ul li:not(first-child) {
    margin-left: -3px
}

.product-deatil .certified ul li {
    display: inline-block;
    background-color: #f9f9f9;
    padding: 13px 19px
}

.product-deatil .certified ul li:first-child {
    border-right: none
}

.product-deatil .certified ul li a {
    text-align: left;
    font-size: 12px;
    color: #6d7a83;
    line-height: 16px;
    text-decoration: none
}

.product-deatil .certified ul li a span {
    display: block;
    color: #21c2f8;
    font-size: 13px;
    font-weight: 700;
    text-align: center
}

.product-deatil .message-text {
    width: calc(100% - 70px)
}

@media only screen and (min-width:1024px) {
    .product-content div[class*=col-md-4] {
        padding-right: 0
    }
    .product-content div[class*=col-md-8] {
        padding: 0 13px 0 0
    }
    .product-wrap div[class*=col-md-5] {
        padding-right: 0
    }
    .product-wrap div[class*=col-md-7] {
        padding: 0 13px 0 0
    }
    .product-content .product-image {
        border-right: 1px solid #dfe5e9
    }
    .product-content .product-info {
        position: relative
    }
}
          
            .profile-nav,
            .profile-info {
                margin-top: 30px;
            }

            .profile-nav .user-heading {
                background: #d4c1a5;
                color: #fff;
                border-radius: 4px 4px 0 0;
                -webkit-border-radius: 4px 4px 0 0;
                padding: 30px;
                text-align: center;
            }

            .profile-nav .user-heading.round a {
                border-radius: 50%;
                -webkit-border-radius: 50%;
                border: 10px solid rgba(255, 255, 255, 0.3);
                display: inline-block;
            }

            .profile-nav .user-heading a img {
                width: 112px;
                height: 112px;
                border-radius: 50%;
                -webkit-border-radius: 50%;
            }

            .profile-nav .user-heading h1 {
                font-size: 22px;
                font-weight: 300;
                margin-bottom: 5px;
            }

            .profile-nav .user-heading p {
                font-size: 12px;
            }

            .profile-nav ul {
                margin-top: 1px;
            }

            .profile-nav ul>li {
                border-bottom: 1px solid #ebeae6;
                margin-top: 0;
                line-height: 30px;
            }

            .profile-nav ul>li:last-child {
                border-bottom: none;
            }

            .profile-nav ul>li>a {
                border-radius: 0;
                -webkit-border-radius: 0;
                color: #89817f;
                border-left: 5px solid #fff;
            }

            .profile-nav ul>li>a:hover,
            .profile-nav ul>li>a:focus,
            .profile-nav ul li.active a {
                background: #f8f7f5 !important;
                border-left: 5px solid #d4c1a5;
                ;
                color: #89817f !important;
            }

            .profile-nav ul>li:last-child>a:last-child {
                border-radius: 0 0 4px 4px;
                -webkit-border-radius: 0 0 4px 4px;
            }

            .profile-nav ul>li>a>i {
                font-size: 16px;
                padding-right: 10px;
                color: #bcb3aa;
            }

            .r-activity {
                margin: 6px 0 0;
                font-size: 12px;
            }


            .p-text-area,
            .p-text-area:focus {
                border: none;
                font-weight: 300;
                box-shadow: none;
                color: #c3c3c3;
                font-size: 16px;
            }

            .profile-info .panel-footer {
                background-color: #f8f7f5;
                border-top: 1px solid #e7ebee;
            }

            .profile-info .panel-footer ul li a {
                color: #7a7a7a;
            }

            .bio-graph-heading {
                background: #fbc02d;
                color: #fff;
                text-align: center;
                font-style: italic;
                padding: 40px 110px;
                border-radius: 4px 4px 0 0;
                -webkit-border-radius: 4px 4px 0 0;
                font-size: 16px;
                font-weight: 300;
            }

            .bio-graph-info {
                color: #89817e;
            }

            .bio-graph-info h1 {
                font-size: 22px;
                font-weight: 300;
                margin: 0 0 20px;
            }

            .bio-row {
                width: 50%;
                float: left;
                margin-bottom: 10px;
                padding: 0 15px;
            }

            .label-warning {
                background-color: #d4c1a5;
            }

            .bio-row p span {
                width: 100px;
                display: inline-block;
            }

            .bio-chart,
            .bio-desk {
                float: left;
            }

            .bio-chart {
                width: 40%;
            }

            .bio-desk {
                width: 60%;
            }

            .bio-desk h4 {
                font-size: 15px;
                font-weight: 400;
            }

            .bio-desk h4.terques {
                color: #4CC5CD;
            }

            .bio-desk h4.red {
                color: #e26b7f;
            }

            .bio-desk h4.green {
                color: #97be4b;
            }

            .bio-desk h4.purple {
                color: #caa3da;
            }

            .file-pos {
                margin: 6px 0 10px 0;
            }

            .profile-activity h5 {
                font-weight: 300;
                margin-top: 0;
                color: #c3c3c3;
            }

            .summary-head {
                background: #ee7272;
                color: #fff;
                text-align: center;
                border-bottom: 1px solid #ee7272;
            }

            .summary-head h4 {
                font-weight: 300;
                text-transform: uppercase;
                margin-bottom: 5px;
            }

            .summary-head p {
                color: rgba(255, 255, 255, 0.6);
            }

            ul.summary-list {
                display: inline-block;
                padding-left: 0;
                width: 100%;
                margin-bottom: 0;
            }

            ul.summary-list>li {
                display: inline-block;
                width: 19.5%;
                text-align: center;
            }

            ul.summary-list>li>a>i {
                display: block;
                font-size: 18px;
                padding-bottom: 5px;
            }

            ul.summary-list>li>a {
                padding: 10px 0;
                display: inline-block;
                color: #818181;
            }

            ul.summary-list>li {
                border-right: 1px solid #eaeaea;
            }

            ul.summary-list>li:last-child {
                border-right: none;
            }

            .activity {
                width: 100%;
                float: left;
                margin-bottom: 10px;
            }

            .activity.alt {
                width: 100%;
                float: right;
                margin-bottom: 10px;
            }

            .activity span {
                float: left;
            }

            .activity.alt span {
                float: right;
            }

            .activity span,
            .activity.alt span {
                width: 45px;
                height: 45px;
                line-height: 45px;
                border-radius: 50%;
                -webkit-border-radius: 50%;
                background: #eee;
                text-align: center;
                color: #fff;
                font-size: 16px;
            }

            .activity.terques span {
                background: #8dd7d6;
            }

            .activity.terques h4 {
                color: #8dd7d6;
            }

            .activity.purple span {
                background: #b984dc;
            }

            .activity.purple h4 {
                color: #b984dc;
            }

            .activity.blue span {
                background: #90b4e6;
            }

            .activity.blue h4 {
                color: #90b4e6;
            }

            .activity.green span {
                background: #aec785;
            }

            .activity.green h4 {
                color: #aec785;
            }

            .activity h4 {
                margin-top: 0;
                font-size: 16px;
            }

            .activity p {
                margin-bottom: 0;
                font-size: 13px;
            }

            .activity .activity-desk i,
            .activity.alt .activity-desk i {
                float: left;
                font-size: 18px;
                margin-right: 10px;
                color: #bebebe;
            }

            .activity .activity-desk {
                margin-left: 70px;
                position: relative;
            }

            .activity.alt .activity-desk {
                margin-right: 70px;
                position: relative;
            }

            .activity.alt .activity-desk .panel {
                float: right;
                position: relative;
            }

            .activity-desk .panel {
                background: #F4F4F4;
                display: inline-block;
            }


            .activity .activity-desk .arrow {
                border-right: 8px solid #F4F4F4 !important;
            }

            .activity .activity-desk .arrow {
                border-bottom: 8px solid transparent;
                border-top: 8px solid transparent;
                display: block;
                height: 0;
                left: -7px;
                position: absolute;
                top: 13px;
                width: 0;
            }

            .activity-desk .arrow-alt {
                border-left: 8px solid #F4F4F4 !important;
            }

            .activity-desk .arrow-alt {
                border-bottom: 8px solid transparent;
                border-top: 8px solid transparent;
                display: block;
                height: 0;
                right: -7px;
                position: absolute;
                top: 13px;
                width: 0;
            }

            .activity-desk .album {
                display: inline-block;
                margin-top: 10px;
            }

            .activity-desk .album a {
                margin-right: 10px;
            }

            .activity-desk .album a:last-child {
                margin-right: 0px;
            }
        </style>



        <script src="javascript/users.js"></script>
        <script src="javascript/chat.js"></script>
        <script type="text/javascript">

        </script>
</body>

</html>