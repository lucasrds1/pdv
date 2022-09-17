<?php
require 'classes/login.class.php';
$logar = new Login();

session_start();
if($_SESSION['id']){
    session_destroy();
    header("Location: index.php");
}else{
    header("Location: index.php");
}
//des
?>