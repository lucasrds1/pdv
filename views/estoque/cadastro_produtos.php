<?php
require $_SERVER["DOCUMENT_ROOT"]."/header.php";

testeacesso('7', $acesso);

?>

<div class="container_cadastro">
<div class="cabecalho_index">
       <span>CADASTRO DE PRODUTO INICIAL</span>
</div>
<br>

<div>
<button class="botao_consultar" onclick="location.href= 'consulta_produtos.php?dt=1' ">CONSULTAR ESTOQUE</button>
<hr style="border-top: 1px solid rgba(0,0,0,.1)">
    <div class="formulario">
    <form method="POST">
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
        <?php
        if(in_array('11', $acesso) || in_array('1', $acesso)){
            
        }else{
            $disabeld = 'disabled';
        }
        ?>
        <select name="cod_grupo_produto" class="padrao_select" <?=$disabeld?>>
        <option>0000</option>

        <?php
        $qry = "SELECT id_grupo, id_gp_empresa, nome_grupo FROM tab_grupo WHERE id_empresa = ".$_SESSION['codEmpresa'];
        $res = $pdo->query($qry);
        $row = $res->fetchAll();
        foreach($row as $dados){
                echo "<option>".$dados['id_gp_empresa']."</option>";
        }
        ?>
        </select>
        
        <!-- <input type="text" name="cod_grupo_produto" style="width:40px;text-align:center" maxlength="11"> -->
        </p>
        <p>
        <label><b>Subgrupo:</b></label>
        <select name="cod_subg_produto" class="padrao_select">
            <option>0000</option>

        <?php
        $qry = "SELECT id_subgrupo, id_sub_empresa, nome_subgrupo FROM tab_subgrupo WHERE id_empresa = ".$_SESSION['codEmpresa'];
        $res = $pdo->query($qry);
        $row = $res->fetchAll();
        foreach($row as $dados){
                echo "<option>".$dados['id_gp_empresa']."</option>";
        }
        ?>
        </select>
        </p>
        <p>
        <label><b>Microgupo:</b></label>
        <select name="cod_microg_produto" class="padrao_select">
            <option>0000</option>

        <?php
        $qry = "SELECT id_microgrupo, id_micro_empresa, nome_microgrupo FROM tab_microgrupo WHERE id_empresa = ".$_SESSION['codEmpresa'];
        $res = $pdo->query($qry);
        $row = $res->fetchAll();
        foreach($row as $dados){
            echo "<option>".$dados['id_gp_empresa']."</option>";
        }
        ?>
        </select>
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
        <label><b>Qntd. Entrada:</b></label>
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
        <label><b>Qntd. Saída:</b></label>
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
        <label><b>Código de barras:</b></label>
        <input type="text" name="cod_barra_produto" placeholder="Digite o código de barras do produto...">
        </p>
        <?php
        require '../../controller/selectLoja.php';
        ?>
        <?php
        require "../../controller/estoque/cadastro_estoque1Controller.php";
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
