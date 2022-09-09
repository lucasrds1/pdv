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
        // $eNota = filter_input(INPUT_POST, 'eNota', FILTER_VALIDATE_INT);
        // $dataVenda = filter_input(INPUT_POST, 'data_venda');
        // $formaPagamento = filter_input(INPUT_POST, 'forma_pagamento', FILTER_SANITIZE_SPECIAL_CHARS);
        // $observacao = filter_input(INPUT_POST, 'observacao_nota', FILTER_SANITIZE_SPECIAL_CHARS);
        // $item = filter_input(INPUT_POST, 'item');
        // $quantidade = filter_input(INPUT_POST, 'quantidade_nota', FILTER_VALIDATE_INT);
        // $descricao = filter_input(INPUT_POST, 'descricao_nota', FILTER_SANITIZE_SPECIAL_CHARS);
        // $vr_unit = filter_input(INPUT_POST, 'vr_unit_nota');
        $dados = filter_input_array(INPUT_POST);
        var_dump($dados);
        if(isset($dados)){

            foreach($dados['eNota'] as $chave => $eNota){    
            //$eNota = $dados['eNota'];
                $dataVenda = $dados['data_venda'][$chave];
                $formaPagamento = $dados['forma_pagamento'][$chave];
                $observacao = $dados['observacao_nota'][$chave];
                $item = $dados['item'][$chave];
              
                if($eNota && $dataVenda && $formaPagamento && $item){
                    $produtos->cadastrar_produto($eNota, $dataVenda, $formaPagamento, $observacao, $item);
                }
            }
            
            echo "Nota:". $eNota;
            echo "<br>data da venda:". $dataVenda;
            echo "<br>forma pgm:". $formaPagamento;
            echo "<br>obs:". $observacao;
            echo "<hr>";

            foreach($dados['quantidade_nota'] as $chave => $quantidade){      
               // $quantidade = $dados['quantidade_nota'][$chave];
             //   $eNota = $dados['eNota'][$chave];
                $descricao = $dados['descricao_nota'][$chave];
                $valor = $dados['vr_unit_nota'][$chave];
                
                echo "<br>Quantidade: $quantidade <br>";
                echo "Descrição:". $descricao."<br>";
                echo "Valor:". $valor."<br>";
                echo "<hr>";

                $produtos->cadastrar_itens($eNota, $quantidade, $descricao, $valor);
                // $query = "INSERT INTO itens_nota (quantidade, descricao, vr_unit) VALUE (:quantidade_nota, :descricao_nota, :vr_unit_nota)";
                // $sql = $pdo->prepare($query);
                
            }
        }else{
            echo 'error';
        }
        // if($eNota && $dataVenda && $formaPagamento && $item && $quantidade && $descricao && $vr_unit){
        //     $produtos->cadastrar_produto($eNota, $dataVenda, $formaPagamento, $observacao, $item, $quantidade, $descricao, $vr_unit);
        // }
        ?>
    </div>
</div>
            </fieldset>
        </form>
    </div>
</div>
<script src="../../assets/js/script.js"></script>


