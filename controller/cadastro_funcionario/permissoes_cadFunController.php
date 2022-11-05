<?php
require $_SERVER["DOCUMENT_ROOT"]."/server.php";
$logar = new Login($pdo);
$logar->verificar($_SESSION['id']);
$acesso = $logar->permissao($_SESSION['id']);
$produtos = new Produtos($pdo);
$cadAdmin = isset($_SESSION['msg_cad_empresa']);
print '<Br>';
if($cadAdmin == 1){echo isset($_SESSION['msg_cad_empresa']) ? $_SESSION['msg_cad_empresa'] : '';}
if(isset($_SESSION['id']) && !isset($_SESSION['codEmpresa'])){
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