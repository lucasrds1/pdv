<?php
session_start();
require 'classes/Produtos.php';
require 'classes/Login.php';
require 'classes/Clientes.php';
require 'funcoes.php';

ini_set('error_reporting', E_ALL); // mesmo resultado de: error_reporting(E_ALL);
ini_set('display_errors', 1);

$dbname = "l2solu72_sgc";
$host = "br996.hostgator.com.br";
$user = "l2solu72_sgc";
$password = "cristo13";
//$pdo = '';
try {
    $pdo = new PDO("mysql:dbname=$dbname;host=$host", $user, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    return true;
} catch (PDOException $e) {
    echo $e->getMessage();
    header("Location: error.php");
}

