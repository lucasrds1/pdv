<?php
require '../../views/partials/header/header.php';
// require '../../views/cadastro_produto/cadastro_produto.php';
?>
<div class="cabecalho">
    <h1>TELA DE CADASTRO</h1>
</div>
<hr>
<?php
require '../../views/cadastro_produto/cadastro_produto.php';
?>
        <?php
        $eNota = filter_input(INPUT_POST, 'eNota', FILTER_VALIDATE_INT);
        $dataVenda = filter_input(INPUT_POST, 'data_venda');
        $formaPagamento = filter_input(INPUT_POST, 'forma_pagamento', FILTER_SANITIZE_SPECIAL_CHARS);
        $observacao = filter_input(INPUT_POST, 'observacao_nota', FILTER_SANITIZE_SPECIAL_CHARS);
        $quantidade = filter_input(INPUT_POST, 'quantidade_nota', FILTER_VALIDATE_INT);
        $descricao = filter_input(INPUT_POST, 'descricao_nota', FILTER_SANITIZE_SPECIAL_CHARS);
        $vr_unit = filter_input(INPUT_POST, 'vr_unit_nota');

        if($eNota && $dataVenda && $formaPagamento && $quantidade && $descricao && $vr_unit){
            $produtos->cadastrar_produto($eNota, $dataVenda, $formaPagamento, $observacao, $quantidade, $descricao, $vr_unit);
            
            //$produtos->cadastrar_itens($eNota, $item, $quantidade, $descricao, $vr_unit);
        }
        ?>
    </div>
</div>
            </fieldset>
        </form>
    </div>
</div>


