<?php
ini_set('error_reporting', E_ALL); // mesmo resultado de: error_reporting(E_ALL);
ini_set('display_errors', 1);

$dbname = "crud-vendas";
$host = "localhost";
$user = "root";
$password = "";
//$pdo = '';
try {
    $pdo = new PDO("mysql:dbname=$dbname;host=$host", $user, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    return true;
} catch (PDOException $e) {
    echo $e->getMessage();
    header("Location: error.php");
}
