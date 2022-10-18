<?php
require 'classes/classes.php';
require 'classes/login.class.php';
$logar = new Login($pdo);
$produtos = new Produtos($pdo);

if(isset($_SESSION['id']) && isset($_SESSION['codEmpresa'])){
    $id = $_SESSION['id'];
    header("Location: index.php");
}else{}
if(isset($_SESSION['msg_cad_empresa'])){
    header("Location: views/cadastro_funcionario/cadastro_funcionario.php");
}else{
    $cod_empresa = rand(100000, 999999);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Vendas</title>
    <link href="../../assets/styles/style_cadastro_funcionario/cadastro_funcionario.css" rel="stylesheet">
    <link href="../../assets/styles/style_botoes_avisos.css" rel="stylesheet">
<body>
<div class="container">
    <div class="formulario">
        <h1 align="center">CADASTRO DE EMPRESA</h1><br>
        <form method="POST">
            <input type="hidden" name="codEmpresa" value="">
            <p>
            <label><b>Nome da empresa</b></label>
            <input type="text" name="nome_usuario" placeholder="Digite o nome da empresa...">
            </p>
            <p>
            <label><b>CPF ou CNPJ:</b></label>
            <input type="number" name="cpf_usuario" placeholder="Digite o CPF ou CNPJ...">
            </p>
            <p>
            <label><b>Email da empresa:</b></label>
            <input type="email" name="email_usuario" placeholder="Digite seu email...">   
            </p>
            <p>
            <label><b>Número de contato da empresa:</b></label>
            <input type="number" name="numero_usuario" placeholder="Digite o número de contato da empresa...">   
            </p>
            <p>
            <label><b>Quantidade de lojas da empresa:</b></label>
            <input type="number" name="numero_usuario" placeholder="Digite quantas lojas possuirá o sistema...">   
            </p>
            <br>
            <div style="text-align:center">
            <input type="submit" name="submit" style="border:0;cursor:pointer; background-color: green;color: white; width:30%;" value="Cadastrar">
            </div>
        </form>
        <span><a href="login.php">Fazer Login</a></span>
    </div>
    
</div>
<div style="color:gray;font-size:11px;margin-right: 10px;bottom:0;right:0;position:fixed">Criado por L2Solution - Desenvolvimento de sistemas</div>
</body>
</html>
            <?php
            $codEmpresa = filter_input(INPUT_POST, 'cod_empresa', FILTER_VALIDATE_INT);
            $nome = filter_input(INPUT_POST, 'nomeEmpresa', FILTER_SANITIZE_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST, 'emailEmpresa', FILTER_VALIDATE_EMAIL);
            $cnpj = filter_input(INPUT_POST, 'cnpjEmpresa', FILTER_SANITIZE_SPECIAL_CHARS);
            $numeroemp = filter_input(INPUT_POST, 'numeroEmpresa', FILTER_SANITIZE_SPECIAL_CHARS);
            $submit = filter_input(INPUT_POST, 'submit');
            $insert = false;
            $dados = '';
            if($submit == 'Cadastrar'){
            if(isset($codEmpresa) && $nome != ''  && $email !== ''){
                $verifica = valCadEmpresa($nome, $email, $cnpj, $numeroemp);
                if($verifica == true){
                    if(strlen($nome) > 3 && !empty($email)){
                        if($cnpj){
                            if(strlen($cnpj) !== 14 && !is_numeric($cnpj)){
                                echo '<p class="erro">O cnpj deve ter pelo menos 14 caracteres</p>';
                                $insert = false;
                            }else{
                                $insert = true;
                            }
                        }else{
                            $insert = true;
                        }
                        if($numeroemp){
                            if(strlen($numeroemp) !== 11 && is_numeric($numeroemp)){
                                echo '<p class="erro">O número deve possuir DDD e ter 11 caracteres</p>';
                                $insert = false;
                            }
                        }
                        if($insert == true){
                            $dados = $logar->cadastrarEmp($codEmpresa, $nome, $email, $cnpj, $numeroemp);
                            if($dados == true){
                                $_SESSION['msg_cad_empresa'] = '<h1 class="sucesso">Empresa cadastrada com sucesso!</h1>';
                                $_SESSION['codEmpresa'] = $codEmpresa;
                                header("Location: views/cadastro_funcionario/cadastro_funcionario.php");
                            }else{
                                echo '<p class="erro">Alguns campos já existem no sistema</p>';
                            }
                        }else{
                            $insert = false;
                        }
                    }else{
                        echo '<p class="erro">O nome e a senha devem ser maiores do que 3 caracteres!</p>';
                    }
                }
            }elseif($submit){
                echo '<p class="erro">Preencha todos os campos!</p>';
            }
        }
            ?>