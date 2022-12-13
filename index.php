<?php
require 'header.php';
//<input type='reset'  class='dt-button btn_yellow' value='".TRANS('voltar')."' name='cancelar' onClick=\"redirect('".$_SERVER['PHP_SELF']."')\"></span>";
//<input type='reset'  class='dt-button btn_yellow' value='".TRANS('voltar')."' name='cancelar' onClick=\"javascript:history.back()\"></TD>
if (isset($_SESSION['aviso'])) {
    echo $_SESSION['aviso'];
    unset($_SESSION['aviso']);
}
$nome = '';
$nomeEmpresa = '';
?>
<div class="cabecalho_index">
       <span>INÍCIO</span>
    </div>
    <?php
       if(isset($id) && isset($_SESSION['codEmpresa'])){
            $dados = $logar->getNomeById($id);
            $nomeEmpresaCod = $logar->getNomeEmpresabycod($_SESSION['codEmpresa']);
            if($dados !== false && $nomeEmpresaCod !== false){
                $nome = $dados['nome'];
                $nomeEmpresa = $nomeEmpresaCod['nome_empresa'];
            }else{
                echo 'nome não encontrado';
            }
        }

    ?>
    <h1 style="margin-left: 20px;font-size:45px;text-decoration:"><?php echo $nomeEmpresa?></h1>
    <?php 
    if($_SESSION['loja'] == 0){
    ?>
        <h4 style="margin-left: 30px">• NENHUMA LOJA SELECINADA.</h4>
    <?php
    }
    ?>
    
    <hr width="50%" style="float: left; margin-left: 20px"><br>
    <h2 style="margin-left: 30px">SEJA BEM-VINDO: <?php echo $nome?>.
    <h2 style="margin-left: 30px; color: red">
    <?php 
    if(in_array('1', $acesso)){
        echo 'ADMINISTRADOR';
    }
    ?>
    </h2>
    </h2>
    <hr width="50%" style="float: left; margin-left: 20px"><br>
    <div class="registros_vendas">
        <h1 style="font-size: 20px; margin-left: 30px; color:gray">USUÁRIOS ONLINE:</h1>
    <div class="container-users">
        <div class = "lista-users">
            <ul>
                <li>Exemplo 1</li>
                <li>Exemplo 2</li>
                <li>Exemplo 3</li>
            </ul>
         </div>
         <div class = "lista-users">
            <ul>
                <li>Exemplo 4</li>
                <li>Exemplo 5</li>
                <li>Exemplo 6</li>
            </ul>
         </div>
         <div class = "lista-users">
            <ul>
                <li>Exemplo 7</li>
                <li>Exemplo 8</li>
                <li>Exemplo 9</li>
            </ul>
         </div>
 
    </div>
    
    </div>
</body>
</html>