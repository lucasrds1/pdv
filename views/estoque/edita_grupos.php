<?php
require $_SERVER["DOCUMENT_ROOT"]."/header.php";
testeacesso('8', $acesso);
if($_GET['action'] !== 'editar' && $_GET['id_gp'] == ''){
    header("consulta_cliente.php?dt=1");
}
?>
<div class="cabecalho_index">
       <span>EDIÇÃO DE GRUPOS</span>
</div>
<br>
<button class="botao_consultar" onclick="location.href= 'consulta_grupos.php?dt=1' ">CONSULTAR GRUPOS</button>
<div>
    <div class="formulario">
    <form method="POST">
    <?php
    $grupos = new Grupos($pdo, $_SESSION['codEmpresa']);
    $dados = $grupos->getAllEdtGrupos($_GET['id_gp']);
    if($dados > 0){
foreach ($dados as $dado) {
    ?>
        <h1 align="center">Formulário de cadastro</h1>
        <span class="desc_input">Campos obrigatórios* </span>
        <p>
        <label><b>Cod. Grupo*:</b></label>
        <span class="disabled"><?=$dado['id_gp_empresa']?></span>
        <input type="hidden" name="cod_grupo" value="<?=$dado['id_grupo']?>">
        </p>
        <p>
        <label><b>Nome do grupo*:</b></label>
        <input type="text" name="nome_grupo" value="<?=$dado['nome_grupo']?>" placeholder="Digite o nome do grupo...">
        </p>
        <p>
        <label><b>Descrição do grupo:</b></label>
        <input type="text" name="desc_grupo" value="<?=$dado['desc_grupo']?>" placeholder="Digite a descrição do grupo">
        </p> 
        <label><b>Situação*:</b></label>
<div class="grupo" style="display:inline-flex">
        <p>  
        <label style="font-size:12px"><b>Ativo</b></label>
        <input type="radio" name="situ_grupo" <?=$dado['id_situ'] == 1 ? 'checked' : ''?> value="1" >
        </p>&nbsp;&nbsp;&nbsp;&nbsp;
        <p>  
        <label style="font-size:12px"><b>Inativo</b></label>
        <input type="radio" name="situ_grupo" <?=$dado['id_situ'] == 1 ? '' : 'checked'?> value="0" >
        </p>
</div>
        <br>
        <div style="text-align:center">
            <input type="submit" name="submit" class="botao_cadastrar" style="width:30%" value="Editar">
        </div>
        <?php
}}
        require '../../controller/estoque/grupos/edita_gruposController.php';
        ?>
    </form>
    </div>
</div>

