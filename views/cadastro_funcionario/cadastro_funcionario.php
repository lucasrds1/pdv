<?php
require '../../classes/produtos.class.php';
require '../../classes/login.class.php';
$logar = new Login();
$produtos = new Produtos();
$cadAdmin = isset($_SESSION['msg_cad_empresa']);
print '<Br>';
if($cadAdmin == 1){echo isset($_SESSION['msg_cad_empresa']) ? $_SESSION['msg_cad_empresa'] : '';}
if(isset($_SESSION['id'])){
    $id = $_SESSION['id'];
    header("Location: index.php");
}
echo $_SESSION['codEmpresa'];

setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
//FINAL DO CAD FUNCIONARIO QUANDO CADASTRAR, FAZER SESSION DESTROY E IR PARA O LOGIN
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Vendas</title>
    <link href="../../assets/styles/style_header_footer/header.css" rel="stylesheet">
    <link href="../../assets/styles/style_header_footer/footer.css" rel="stylesheet">
    <link href="../../assets/styles/style_cadastro_produto/cadastro_produto.css" rel="stylesheet">
    <link href="../../assets/styles/style_consulta_produto/consulta_produto.css" rel="stylesheet">
    <link href="../../assets/styles/style_botoes_avisos.css" rel="stylesheet">
</head>

<?php

