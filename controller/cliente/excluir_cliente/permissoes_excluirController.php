<?php
require $_SERVER["DOCUMENT_ROOT"]."/server.php";
$logar = new Login($pdo);
$logar->verificar($_SESSION['id']);
$acesso = $logar->permissao($_SESSION['id']);
if(in_array('17', $acesso) || in_array('1', $acesso)){
}else{
    echo "<script>javascript:history.back()</script>";
    $_SESSION['aviso'] = avisoPermissao();
}
if(isset($_GET['action']) && $_GET['action'] == 'Excluir' && isset($_GET['id_cli'])){

}else{
    header("Location: ../../../views/clientes/consulta_cliente.php?dt=1");
}

require 'excluir_clienteController.php';
