<?php
require '../../classes/classes.php';
require '../../classes/login.class.php';
$logar = new Login($pdo);
$produtos = new Produtos($pdo);

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