<!-- CONTAINER DA PAGINA -->
<div class="container_consulta">


<!-- COMEÇO DO FORMULÁRIO -->
<div class="consulta">
    <form method="GET">
        <fieldset>
            <legend>Consultar</legend>
            <!-- CONTAINER NOTA -->
                <div class="container_eNota">
                    <div class="eNota">
                        <label>
                            <div class="nNota">N° NOTA:</div>
                
                        </label>
                            <div class="formNota">
                                <input type="text" name="consulta_nota" placeholder="Digite 6 números...">
                                <input type="submit" value="Consultar" class="pointer">
                            </div><br>

                        <!-- FOREACH PARA PEGAR OS DADOS DAS NOTAS -->
                        <?php
                        $eNota = filter_input(INPUT_GET, 'consulta_nota', FILTER_VALIDATE_INT);
                        if($eNota !== '' && strlen($eNota) < 7){
                            $info = $produtos->consultar_nota($eNota);
                        }else{
                            $info = false;
                            echo '<div class="aviso_notaVazia">digite uma nota válida</div>';
                        }
                        if($info == true):
                        foreach($info as $item):
                        ?>
                    </div>
                </div>
            <!-- FINAL CONTAINER NOTA -->
            
<!-- COMEÇO CONTAINER DADOS NOTA-->
<div class="container_dados_nota">
    <div class="dados_nota">
        <ul>
            <li>NOTA: 
                <input type="text" name="forma_pagamento" value="<?php echo $item['eNota']?>" style="margin-left: 152px" disabled>
            </li>
            <li>DATA DA VENDA: 
                <input type="date" value="<?php echo $item['dataVenda']?>" style="margin-left: 72px;width: 170px" disabled>
            </li>
            <li>FORMA DE PAGAMENTO: 
                <input type="text" name="forma_pagamento" value="<?php echo $item['formaPagamento']?>" style="margin-left: 10px" disabled>
            </li>
            <li>OBSERVAÇÃO: 
                <input type="text" value="<?php echo $item['observacao']?>" name="observacao_nota" style="margin-left: 88px" disabled>
            </li>
           
                        <!-- FINAL DO FOREACH -->
                        <?php endforeach;endif; ?>

                <?php
                if($eNota !== '' && strlen($eNota) < 7){
                    $itens = $produtos->consultar_itensNota($eNota);
                }else{
                    $itens = false;
                    echo 'digite notinha valida';
                }
                if($itens == true):
                    foreach($itens as $tudo):
                ?>

                <fieldset style="border-color: white;">
                    <legend>Produtos</legend>
                    <?php echo $tudo['item']?><a class="excluirItem" href="excluir_produto.php?consulta_nota=<?php echo $eNota?>&item=<?php echo $tudo['item']?>">EXCLUIR</a>
                    <input type="hidden" name="item" value="<?php echo $tudo['item']?>">
                        <li>QUANTIDADE: 
                            <input type="number" value='<?php echo $tudo['quantidade'] ?>' name="quantidade_nota" style="margin-left: 95px" disabled>
                        </li>
                        <li>DESCRIÇÃO: 
                            <input type="text" value='<?php echo $tudo['descricao'] ?>' name="descricao_nota" style="margin-left: 105px" disabled>
                        </li>
                        <li>VALOR UNITÁRIO: 
                            <input type="text" value='<?php echo $tudo['vr_unit'] ?>' name="vr_unit_nota" style="margin-left: 65px" disabled>
                        </li>
                        <hr>
                </fieldset>
                <?php endforeach;endif;?>
                <br>
<?php if($produtos->verificar_nota($eNota) == true): ?>
                <!-- COMEÇO DIV OPÇÕES DA CONSULTA -->
<div class="consulta_opcoes">
    <a href="excluir.php?eNota=<?php echo $item['eNota']?>" onclick="return confirm('Tem certeza que deseja excluir a venda de nota: <?php echo $eNota?>?')">
    <div class="consulta_excluir">
       Excluir
    </div>
    </a>
    <a href="../editar_produto/editar_produto.php?consulta_nota=<?php echo $item['eNota']?>" onclick="return confirm('Tem certeza que deseja editar a venda de nota: <?php echo $eNota?>?')">
    <div class="consulta_editar">
       Editar
    </div>
    
</a>
</div>

<!-- FINAL DIV OPÇÕES -->
<?php endif; ?>
<!-- FINAL IF VERIFICAÇÃO DE NOTA -->
<!-- FINAL CONTAINER DADOS NOTAS -->
</div>
        </fieldset>
    </form>
<!-- FINAL DO FORMULÁRIO -->
</div>
<!-- FINAL DO CONTAINER DA PAGINA -->
</div>
