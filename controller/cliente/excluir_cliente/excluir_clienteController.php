<?php
if($_SESSION['codEmpresa'] && $_GET['id_cli']){
    $clientes = new Clientes($pdo);
    $dado = $clientes->excluirCli($_SESSION['codEmpresa'], $_GET['id_cli']);
    if($dado == true){
        $_SESSION['aviso'] = avisoCadEdit('excluído', '../../views/clientes/consulta_cliente.php?dt=1', 'consulta');
    }
}