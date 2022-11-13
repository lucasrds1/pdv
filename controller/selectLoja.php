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