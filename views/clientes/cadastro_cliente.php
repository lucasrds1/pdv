<?php
require '../../views/partials/header/header.php';
?>
<div class="container_cadastro">
<div class="cabecalho_index">
       <span>CADASTRO DE CLIENTES</span>
</div>
<br>
<button class="botao_consultar" onclick="location.href= 'consulta_cliente.php' ">CONSULTAR CLIENTE</button>

<div>
    <div class="formulario">
    <form method="POST">
        <h1 align="center">Formulário de cadastro</h1>
        <span class="desc_input">Campos obrigatórios* </span>
        <p>
        <label><b>Nome:*</b></label>
        <input type="text" minlength="4" name="nome_cliente" placeholder="Digite o nome completo...">
        </p>
        <p>
        <label><b>Número de celular:</b></label>
        <input type="text" name="numero_cliente" maxlength="11" placeholder="Digite o número completo com DDD sem espaços ou caracteres especiais">
        </p>
        <p>
        <label><b>Endereço</b></label>
        <input type="text" name="endereco_cliente" placeholder="Rua 1, 190. Aldeota, Fortaleza, CE">
        </p>
        <p>
        <label><b>CPF</b></label>
        <input type="text" maxlength="11" name="cpf_cliente"  placeholder="Digite o cpf sem espaços ou caracteres especiais...">
        </p><br>
        <div style="text-align:center">
            <input type="submit" name="submit" class="botao_cadastrar" style="width:30%" value="Cadastrar">
        </div>
    </form>
    <?php
    require "../../controller/cliente/cadastro_cliente/cadastro_clienteController.php";
    ?>
    </div>
</div>
</div>

