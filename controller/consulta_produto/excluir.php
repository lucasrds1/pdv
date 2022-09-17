<?php
require '../../classes/produtos.class.php';
require '../../classes/login.class.php';
$logar = new Login();
$produtos = new Produtos();

if(isset($_SESSION['id'])){
    $id = $_SESSION['id'];
}else{
    header("Location: ../../login.php");
}

$eNota = filter_input(INPUT_GET, 'eNota');
if($eNota != ''){
    $produtos->excluirNota($eNota);
    header("Location: consulta_produto.php");
}else{
    echo 'nota não existe';
}