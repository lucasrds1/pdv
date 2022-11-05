<?php
require $_SERVER["DOCUMENT_ROOT"]."/server.php";

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
            <p>
            <label><b>Nome da empresa</b></label>
            <input type="text" name="nome_emp" placeholder="Digite o nome da empresa...">
            </p>
            
            <label><b>CPF ou CNPJ:</b></label>
            <select class="selectCad" onchange="tipoCad(this.value)" name="cpf_cnpj" id="cpf_cnpj">
                <option value="0">Seleciona seu cadastro, CPF ou CNPJ</option>
                <option value="1">CPF</option>
                <option value="2">CNPJ</option>
            </select><Br><p>
            <input type="text" maxlength="11" id="cpfEmpresa" name="cad_emp_cpf" placeholder="Digite o CPF...">
            <input type="text" maxlength="14" id="cnpjEmpresa" name="cad_emp_cnpj" placeholder="Digite o CNPJ...">
            </p>
            <p>
            <label><b>Email da empresa:</b></label>
            <input type="email" name="email_emp" placeholder="Digite seu email...">   
            </p>
            <p>
            <label><b>Número de contato da empresa:</b></label>
            <input type="number" name="numero_emp" placeholder="Digite o número de contato da empresa...">   
            </p>
            <p>
            <label><b>Quantidade de lojas da empresa:</b></label>
            <input type="number" name="lojas_emp" placeholder="Digite quantas lojas possuirá o sistema...">   
            </p>
            
            <br>
            <div style="text-align:center">
            <input type="submit" name="submit" style="border:0;cursor:pointer; background-color: green;color: white; width:30%;" value="Cadastrar">
            </div>
        </form><br>
<script src="assets/js/script.js"></script>
        <?php
            $codEmpresa = $cod_empresa;
            $nomeEmp = filter_input(INPUT_POST, 'nome_emp', FILTER_SANITIZE_SPECIAL_CHARS);

            $tipoCad = filter_input(INPUT_POST, 'cpf_cnpj');
            $cpfEmp = filter_input(INPUT_POST, 'cad_emp_cpf');
            $cnpjEmp = filter_input(INPUT_POST, 'cad_emp_cnpj');

            $emailEmp = filter_input(INPUT_POST, 'email_emp', FILTER_VALIDATE_EMAIL);
            $numeroEmp = filter_input(INPUT_POST, 'numero_emp', FILTER_SANITIZE_SPECIAL_CHARS);
            $lojasEmp = filter_input(INPUT_POST, 'lojas_emp', FILTER_VALIDATE_INT);

            $submit = filter_input(INPUT_POST, 'submit');
            $insert = false;
            $dados = '';
            // var_dump($_POST);exit;
            if($submit == 'Cadastrar'){
            if(isset($codEmpresa) && $nomeEmp != ''  && $emailEmp !== '' && $tipoCad !== '' && $numeroEmp !== '' && $lojasEmp !== ''){
                    if(strlen($nomeEmp) > 3 && !empty($emailEmp)){
                        if($tipoCad !== 0){
                            if($cpfEmp !== ''){
                                if(strlen($cpfEmp) == 11 && is_numeric($cpfEmp)){
                                    $insert = true;
                                    $cadastroFJ = $cpfEmp;
                                }else{
                                    echo '<p class="erro">O CPF deve ter 11 caracteres</p>';
                                    $insert = false;
                                }
                            }
                            if($cnpjEmp !== ''){
                                if(strlen($cnpjEmp) == 14 && is_numeric($cnpjEmp)){
                                    $insert = true;
                                    $cadastroFJ = $cnpjEmp;
                                }else{
                                    echo '<p class="erro">O CNPJ deve ter 14 caracteres</p>';
                                    $insert = false;
                                }
                            }
                        }
                        if($numeroEmp){
                            if(strlen($numeroEmp) !== 11 && is_numeric($numeroEmp)){
                                echo '<p class="erro">O número deve possuir DDD e ter 11 caracteres</p>';
                                $insert = false;
                            }
                        }
                        if(!is_numeric($lojasEmp)){
                            echo '<p class="erro">O campo lojas só permite caracteres numéricos</p>';
                            $insert = false;
                        }
                        if($insert == true){
                            $dados = $logar->cadastrarEmp($codEmpresa, $nomeEmp, $emailEmp, $tipoCad, $cadastroFJ, $numeroEmp, $lojasEmp);
                            if($dados == true){
                                $_SESSION['msg_cad_empresa'] = '<h1 class="sucesso">Empresa cadastrada com sucesso!</h1>';
                                $_SESSION['codEmpresa'] = $codEmpresa;
                                header("Location: views/cadastro_funcionario/cadastro_funcionario.php");
                            }else{
                                echo '<p class="erro">Ocorreu um erro</p>';
                            }
                        }else{
                            $insert = false;
                        }
                    }else{
                        echo '<p class="erro">O nome e a senha devem ser maiores do que 3 caracteres!</p>';
                    }
                
            }elseif($submit){
                echo '<p class="erro">Preencha todos os campos!</p>';
            }
        }
            ?>
    </div>
</div>

<div style="color:gray;font-size:11px;margin-right: 10px;bottom:0;right:0;position:fixed">Criado por L2Solution - Desenvolvimento de sistemas</div>
</body>
</html>


