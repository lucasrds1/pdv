<?php
require 'header_index.php';
//<input type='reset'  class='dt-button btn_yellow' value='".TRANS('voltar')."' name='cancelar' onClick=\"redirect('".$_SERVER['PHP_SELF']."')\"></span>";
//<input type='reset'  class='dt-button btn_yellow' value='".TRANS('voltar')."' name='cancelar' onClick=\"javascript:history.back()\"></TD>
?>
<div class="container_consulta"> 
    <div class="cabecalho" style="margin-right: 110px">
        <h1>VENDAS - INICIO</h1>
    </div>
    <hr><br>

    <?php
       if(isset($id)){
            $dados = $logar->getNomeById($id);
            if($dados !== false){
                $nome = $dados['nome'];    
            }else{
                echo 'nome não encontrado';
            }
        }
    ?>

    <h2 style="margin-left: 30px">SEJA BEM-VINDO VENDEDOR: <?php echo $nome?>.
    </h2>
    <?php
    $status = $produtos->__construct();
    echo ($status == true) ? '<h3 style="color: green;margin-left: 30px">Pronto para operar<h3>' : '<h3 style="color: red;margin-left: 30px">Indisponível para operar<h3>';
    ?>
    <br><hr width="50%" style="float: left; margin-left: 20px"><br>
    <div class="registros_vendas">
        <h1 style="font-size: 20px; margin-left: 30px; color:gray">VENDAS DE HOJE REGISTRADAS:</h1>
    <div class="limite">
        <!-- <form method="POST">
            <span style="padding: 10px">LIMITE:</span>
        <input type="number" class="input_digitavel" name="limite" placeholder="Digite um limite" value="">
        <input type="submit">
        <span style="font-size: 8px;color: gray">Digite 0 ou nada para mostrar todos os registros</span> -->
    </div>
    <table border="" width="80%" style="margin: auto;">
    <tr>
        <th>Nota</th>
        <th>Data da Venda</th>
        <th>Forma de Pagamento</th>
        <th>Observação</th>
        <th>Quantidade de produtos</th>
    </tr>
        <?php
        $lista = $produtos->getAll_nota_hoje();
        if($lista > 0){
            $d = count($lista);
            echo '<div style="margin-left:30px"><p style="font-size:10px">• Número de registros no banco: '.$d.'</p></div>';
        }else{
            echo '<div style="margin-left:30px"><p style="font-size:10px">• Nenhum registro no banco</p></div>';
        }
        //$limite = filter_input(INPUT_POST, 'limite');
        

        // if(isset($limite)):
        if($lista > 0):
            foreach ($lista as $dados):
        ?>
    <tr >
        <th><?php echo $dados['eNota']?></th>
        <th><?php echo strftime("%A - %d/%m/%Y", strtotime($dados['dataVenda']))?></th>
        <th><?php echo $dados['formaPagamento']?></th>
        <th><?php echo $dados['observacao']?></th>
        <th><?php echo $dados['qntd_produtos']?></th>
        <th><?php echo '<a href="controller/consulta_produto/consulta_produto.php?consulta_nota='.$dados['eNota'].'">Consultar</a> '?></th>
    </tr>
    <?php
            endforeach;
        endif;
    ?>
    </table>
    </div>

</div>
</body>
</html>