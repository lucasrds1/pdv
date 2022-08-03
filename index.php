<?php
require 'header_index.php';
?>
<div class="container_consulta"> 
    <div class="cabecalho" style="margin-right: 110px">
        <h1>TESTE PARA NWSOFT - INICIO</h1>
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

    <h2 style="margin-left: 30px">SEJA BEM-VINDO VENDEDOR: <?php echo $nome?>
    </h2>
    <?php
    $status = $produtos->__construct();
    if($status == true){echo '<h3 style="color: green;margin-left: 30px">Pronto para operar<h3>';}
    ?>
    <br><hr width="50%" style="float: left; margin-left: 20px"><br>
    <div class="registros_vendas">
        <h1 style="font-size: 20px; margin-left: 30px; color:gray">VENDAS REGISTRADAS:</h1><BR>
    <table border="1" width="80%" style="margin: auto">
    <tr>
        <th>Nota</th>
        <th>Data da Venda</th>
        <th>Forma de Pagamento</th>
        <th>Observação</th>
        <th>Consultar</th>
    </tr>
        <?php
        $lista = $produtos->getAll_nota();
        $lista2 = $produtos->getAll_itensNota();

        foreach ($lista as $dados):
        ?>
    <tr>
        <th><?php echo $dados['eNota']?></th>
        <th><?php echo $dados['dataVenda']?></th>
        <th><?php echo $dados['formaPagamento']?></th>
        <th><?php echo $dados['observacao']?></th>
        <th><?php echo '<a href="controller/consulta_produto/consulta_produto.php?consulta_nota='.$dados['eNota'].'">Consultar</a> '?></th>
    </tr>
    <?php
    endforeach;
    ?>
    </table>
    </div>

</div>
</body>
</html>