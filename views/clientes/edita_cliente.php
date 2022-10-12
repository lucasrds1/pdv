<?php
require '../../views/partials/header/header.php';
require '../../controller/cliente/edita_cliente/permissoes_edita_clienteController.php';
?>
<div class="container_cadastro">
<div class="cabecalho_index">
       <span>EDITAR CLIENTE</span>
</div>
<br>
<button class="botao_consultar" onclick="location.href= 'consulta_cliente.php' ">CONSULTAR CLIENTE</button>
<div>
    <div class="formulario">
    <form method="POST">

    <?php
    $clientes = new Clientes();
    $dados = $clientes->getAllEdtCli($_SESSION['codEmpresa'], $_GET['id_cli']);
    if($dados > 0){
    foreach($dados as $dado){
    ?>

        <h1 align="center">Formulário de edição</h1>
        <span class="desc_input">Campos obrigatórios* </span>
        <p>
        <label><b>Nome:*</b></label>
        <input type="text" minlength="4" name="nome_cliente" value="<?=$dado['nome_cliente']?>">
        </p>
        <p>
        <label><b>Número de celular:</b></label>
        <input type="text" name="numero_cliente" maxlength="11" value="<?=$dado['numero_cliente']?>">
        </p>
        <p>
        <label><b>Endereço</b></label>
        <input type="text" name="endereco_cliente" value="<?=$dado['endereco_cliente']?>">
        </p>
        <p>
        <label style="font-size: 17px"><input type="checkbox" name="checkcpf" id="check" style="width:15px;" onclick="checkinput()">Editar CPF</label>
        <div id="cpfCli" style="display:none">
        <!-- <label style="font-size: 17px"><input type="checkbox" name="checkcpf" id="check" style="width:15px;" onclick="checkinput()">Editar CPF</label> -->
            <label><b>CPF</b></label>
        <input type="text" maxlength="11" id="cpf" name="cpf_cliente"  value="<?=$dado['cpf_cliente']?>" >
        </p>
        </div><br>
        <div style="text-align:center">
            <input type="submit" name="submit" class="botao_cadastrar" style="width:30%" value="Editar">
        </div>
    </form>
    <?php
    }}
    require "../../controller/cliente/cadastro_cliente/cadastro_edit_clienteController.php";
    ?>
    </div>
</div>
</div>
<script>
    
</script>