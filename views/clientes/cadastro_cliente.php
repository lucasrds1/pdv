<?php
require '../../views/partials/header/header.php';
?>
<div class="container_cadastro">
<div class="cabecalho">
    <h1>CADASTRAR CLIENTE</h1>
</div>
<hr>
<div class="form_cadastro">
    <div class="formulario">
    <form method="POST">
        <h1 align="center">Formulário de cadastro</h1>
        <span class="desc_input">Campos obrigatórios* </span>
        <p>
        <label><b>Nome:*</b></label>
        <input type="text" name="nome_cliente" placeholder="Digite o nome completo...">
        </p>
        <p>
        <label><b>Número de celular:</b></label>
        <input type="number" name="numero_cliente" placeholder="85 9 8899-1100">
        </p>
        <p>
        <label><b>Endereço</b></label>
        <input type="text" name="endereco_cliente" placeholder="Rua 1, 190. Aldeota, Fortaleza, CE">
        </p>
        <p>
        <label><b>CPF</b></label>
        <input type="number" name="cpf_cliente" placeholder="Digite o cpf...">
        </p><br>
        <div style="text-align:center">
            <input type="submit" name="submit" style="border:0;cursor:pointer; background-color: rgb(85, 85, 253);color: white; width:30%;" value="Cadastrar">
        </div>
    </form>
    <?php
    require "../../controller/cliente/cadastro_cliente/cadastro_clienteController.php";
    ?>
    </div>
</div>
</div>

