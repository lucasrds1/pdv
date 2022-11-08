<?php
require $_SERVER["DOCUMENT_ROOT"]."/header.php";

if(!isset($_GET['dt']) && $_GET['dt'] !== 1){
    echo "<script>javascript:history.back()</script>";
}
testeacesso('11', $acesso);

?>
<div class="container_cadastro">
<div class="cabecalho_index">
    <span>CONSULTAR GRUPOS</span>
</div><bR>
<?php
    if (in_array('10', $acesso) || in_array('1', $acesso)) {
        ?>
<button class="botao_adicionar" onclick="location.href= 'cadastro_grupos.php' ">ADICIONAR GRUPO</button>
<hr>
<?php
    }
?>