<?php
require $_SERVER["DOCUMENT_ROOT"]."/server.php";

$logar = new Login($pdo);
$produtos = new Produtos($pdo);
echo isset($_SESSION['msgCadUser']) ? $_SESSION['msgCadUser'] : '';
if(isset($_SESSION['id']) && isset($_SESSION['codEmpresa'])){
    $id = $_SESSION['id'];
    header("Location: index.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Tela de Vendas</title>
    <link href="../../assets/styles/style_botoes_avisos.css" rel="stylesheet">
</head>
<body><Br>
<link href="../../assets/styles/style_cadastro_funcionario/cadastro_funcionario.css" rel="stylesheet">

<div class="container">
    <div class="formulario_login">
        <h1 align="center">Login Usuário</h1>
        <hr>
        <form method="POST" style="width:95%">
            <p>
            <label><b>Email de Usuário:</b></label>
            <input type="email" name="email" placeholder="Digite seu email de usuário...">
            </p>
            
            <p>
            <label><b>Senha de Usuário:</b></label>
            <input type="password" name="senha" placeholder="Digite sua senha de usuário...">   
            </p>
            
            <br>
            <div style="text-align:center">
            <input type="submit" name="submit" style="border:0;cursor:pointer; background-color: green;color: white; width:30%;" value="Entrar">
            </div>
        </form><br>
        <?php
            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
            $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_SPECIAL_CHARS);
            $submit = filter_input(INPUT_POST, 'submit');
            if($submit == 'Entrar'){
            if($email !== ''  && $senha !== ''){
                $dados = $logar->entrar($email, $senha);
                if($dados !== false){
                    $_SESSION['id'] = $dados['id'];
                    $_SESSION['codEmpresa'] = $dados['id_empresa'];
                    $_SESSION['loja'] = $dados['id_loja'];

                    $logar->entraLog($_SESSION['id'], $_SESSION['codEmpresa'], $_SESSION['loja']);
                    
                    echo '<script> location.replace("/"); </script>';
                }else{
                    echo '<p class="erro">nenhum resultado encontrado!</p>';
                }
            }else{
                echo '<p class="erro">Preencha todos os campos</p>';
            }
            }
            ?><br>
        <a href="esqueceuSenha.php">Esqueceu a senha?</a>
    </div>
</div>
<div style="color:gray;font-size:11px;margin-right: 10px;bottom:0;right:0;position:fixed">Criado por L2Solution - Desenvolvimento de sistemas</div>
</body>
</html>
<script src="assets/js/script.js"></script>

