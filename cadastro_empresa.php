<?php
require 'classes/produtos.class.php';
require 'classes/login.class.php';
$logar = new Login();
$produtos = new Produtos();

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
    <title>Cadastro - Tela de Vendas</title>
    <link href="../../assets/styles/style_login_cadastro/style_login_cadastro.css" rel="stylesheet">
    <link href="../../assets/styles/style_botoes_avisos.css" rel="stylesheet">
</head>
<body style="">
    <div class="nome_sistema">
        <img width="50" src="assets/imagens/logo_sistema/lrlogo.jpg" title="LRSolution - Desenvolvimento de sistemas">
    </div>
    <br><br>
    <div class="container">
        <div class="container_form">
            <div class="cabecalho_form">
                <h1>Cadastro da empresa</h1><hr width="60%">
            </div><br>
            <div class="form">
                <span class="desc_input">Campo obrigatório * </span>
                <form method="POST" onSubmit='return valida()'>
                    <input type="hidden" name="cod_empresa" value="<?=$cod_empresa?>">
                    <label>
                        Nome*
                    </label>
                    <input type="text" class="input" name="nomeEmpresa" placeholder="Digite o nome da empresa..." ><br>
                    <label>
                        Email*
                    </label>
                    <input type="email" class="input" name="emailEmpresa" placeholder="Digite o email da empresa..." ><br>
                    <label>
                        CNPJ
                    </label>
                    <input type="number" class="input" name="cnpjEmpresa" id="cnpj" placeholder="Digite o CNPJ da empresa..." ><br>
                    <label>
                        Número
                    </label>
                    <input type="number" class="input" name="numeroEmpresa" id="numeroEmpresa" placeholder="85 98888 1111" ><br>
                    <input type="submit" name="submit" value="Cadastrar" class="submit">
                </form>
            </div>
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
            ?><br>
            <span><a href="login.php">Fazer Login</a></span>
        </div>
    </div>

    <div style="color:gray;font-size:11px;margin-right: 10px;bottom:0;right:0;position:absolute">Criado por LPSolution - Desenvolvimento de sistemas</div>
</body>
</html>
<script>

</script>