<?php
require $_SERVER["DOCUMENT_ROOT"]."/header.php";

testeacesso('10', $acesso);

?>
<div class="cabecalho_index">
       <span>CADASTRO DE GRUPOS</span>
</div>
<br>
<button class="botao_consultar" onclick="location.href= 'consulta_grupos.php?dt=1' ">CONSULTAR GRUPOS</button>
<div>
    <div class="formulario">
    <form method="POST">
        <h1 align="center">Formulário de cadastro</h1>
        <span class="desc_input">Campos obrigatórios* </span>
        <p>
        <label><b>Nome do grupo*:</b></label>
        <input type="text" name="nome_grupo" placeholder="Digite o nome do grupo...">
        </p>
        <p>
        <label><b>Descrição do grupo:</b></label>
        <input type="text" name="desc_grupo" placeholder="Digite a descrição do grupo">
        </p> 
        <label><b>Situação*:</b></label>
<div class="grupo" style="display:inline-flex">
        <p>  
        <label style="font-size:12px"><b>Ativo</b></label>
        <input type="radio" name="situ_grupo" value="1" checked>
        </p>&nbsp;&nbsp;&nbsp;&nbsp;
        <p>  
        <label style="font-size:12px"><b>Inativo</b></label>
        <input type="radio" name="situ_grupo" value="0">
        </p>
</div>
        <br>
        <div style="text-align:center">
            <input type="submit" name="submit" class="botao_cadastrar" style="width:30%" value="Cadastrar">
        </div>
        <?php
        require '../../controller/estoque/grupos/cadastro_gruposController.php';
        ?>
    </form>
    </div>
</div>
