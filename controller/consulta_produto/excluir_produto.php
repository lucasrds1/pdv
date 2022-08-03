<?php
session_start();
require '../../classes/produtos.class.php';
require '../../classes/login.class.php';
$logar = new Login();
$produtos = new Produtos();

if(isset($_SESSION['id'])){
    $id = $_SESSION['id'];
}else{
    header("Location: ../../login.php");
}

$eNota = filter_input(INPUT_GET, 'consulta_nota');
$item = filter_input(INPUT_GET, 'item');
echo $item;
echo $eNota;
if($eNota != '' && $item > 0){
    $produtos->excluirNota_item($eNota, $item);
    header("Location: consulta_produto.php?consulta_nota=".$eNota."");
}else{
    echo 'nota não existe';
}