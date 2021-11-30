<?php


//Alterar para Servidor = LocalHost
$servidor = "127.0.0.1:3306";
$usuario = "root";
$senha = "";
$banco = "db_scambio";

date_default_timezone_set('America/Sao_Paulo');

try {
    $pdo = new PDO("mysql: dbname='$banco'; host=$servidor;charset=utf8", "$usuario", "$senha");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    echo "Erro ao conectar com o banco de dados! " . $e;
};
