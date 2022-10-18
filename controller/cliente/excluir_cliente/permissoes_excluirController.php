<?php
require '../../../classes/classes.php';
require '../../../classes/login.class.php';
if(isset($_GET['action']) && $_GET['action'] == 'Excluir' && isset($_GET['id_cli'])){

}else{
    header("Location: ../../../views/clientes/consulta_cliente.php");
}

$logar = new Login($pdo);
$sessao = $_SESSION['id'];
$logar->verificar($_SESSION['id']);
$id = $_SESSION['id'];

require 'excluir_clienteController.php';
