<?php
require '../../classes/Classes.php';
require '../../classes/Login.php';
$logar = new Login($pdo);
$produtos = new Produtos($pdo);

if(isset($_SESSION['id'])){
    $id = $_SESSION['id'];
}else{
    header("Location: ../../login.php");
}

$eNota = filter_input(INPUT_POST, 'eNota');
$dataVenda = filter_input(INPUT_POST, 'data_venda');
$formaPagamento = filter_input(INPUT_POST, 'forma_pagamento', FILTER_SANITIZE_SPECIAL_CHARS);
$observacao = filter_input(INPUT_POST, 'observacao_nota', FILTER_SANITIZE_SPECIAL_CHARS);
$item = filter_input(INPUT_POST, 'item');
$quantidade = filter_input(INPUT_POST, 'quantidade_nota', FILTER_VALIDATE_INT);
$descricao = filter_input(INPUT_POST, 'descricao_nota', FILTER_SANITIZE_SPECIAL_CHARS);
$vr_unit = filter_input(INPUT_POST, 'vr_unit_nota');
if($eNota){
    if($dataVenda && $formaPagamento && $item && $quantidade && $descricao && $vr_unit){
    $produtos->editar_produto($eNota, $dataVenda, $formaPagamento, $observacao, $item, $quantidade, $descricao, $vr_unit);
    //$produtos->cadastrar_itens($eNota, $item, $quantidade, $descricao, $vr_unit);
    header('Location: editar_produto.php');
    }else{
        echo $eNota, $dataVenda, $formaPagamento,$item, $quantidade, $descricao, $vr_unit;
    }
}else{
    echo 'algo deu errado';
    echo $eNota;
}