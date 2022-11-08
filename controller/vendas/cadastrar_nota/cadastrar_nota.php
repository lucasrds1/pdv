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
//primeiro cadastro a nota no formulario get -> depois eu pego a nota no outro formulario post que gerar pelo $_GET e o input disabled
?>
        <?php
        $dados = filter_input_array(INPUT_POST);
        if($dados > 1){
            if(!empty($dados)){
            foreach($dados['eNota'] as $chave => $eNota){    
                $dataVenda = $dados['data_venda'][$chave];
                $formaPagamento = $dados['forma_pagamento'][$chave];
                $observacao = $dados['observacao_nota'][$chave];
                $item = $dados['item'][$chave];
              
                if($eNota && $dataVenda && $formaPagamento && $item){
                    $produtos->cadastrar_produto($eNota, $dataVenda, $formaPagamento, $observacao, $item);
                }
            }
            // echo "Nota:". $eNota;
            // echo "<br>data da venda:". $dataVenda;
            // echo "<br>forma pgm:". $formaPagamento;
            // echo "<br>obs:". $observacao;
            // echo "<hr>";
            foreach($dados['quantidade_nota'] as $chave => $quantidade){      
                $descricao = $dados['descricao_nota'][$chave];
                $valor = $dados['vr_unit_nota'][$chave];
                
                echo "<br>Quantidade: $quantidade <br>";
                echo "Descrição:". $descricao."<br>";
                echo "Valor:". $valor."<br>";
                echo "<hr>";

                if($eNota && $quantidade && $descricao && $valor){
                $produtos->cadastrar_itens($eNota, $quantidade, $descricao, $valor);
                }else{
                    echo '<div class="aviso_notaVazia">Preencha todos os campos</div>';
                }
            }
            }else{
            echo '<div class="aviso_notaVazia">Preencha todos os campos</div>';
            }
        }
        ?>
    </div>
</div>
            </fieldset>
        </form>
    </div>
</div>
<script src="../../assets/js/script.js"></script>


