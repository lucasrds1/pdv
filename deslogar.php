<?php
require 'classes/Login.php';
$logar = new Login($pdo);

session_start();
if($_SESSION['id']){
    session_destroy();
    header("Location: index.php");
}else{
    header("Location: index.php");
}
//des
?>