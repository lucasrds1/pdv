<?php
require '../../classes/produtos.class.php';
require '../../classes/login.class.php';
$logar = new Login();
$produtos = new Produtos();
$cadAdmin = isset($_SESSION['msg_cad_empresa']);
print '<Br>';
if($cadAdmin == 1){echo isset($_SESSION['msg_cad_empresa']) ? $_SESSION['msg_cad_empresa'] : '';}
if(isset($_SESSION['id'])){
    $id = $_SESSION['id'];
    header("Location: index.php");
}
$codEmpresa = $_SESSION['codEmpresa'];
if($logar->valCodEmpresa($codEmpresa) == false){
    header("Location: ../../index.php");
    session_destroy();
}
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');