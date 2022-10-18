<?php
require 'classes/classes.php';
require 'classes/login.class.php';
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
    <link href="../../assets/styles/style_login_cadastro/style_login_cadastro.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="container_form">
            <div class="cabecalho_form">
                <h1>Login - Tela de Vendas</h1><hr width="60%">
            </div><br>
            <div class="form">
                <form method="POST">
                    <label>
                        Nome
                    </label>
                    <input type="text" class="input" name="nome" placeholder="Digite um nome de usuário..." required><br>
                    <label>
                        Senha
                    </label>
                    <input type="password" class="input" name="senha" placeholder="Digite uma senha..." required><br>
                    <input type="submit" class="submit">
                </form>
            </div>
            <?php
            $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
            $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_SPECIAL_CHARS);

            if($nome != ''  && $senha !== ''){
                $dados = $logar->entrar($nome, $senha);
                if($dados !== false){
                    $_SESSION['id'] = $dados['id'];
                    $_SESSION['codEmpresa'] = $dados['cod_empresa'];
                    setcookie("login", 'login', time()+86400);
                    echo 'Logado com sucesso!';
                    header("Location: index.php");
                }else{
                    echo '<span style="color:red;margin-left: 65px">nenhum resultado encontrado!</span>';
                }
            }
            ?><br>
            <span><a href="cadastro_empresa.php">Cadastre-se</a></span>
        </div>
    </div>
    <div style="color:gray;font-size:11px;margin-right: 10px;bottom:0;right:0;position:absolute">Criado por Lucas Penha Rodrigues</div>
</body>
</html>
