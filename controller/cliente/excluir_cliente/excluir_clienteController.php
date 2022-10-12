<?php
if($_SESSION['codEmpresa'] && $_GET['id_cli']){
    $clientes = new Clientes();
    $clientes->excluirCli($_SESSION['codEmpresa'], $_GET['id_cli']);
}