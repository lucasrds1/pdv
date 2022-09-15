<?php
session_start();
require 'classes/produtos.class.php';
require 'classes/login.class.php';
$logar = new Login();
$produtos = new Produtos();

if(isset($_SESSION['id'])){
    $id = $_SESSION['id'];
    header("Location: index.php");
}else{

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Tela de Vendas</title>
    <link href="../../assets/styles/style_login_cadastro/style_login_cadastro.css" rel="stylesheet">
</head>
<body style="">
    <div class="nome_sistema">
        <img width="50" src="assets/imagens/logo_sistema/lrlogo.jpg" title="LRSolution - Desenvolvimento de sistemas">
    </div>
    <div class="container">
        <div class="container_form">
            <div class="cabecalho_form">
                <h1>Cadastro da empresa</h1><hr width="60%">
            </div><br>
            <div class="form">
                <form method="POST">
                    <label>
                        Nome
                    </label>
                    <input type="text" class="input" name="nomeEmpresa" placeholder="Digite o nome da empresa..." required><br>
                    <label>
                        Email
                    </label>
                    <input type="email" class="input" name="emailEmpresa" placeholder="Digite o email da empresa..." required><br>
                    <label>
                        CNPJ
                    </label>
                    <input type="number" maxlength="14" class="input" name="cnpjEmpresa" id="cnpj" placeholder="Digite o email da empresa..." required><br>
                    <label>
                        Senha
                    </label>
                    <input type="password" class="input" name="senhaEmpresa" placeholder="Digite uma senha..." required><br>
                    <input type="submit" class="submit">
                </form>
            </div>
            <?php
            $nome = filter_input(INPUT_POST, 'nomeEmpresa', FILTER_SANITIZE_SPECIAL_CHARS);
            $senha = filter_input(INPUT_POST, 'senhaEmpresa', FILTER_SANITIZE_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST, 'emailEmpresa', FILTER_VALIDATE_EMAIL);
            $cnpj = filter_input(INPUT_POST, 'cnpjEmpresa');

            if($nome && $email && $senha && $cnpj){
                echo $nome, $email, $senha, $cnpj;exit;
            }
            if($nome != ''  && $senha !== '' && $email !== '' && $cnpj !== ''){
                if(strlen($nome) > 3 && strlen($senha) > 3 && $email && strlen($cnpj) == 13){
                echo $nome, $email, $senha, $cnpj;exit;
                $dados = $logar->cadastrarUser($nome, $senha);
                if($dados !== false){
                    echo 'Cadastrado com sucesso!';
                    header("Location: index.php");
                }else{
                    echo 'nenhum dado cadastrado!';
                }
            }else{
                echo '<span style="color:red;margin-left: 0px">O nome e a senha devem ser maiores do que 3 caracteres!</span>';
            }
            }
            ?><br>
            <span><a href="login.php">Fazer Login</a></span>
        </div>
    </div>
    <div style="color:gray;font-size:11px;margin-right: 10px;bottom:0;right:0;position:absolute">Criado por LRSolution - Desenvolvimento de sistemas</div>
</body>
</html>
<script>
    
</script>