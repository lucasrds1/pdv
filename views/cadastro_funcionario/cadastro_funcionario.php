<?php
require '../../controller/cadastro_funcionario/permissoes_cadFunController.php';
//FINAL DO CAD FUNCIONARIO QUANDO CADASTRAR, FAZER SESSION DESTROY E IR PARA O LOGIN
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
        <h1 align="center">Cadastro de <?php echo !empty($cadAdmin) ? 'Administrador' : 'Usuário'; ?></h1><hr width="60%" style="border-color: rgb(236, 241, 252);"><br><br>
        <form method="POST">
            <input type="hidden" name="codEmpresa" value="<?php echo $codEmpresa;?>">
            <p>
            <label><b>Nome completo:</b></label>
            <input type="text" name="nome_usuario" placeholder="Digite seu nome completo...">
            </p>
            <p>
            <label><b>CPF:</b></label>
            <input type="number" name="cpf_usuario" placeholder="Digite seu CPF...">
            </p>
            <p>
            <label><b>Email:</b></label>
            <input type="email" name="email_usuario" placeholder="Digite seu email...">   
            </p>
            <p>
            <p>
            <label><b>Senha:</b><span class="desc_input" style="font-size: 11px; padding: 3px">&nbsp;A senha deve ter mais de 8 caracteres e não deve conter caracteres especiais </span></label>
            <input type="password" name="senha_usuario" placeholder="Digite sua senha...">   
            </p>
            <p>
            <label><b>Data de nascimento:</b></label>
            <input type="date" name="data_usuario" >   
            </p>
            <p>
            <label><b>Número de celular:</b></label>
            <input type="number" name="numero_usuario" placeholder="85 99988 9988">   
            </p><br>
            <div style="text-align:center">
            <input type="submit" name="submit" style="border:0;cursor:pointer; background-color: rgb(85, 85, 253);color: white; width:30%;" value="Cadastrar">
            </div>
        </form>
<?php
require '../../controller/cadastro_funcionario/cadastroController.php';
?>
    </div>
</div>
<div style="color:gray;font-size:11px;margin-right: 10px;bottom:0;right:0;position:fixed">Criado por LPSolution - Desenvolvimento de sistemas</div>
</body>
</html>

