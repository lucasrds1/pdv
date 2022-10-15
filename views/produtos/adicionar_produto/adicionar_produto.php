<div class="container_consulta">

<div class="cabecalho">
    <h1>TELA DE ADICIONAR PRODUTO</h1>
</div>
<hr>
<!-- COMEÇO DO FORMULÁRIO -->
<div class="consulta">
    <form method="GET">
        <fieldset>
            <legend>Consultar e adicionar</legend>
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
    </form>
    <form method="POST">
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
    <div class="dados_nota" >
                <input type="hidden" name="eNota" value="<?php echo $item['eNota']?>">
        <ul>
            <li>NOTA: 
                <input type="text" name="" value="<?php echo $item['eNota']?>" style="margin-left: 152px" disabled>
            </li>
            <li>QUANTIDADE: 
                <input type="number" name="quantidade" style="margin-left: 72px;width: 170px" >
            </li>
            <li>DESCRIÇÃO: 
                <input type="text" name="descricao" style="margin-left: 83px" >
            </li>
            <li>VALOR UNITÁRIO: 
                <input type="text" name="vr_unit" style="margin-left: 44px" >
            </li>
            <div class="consulta_opcoes">
                <input type="submit" class="cadastro_submit" value="CADASTRAR" >
            </div>
           
                        <!-- FINAL DO FOREACH -->
                        <?php endforeach;endif; ?>