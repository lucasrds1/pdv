<?php
require '../../header.php';
testeacesso('19', $acesso);
$disabeld = '';
?>
<div class="container_cadastro">
<div class="cabecalho_index">
       <span>CADASTRO DE CLIENTES</span>
</div>
<br>
<button class="botao_consultar" onclick="location.href= 'consulta_cliente.php?dt=1' ">CONSULTAR CLIENTE</button>

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
        <label><b>Endereço:</b></label>
        <input type="text" name="endereco_cliente" placeholder="Rua 1, 190. Aldeota, Fortaleza, CE">
        </p>
        <p>
        <label><b>CPF:</b></label>
        <input type="text" maxlength="11" minlength="11" name="cpf_cliente"  placeholder="Digite o cpf sem espaços ou caracteres especiais...">
        </p>
        <p>
        <label><b>LOJA:</b></label>
        <?php
        if(in_array('45', $acesso) || in_array('1', $acesso)){
            
        }else{
            $disabeld = 'disabled';
        }
        ?>
        <select name="loja_cliente" class="padrao_select" <?=$disabeld?>>
        <?php
      //  $access = testeacesso('45', $acesso);
        if(in_array('45', $acesso) || in_array('1', $acesso)):
        ?>
            <option>Todas</option>
        </p>
        <?php
        $lojas = new Loja($pdo);
        $return = $lojas->getLojas($_SESSION['codEmpresa']);
        foreach($return as $dados):
        ?>
            <option value="<?=$dados['id_loja']?>"><?=$dados['id_loja']?> - <?=$dados['nome_loja']?></option>
        
        <?php 
        endforeach;
        else: 
            $qry = "SELECT UPPER(nome_loja) nome_loja FROM cad_lojas WHERE id_empresa = ".$_SESSION['codEmpresa']." AND id_loja = ".$_SESSION['loja'];
            $res = $pdo->query($qry);
            $row = $res->fetchAll();
            echo '<option selected value="'.$_SESSION['loja'].'">'.$row[0]['nome_loja'].'</option>';
        endif;
        ?>
        </select>
        <span class="desc_input">Necessita de permissão</span>
        <?php
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
