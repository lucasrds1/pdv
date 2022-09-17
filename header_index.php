<?php
require 'classes/login.class.php';
require 'classes/produtos.class.php';
$produtos = new Produtos();
$logar = new Login();

$sessao = $_SESSION['id'];
$logar->verificar($sessao);
$id = $sessao;

setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
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
<body>

    <?php
    if(isset($id)){
        $dados = $logar->getNomeById($id);
        if($dados !== false){
            $nome = $dados['nome'];    
        }else{
            $nome = 'Sem nome';
        }
    }
    ?>

    <aside>
    <div class="container_menu">
        <!-- <a href="../../index.php"><h1>MENU</h1></a> -->
        <div class="menu">
            <div class="oi_login"><span>Olá, <?=$nome?>, como vai?</span>
                <a href="deslogar.php" class="des">Deslogar</a>
        </div>
        <div class="menu_botoes">
            <ul>
                <a href="../../index.php"><li>Inicio</li></a>
                <a href="../../controller/cadastrar_produto/cadastrar_produto.php"><li>Cadastro</li></a>
                <a href="../../controller/editar_produto/editar_produto.php"><li>Editar</li></a>
                <a href="../../controller/adicionar_produto/adicionar_produto.php"><li>Adicionar Produto</li></a>
                <a href="../../controller/consulta_produto/consulta_produto.php"><li>Consulta</li></a>
            </ul>
        </div>
    </div>
    <br>
    <?php
        echo '<div style="color:gray;font-size:10px;margin-left: 35px">Criado por Lucas Penha Rodrigues</div>';
    ?>
</aside>