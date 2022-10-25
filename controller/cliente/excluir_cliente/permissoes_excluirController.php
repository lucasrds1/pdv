<?php
require '../../../classes/Classes.php';
require '../../../classes/Login.php';
if(in_array('17', $acesso) || in_array('1', $acesso)){
}else{
    echo "<script>javascript:history.back()</script>";
    $_SESSION['aviso'] = avisoPermissao();
}
if(isset($_GET['action']) && $_GET['action'] == 'Excluir' && isset($_GET['id_cli'])){

}else{
    header("Location: ../../../views/clientes/consulta_cliente.php?dt=1");
}

$logar = new Login($pdo);
$sessao = $_SESSION['id'];
$logar->verificar($_SESSION['id']);
$id = $_SESSION['id'];

require 'excluir_clienteController.php';
