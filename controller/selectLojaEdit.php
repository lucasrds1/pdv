<?php
$tip = array();
$idLoja = '';
$nomeLoja = '';
$edit = false;
if (isset($_GET['action']) && $_GET['action'] == 'editar') {
    $tip = array_keys($_GET);
    $lojas = new Loja($pdo, $_SESSION['codEmpresa'], $_SESSION['loja']);
    $dados = $lojas->qrySelectLojasEdit($tip[1], $_GET['id_cli']);
    if($dados[0] == true){
        $idLoja = $dados[0][0];
        $nomeLoja = $dados[0][1];
        $nomeLoja = strtoupper($nomeLoja);
        $edit = true;
    }
    
}
?>
<p>
        <label><b>LOJA:</b></label>
        <?php
        if(in_array('45', $acesso) || in_array('1', $acesso)){
            
        }else{
            $disabeld = 'disabled';
        }
        ?>
        <select name="loja_cliente" class="padrao_select" style="width:50%" <?=$disabeld?>>
        <?php
      //  $access = testeacesso('45', $acesso);
        if(in_array('45', $acesso) || in_array('1', $acesso)):
            if($edit == true){
                $selec = 'selected';
            }else{
                $selec = '';
            }
        ?>
            <option <?=$selec?> value="0">Todas</option>
        </p>
        <?php
        $lojas = new Loja($pdo, $_SESSION['codEmpresa'], $_SESSION['loja']);
        $return = $lojas->getLojas();
        foreach($return as $dados):
if ($edit == true) {
    ?>
        
        <option <?=$selec?> value="<?=$idLoja?>"><?=$idLoja?> - <?=$nomeLoja?></option>
        
        <?php
}else{
    ?>
        <option  value="<?=$dados['id_loja']?>"><?=$dados['id_loja']?> - <?=$dados['nome_loja']?></option>
    <?php
}
        endforeach;
        else: 
            $qry = "SELECT UPPER(nome_loja) nome_loja FROM cad_lojas WHERE id_empresa = ".$_SESSION['codEmpresa']." AND id_loja = ".$_SESSION['loja'];
            $res = $pdo->query($qry);
            $row = $res->fetchAll();
            if($_SESSION['loja'] !== 0){
                echo '<option selected value="'.$_SESSION['loja'].'">'.$row[0]['nome_loja'].'</option>';
            }else{
                echo '<option value="0">Todas</option>';
            }
        endif;
        ?>
        </select>
        <span class="desc_input">Necessita de permissão</span>