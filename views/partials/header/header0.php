<?php
require '../../classes/Server.php';
require '../../classes/Classes.php';
require '../../classes/Login.php';
$logar = new Login($pdo);
$produtos = new Produtos($pdo);

$sessao = $_SESSION['id'];
$logar->verificar($_SESSION['id']);
$id = $_SESSION['id'];
$acesso = $logar->permissao($id);
$px = '15px';
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
    <?php
if (isset($_GET['dt']) && $_GET['dt'] == 1) {
    $px = '25px';
    ?>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../../assets/datatables/bootstrap/css/bootstrap.min.css">
    <!-- CSS personalizado --> 
    <link rel="stylesheet" href="../../assets/datatables/main.css">  
    
    <!--datables CSS básico-->
    <link rel="stylesheet" type="text/css" href="../../assets/datatables/datatables.min.css"/>
    <!--datables estilo bootstrap 4 CSS-->  
    <link rel="stylesheet"  type="text/css" href="../../assets/datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
        
    <!--font awesome con CDN-->  
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">  
    <?php
    }
    ?>

</head>
<body style="font-family:arial">
        <?php
    if (isset($id)) {
        $dados = $logar->getNomeById($id);
        if ($dados !== false) {
            $nome = $dados['nome'];
        } else {
            echo 'nome não encontrado';
        }
    }
    ?>
    <aside>
    <div class="container_menu">
        <!-- <a href="../../index.php"><h1>MENU</h1></a> -->
        <div class="menu_header">
            <div class="oi_login"><span><?=$nome?></span><br>
                <a href="../../deslogar.php" class="des">Deslogar</a>
        </div>
        <div class="menu_botoes">
            <ul>
                <a href="../../index.php"><li>Inicio</li></a>
                </li>
                <a href="../../views/clientes/consulta_cliente.php"><li style="background-color:green">VENDER</li></a>
                <li id="btn" onclick="dropdown(1)">REGISTRO DE VENDAS</li>
                
                <a href="../../views/clientes/consulta_cliente.php?dt=1"><li>CLIENTES</li></a>
                <a href="../../views/estoque/estoque.php"><li>ESTOQUE</li></a>
                <li>FORNECEDORES</li>
                <?php
            if (in_array('1', $acesso)) {
                ?>
                <li id="btn" onclick="dropdown1(5)">EMPRESA<img src="../../assets/imagens/submenu2.png" style="width:<?=$px?>;padding:5px;position: absolute;" id="img_dropdown5"></li>
                <div class="dropdown" id="dropdown5">
                        <a href="../../controller/cadastrar_nota/cadastrar_nota.php"><li>Sua empresa</li></a>
                        <a href="../../controller/consulta_nota/consulta_nota.php"><li>Cadastrar funcionário</li></a>
                        <a href="../../controller/consulta_nota/consulta_nota.php"><li>Consultar  funcionário</li></a>
                </div>
                </li>
                <li>Suporte whatsapp</li>
                <?php
            } else {
                ?>
                    <li id="btn">FUNCIONARIOS</li>
                <?php
            }
    ?>
            </ul>
        </div>
    </div>
    <br>
</aside>
<div class="container_consulta">
<script src="../../assets/js/script.js"></script>
<?php
