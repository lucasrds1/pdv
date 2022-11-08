<?php
function avisoCadEdit($acao, $link, $tela){
    return "<script src='../../assets/swalert/sweetalert2.js'></script><script>avisoCadEdit('".$acao."', '".$link."', '".$tela."')</script>";
}
function excluirCliJS($link){
    return "<script src='../../assets/swalert/sweetalert2.js'></script><script>excluir(".$link.")</script>";
}
function avisoPermissao(){
    return "<script src='../../assets/swalert/sweetalert2.js'></script><script>avisoPermissao()</script>";
}
function erroCadEdit($acao){
    return "<script src='../../assets/swalert/sweetalert2.js'></script><script>erroCadEdit(".$acao.")</script>";
}
function testeacesso($n, $acesso){
    if(in_array('1', $acesso) || in_array($n, $acesso)){
        return true;
    }else{
        $_SESSION['aviso'] = avisoPermissao();
        echo "<script>javascript:history.back()</script>";
    }
}