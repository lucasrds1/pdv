<?php
require '../../views/partials/header/header.php';
require '../../views/adicionar_produto/adicionar_produto.php';
?>


<?php

$eNota = filter_input(INPUT_POST, 'eNota'); //pega o campo pelo get
$quantidade = filter_input(INPUT_POST, 'quantidade');
$descricao = filter_input(INPUT_POST, 'descricao');
$vr_unit = filter_input(INPUT_POST, 'vr_unit');

if($eNota && $quantidade && $descricao && $vr_unit){//se nao estiver vazio
    
    try{
        $pdo = new PDO("mysql:dbname=crud_vendas;host=localhost", "root". "");//conexão
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
        echo "ERRO: ".$e->getMessage();
        exit;
    }
    //$sql = "SELECT * FROM itens_nota WHERE eNota = :eNota";
    $sql = "INSERT INTO itens_nota (eNota, quantidade, descricao, vr_unit) VALUES (:eNota, :quantidade, :descricao, :vr_unit)";
    $sql = $pdo->prepare($sql);
    $sql->bindValue(':eNota', $eNota);
    $sql->bindValue(':quantidade', $quantidade);
    $sql->bindValue(':descricao', $descricao);
    $sql->bindValue(':vr_unit', $vr_unit);
    $sql->execute();
    echo '<div class="cadRealizado" style="margin-right: 60px">cadastro realizado!</div>';
}
?>