<?php
require $_SERVER["DOCUMENT_ROOT"]."/header.php";

testeacesso('7', $acesso);

?>

<div class="container_cadastro">
<div class="cabecalho_index">
       <span>CADASTRO DE PRODUTO INICIAL</span>
</div>
<br>
<button class="botao_consultar" onclick="location.href= 'consulta_estoque.php?dt=1' ">CONSULTAR ESTOQUE</button>

<div>
    <div class="formulario">
    <form method="POST" style="width:100%">
        <h1 align="center">Formulário de Cadastro</h1>
        <span class="desc_input">Campos obrigatórios* </span>
        <p>
        <label><b>Descrição / Nome:*</b></label>
        <input type="text" name="nome_produto" placeholder="Digite a descrição ou o nome do produto...">
        </p>
<p>
<div class='grupo'>
        <p>
        <label><b>Grupo:</b></label>
        <input type="text" name="cod_grupo_produto" style="width:40px;text-align:center" maxlength="11">
        </p>
        <p>
        <label><b>Subgrupo 1:</b></label>
        <input type="text" name="cod_subg_produto" style="width:40px;text-align:center">
        </p>
        <p>
        <label><b>Microgupo:</b></label>
        <input type="text" name="cod_subg2_produto"  style="width:40px;text-align:center">
        </p>
</div>
</p>
<p>
<div class='grupo'>
        <p>
        <label><b>Unid. Entrada*:</b></label>
        <input type="text" name="unid_ent_produto" style="width:40px;text-align:center" maxlength="11">
        </p>
        <p>
        <label><b>Qntd. Embalagem Entrada:</b></label>
        <input type="text" name="qnt_emb_ent" style="width:40px;text-align:center">
        </p>
</div>
</p>
<p>
<div class='grupo'>
        <p>
        <label><b>Unid. Saída:</b></label>
        <input type="text" name="unid_saida_produto"  style="width:40px;text-align:center">
        </p>
        <p>
        <label><b>Qntd. Unidade Saída:</b></label>
        <input type="text" name="qnt_unid_saida"  style="width:40px;text-align:center">
        </p>
</div>
</p>
        <p>
        <label><b>Descrição reduzida:</b></label>
        <input type="text" name="desc_redu_produto" placeholder="Digite a descrição reduzida do produto...">
        </p>
        <p>
        <label><b>Peso Liquído:</b></label>
        <input type="text" name="peso_liquido" placeholder="Digite o peso liquído do produto...">
        </p>
        <p>
        <label><b>Peso Bruto:</b></label>
        <input type="text" name="peso_bruto" placeholder="Digite o peso bruto do produto...">
        </p>
        <?php
        require '../../controller/selectLoja.php';
        require "../../controller/cliente/cadastro_cliente/cadastro_edit_clienteController.php";
        ?>
        <br>
        <div style="text-align:center">
            <input type="submit" name="submit" class="botao_cadastrar" style="width:30%" value="Cadastrar">
        </div>
    </form>
    
    </div>
</div>
</div>
<!-- sweetalert2 -->
<script src="../../assets/swalert/sweetalert2.js"></script>
