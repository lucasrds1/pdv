<?php
require $_SERVER["DOCUMENT_ROOT"]."/header.php";

if(!isset($_GET['dt']) && $_GET['dt'] !== 1){
    echo "<script>javascript:history.back()</script>";
}
testeacesso('4', $acesso);

?>
<div class="cabecalho_index">
    <span>PRODUTOS INICIAIS</span>
</div>
<br>
<?php
    if (in_array('7', $acesso) || in_array('1', $acesso)) {
        ?>
<button class="botao_adicionar" onclick="location.href= 'cadastro_estoqueFinal.php' ">ADICIONAR PRODUTO FINAL</button>
<hr>
<?php
    }
?>