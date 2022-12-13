<?php
$nomeProduto = filter_input(INPUT_POST, 'nome_produto', FILTER_SANITIZE_SPECIAL_CHARS);
$codGpProduto = filter_input(INPUT_POST, 'cod_grupo_produto');
$codSubProduto = filter_input(INPUT_POST, 'cod_subg_produto');
$codMicroProduto = filter_input(INPUT_POST, 'cod_microg_produto');
$undEntProduto = filter_input(INPUT_POST, 'unid_ent_produto');
$qntEntEmbProduto = filter_input(INPUT_POST, 'qnt_emb_ent');
$undSaidaProduto = filter_input(INPUT_POST, 'unid_saida_produto');
$qntUndSaidaProduto = filter_input(INPUT_POST, 'qnt_unid_saida');
$descReduProduto = filter_input(INPUT_POST, 'desc_redu_produto', FILTER_SANITIZE_SPECIAL_CHARS);
$pesoLiquido = filter_input(INPUT_POST, 'peso_liquido');
$pesoBruto = filter_input(INPUT_POST, 'peso_bruto');
$codBarras = filter_input(INPUT_POST, 'cod_barra_produto');
$loja = filter_input(INPUT_POST, 'loja_cliente');
$submit = filter_input(INPUT_POST, 'submit');

if($submit == 'Cadastrar'){
    if($nomeProduto !== ''){
        $sql = "SELECT id_emp_produto FROM cad_produtos WHERE id_empresa = ".$_SESSION['codEmpresa'];
        if($_SESSION['loja'] > 0){
            $sql .= " AND id_loja = ".$_SESSION['loja'];
        }
        $qry = $pdo->query($sql);
       // var_dump($qry);exit;
        if ($qry->rowCount() > 0) {
            $res = $qry->fetch();
            $ultCod = $res['id_emp_produto'];
            $proxCod = '00'.$ultCod + 1;
        }else{
            $proxCod = '001';
        }
        if(isset($_POST)){
          ///  require $_SERVER["DOCUMENT_ROOT"]."/server.php";
            $estoque = new Estoque($pdo, $_SESSION['codEmpresa'], $_SESSION['id'], $_SESSION['loja']);
            $dados = $estoque->cadProdutoInicial(
                $proxCod, $nomeProduto, $codGpProduto, 
                $codSubProduto, $codMicroProduto, $undEntProduto, 
                $qntEntEmbProduto, $undSaidaProduto, $qntUndSaidaProduto,
                $descReduProduto, $pesoLiquido, $pesoBruto,
                $codBarras, $loja
            );
            if($dados == true){
                $acao = 'cadastrado';
                echo avisoCadEdit($acao, "../../views/estoque/consulta_produtos.php?dt=1", 'consulta');
            }else{
                $acao = 'cadastrar';
                echo erroCadEdit($acao);
            }
            

        }
        
    }else{
        echo '<p class="erro">Preencha o campo nome</p>';
    }
}