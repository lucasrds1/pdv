<?php
require $_SERVER["DOCUMENT_ROOT"]."/server.php";
$logar = new Login($pdo);
$logar->verificar($_SESSION['id']);
$acesso = $logar->permissao($_SESSION['id']);
if(in_array('9', $acesso) || in_array('1', $acesso)){
}else{
    echo "<script>javascript:history.back()</script>";
    $_SESSION['aviso'] = avisoPermissao();
}
if(isset($_GET['action']) && $_GET['action'] == 'Excluir' && isset($_GET['id_gp'])){

}else{
    header("Location: ../../../views/estoque/consulta_grupos.php?dt=1");
}
    $grupos = new Grupos($pdo, $_SESSION['codEmpresa']);
    $dado = $grupos->excluirGrupo($_GET['id_gp']);
if ($dado == true) {
    $_SESSION['aviso'] = avisoCadEdit('excluído', '../../views/estoque/consulta_grupos.php?dt=1', 'consulta');
}