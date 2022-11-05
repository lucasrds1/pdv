<?php
require $_SERVER["DOCUMENT_ROOT"]."/server.php";
$logar = new Login($pdo);
$logar->verificar($_SESSION['id']);
$acesso = $logar->permissao($_SESSION['id']);
$produtos = new Produtos($pdo);

$sessao = $_SESSION['id'];
$id = $_SESSION['id'];
$px = '15px';
$onc = 'dropdown(5)';

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
    <?php
    $onc4 = 'dropdown(4)';
if (isset($_GET['dt']) && $_GET['dt'] == 1) {
    $px = '25px';
    $onc = 'dropdown1(5)';
    $onc4 = 'dropdown1(4)';
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
    <link href="../../../assets/styles/style_header_footer/header.css" rel="stylesheet">
    <link href="../../../assets/styles/style_header_footer/footer.css" rel="stylesheet">
    <link href="../../../assets/styles/style_cadastro_produto/cadastro_produto.css" rel="stylesheet">
    <link href="../../../assets/styles/style_consulta_produto/consulta_produto.css" rel="stylesheet">
    <link href="../../../assets/styles/style_cadastro_cliente/cadastro_cliente.css" rel="stylesheet">
    <link href="../../../assets/styles/style_botoes_avisos.css" rel="stylesheet">
   

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
                <a href="../../index.php"><li>INÍCIO</li></a>
                </li>
                <a href="../../views/clientes/consulta_cliente.php"><li style="background-color:green">VENDER</li></a>
                <li id="btn" onclick="dropdown(1)">REGISTRO DE VENDAS</li>
                <?php
                if(in_array('16', $acesso) || in_array('1', $acesso)){
                ?>
                <a href="../../views/clientes/consulta_cliente.php?dt=1"><li>CLIENTES</li></a>
                <?php
                }
                ?>
                <?php
                if(in_array('4', $acesso) || in_array('1', $acesso)){
                ?>
                <li id="btn" onclick="<?=$onc4?>">PRODUTOS<img src="../../assets/imagens/submenu2.png" style="width:<?=$px?>;padding:5px;position: absolute;" id="img_dropdown4"></li>
                <div class="dropdown" id="dropdown4">
                    <a href="../../views/estoque/consulta_estoque.php?dt=1"><li>Produtos</li></a>
                <?php
                if(in_array('11', $acesso) || in_array('1', $acesso)){
                ?>
                    <a href="../../views/estoque/consulta_grupos.php?dt=1"><li>Grupos</li></a>
                    <a href="../../views/estoque/consulta_grupos.php"><li>Subgrupos</li></a>
                    <a href="../../views/estoque/consulta_grupos.php"><li>Microgrupos</li></a>
                </div>
                </li>
                <?php
                }}
                ?>
                <li>FORNECEDORES</li>
                <?php
                if (in_array('1', $acesso)) {
                ?>
                <li id="btn" onclick="<?=$onc?>">EMPRESA<img src="../../assets/imagens/submenu2.png" style="width:<?=$px?>;padding:5px;position: absolute;" id="img_dropdown5"></li>
                <div class="dropdown" id="dropdown5">
                        <a href="../../controller/cadastrar_nota/cadastrar_nota.php"><li>Sua empresa</li></a>
                        <a href="../../controller/cadastrar_nota/cadastrar_nota.php"><li>Lojas</li></a>
                        <a href="../../controller/consulta_nota/consulta_nota.php"><li>FUNCIONÁRIOS</li></a>
                </div>
                </li>
                <li>Suporte whatsapp</li>
                <?php
            } else {
                ?>
                    <li id="btn">FUNCIONÁRIOS</li>
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
