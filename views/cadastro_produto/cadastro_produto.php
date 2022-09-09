<!-- <div class="container_cd_produto">
</div>
    <div class="consulta">
        <form method="POST" action="cadastrar_produto_submit.php">
            <fieldset>
                <legend>Cadastrar</legend>
                    <div class="container_eNota">
                        <div class="eNota">
                            <label>
                                <div class="nNota">N° NOTA:</div>
                            </label>
                                <div class="formNota">
                                    <input type="text" name="eNota" value="<?php ?>" placeholder="Digite 6 números..." required>
                                </div><br>
                        </div>
            
                    </div>
<div class="container_dados_nota">
    <div class="dados_nota">
        <ul>
            <li>DATA DA VENDA: 
                <input type="date" name="data_venda" style="margin-left: 72px;width: 170px">
            </li>
            <li>FORMA DE PAGAMENTO: 
                <input type="text" name="forma_pagamento"  style="margin-left: 10px" required>
            </li>
            <li>OBSERVAÇÃO: 
                <input type="text"  name="observacao_nota" style="margin-left: 88px" >
            </li>
                    
            <fieldset id="itens" style="border-color: white;">
                    <legend>Produtos</legend>
                    <fieldset id="itens2" style="border-color: white;"> 
                    <input type="hidden" name="item" value="1"> 
                    <legend>Produto: 1</legend>
                    <li>QUANTIDADE: 
                        <input type="number"  name="quantidade_nota" style="margin-left: 95px" required>
                    </li>
                    <li>DESCRIÇÃO: 
                        <input type="text"  name="descricao_nota" style="margin-left: 105px" required>
                    </li>
                    <li>VALOR UNITÁRIO: 
                        <input type="number"  name="vr_unit_nota" placeholder="R$" style="margin-left: 65px" required>
                    </li>
                </fieldset>
            </fieldset>
                <div class="container_adicionar_produto">
                    <div class="adicionar_produto">
                        <button onclick="adicionarProduto()" id="botao" type="button">+ ADICIONAR PRODUTO</button>
                    </div>
                </div>        
                <script src="../../assets/js/script.js"></script>

                    <div class="consulta_opcoes">
                        <input type="submit" class="cadastro_submit" value="CADASTRAR" >
                    </div>
        </ul> -->
        <div style="width:100%;background-color:gray" >
        <form method="POST">
        <input type="text" name="eNota[]" value="<?php ?>" placeholder="Digite 6 números..." required>
        <input type="date" name="data_venda[]" style="margin-left: 72px;width: 170px">
        <input type="text" name="forma_pagamento[]"  style="margin-left: 10px" required>
        <input type="text"  name="observacao_nota[]" style="margin-left: 88px" >
        <div style="background-color: green" id="campo">
        <input type="hidden" name="item[]" value="1"> 
        produto 1<br>
        quantidade
        <input type="number"  name="quantidade_nota[]" style="margin-left: 95px" required>
        descricao
        <input type="text"  name="descricao_nota[]" style="margin-left: 105px" required>
        valor
        <input type="number"  name="vr_unit_nota[]" placeholder="R$" style="margin-left: 65px" required>
        
      <br>  
</div>
<a href="#" onClick="adicionarProduto()">adicionar</a>
<input type="submit" class="cadastro_submit" value="CADASTRAR" >
        </form>
</div>