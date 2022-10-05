<?php
require '../../classes/classes.php';
require '../../classes/login.class.php';
$logar = new Login();
$produtos = new Produtos();

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
    <link href="../../assets/styles/style_cadastro_cliente/cadastro_cliente.css" rel="stylesheet">
    <link href="../../assets/styles/style_botoes_avisos.css" rel="stylesheet">


</head>
<body>
        <?php
        if(isset($id)){
            $dados = $logar->getNomeById($id);
            if($dados !== false){
                $nome = $dados['nome'];    
            }else{
                echo 'nome não encontrado';
            }
        }
        ?>
    <aside>
    <div class="container_menu">
        <!-- <a href="../../index.php"><h1>MENU</h1></a> -->
        <div class="menu">
            <div class="oi_login"><span><?=$nome?></span><br>
                <a href="../../deslogar.php" class="des">Deslogar</a>
        </div>
        <div class="menu_botoes">
            <ul>
                <a href="../../index.php"><li>Inicio</li></a>
                <li id="btn" onclick="dropdown1(1)">VENDAS<img src="../../assets/imagens/submenu2.png" style="width:25px;padding:5px;position: absolute;" id="img_dropdown1"></li>
                <div class="dropdown" id="dropdown1">
                        <a href="../../controller/cadastrar_nota/cadastrar_nota.php"><li>Cadastrar venda</li></a>
                        <a href="../../controller/consulta_nota/consulta_nota.php"><li>Pesquisar venda</li></a>
                </div>
                </li>
                <li id="btn" onclick="dropdown1(2)">CLIENTES<img src="../../assets/imagens/submenu2.png" style="width:25px;padding:5px;position: absolute;" id="img_dropdown2"></li>
                <div class="dropdown" id="dropdown2">
                        <a href="../../views/clientes/cadastro_cliente.php"><li>Cadastrar cliente</li></a>
                        <a href="../../views/clientes/consulta_cliente.php"><li>Pesquisar cliente</li></a>
                </div>
                </li>
                <li id="btn" onclick="dropdown1(3)">PRODUTOS<img src="../../assets/imagens/submenu2.png" style="width:25px;padding:5px;position: absolute;" id="img_dropdown3"></li>
                <div class="dropdown" id="dropdown3">
                        <a href="../../controller/cadastrar_nota/cadastrar_nota.php"><li>Cadastrar produto</li></a>
                        <a href="../../controller/consulta_nota/consulta_nota.php"><li>Pesquisar produtos</li></a>
                </div>
                </li>
                <li id="btn" onclick="dropdown1(4)">FORNECEDORES<img src="../../assets/imagens/submenu2.png" style="width:25px;padding:5px;position: absolute;" id="img_dropdown4"></li>
                <div class="dropdown" id="dropdown4">
                        <a href="../../controller/cadastrar_nota/cadastrar_nota.php"><li>Cadastrar fornecededor</li></a>
                        <a href="../../controller/consulta_nota/consulta_nota.php"><li>Pesquisar fornecedor</li></a>
                </div>
                </li>
                <?php
                $permissao = $logar->getPermissaoById($_SESSION['id']);
                if($permissao['permissoes'] == 'ADMIN'){
                ?>
                <li id="btn" onclick="dropdown1(5)">EMPRESA<img src="../../assets/imagens/submenu2.png" style="width:25px;padding:5px;position: absolute;" id="img_dropdown5"></li>
                <div class="dropdown" id="dropdown5">
                        <a href="../../controller/cadastrar_nota/cadastrar_nota.php"><li>Sua empresa</li></a>
                        <a href="../../controller/consulta_nota/consulta_nota.php"><li>Cadastrar funcionário</li></a>
                        <a href="../../controller/consulta_nota/consulta_nota.php"><li>Consultar  funcionário</li></a>
                </div>
                </li>
                <li>Suporte whatsapp</li>
                <?php
                }
                ?>
            </ul>
        </div>
    </div>
    <br>
    <?php
        echo '<div style="color:gray;font-size:10px;padding:5px;text-align: center">Criado por LPSolution - Desenvolvimento de sistemas</div>';
    ?>
</aside>
<div class="container_consulta">
<script src="../../assets/js/script.js"></script>
