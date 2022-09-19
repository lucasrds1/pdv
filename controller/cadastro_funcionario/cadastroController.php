<?php
$codEmpresa = filter_input(INPUT_POST, 'codEmpresa');
$nome = filter_input(INPUT_POST, 'nome_usuario', FILTER_SANITIZE_SPECIAL_CHARS);
$cpf = filter_input(INPUT_POST, 'cpf_usuario', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email_usuario', FILTER_VALIDATE_EMAIL);
$senha = filter_input(INPUT_POST, 'senha_usuario', FILTER_SANITIZE_SPECIAL_CHARS);
$dataNasc = filter_input(INPUT_POST, 'data_usuario', FILTER_SANITIZE_SPECIAL_CHARS);
$numero = filter_input(INPUT_POST, 'numero_usuario', FILTER_VALIDATE_INT);
$submit = filter_input(INPUT_POST, 'submit');
$insert = false;
$permissao = null;
if($submit == 'Cadastrar'){
    //if($nome != '' && $cpf && $email && $senha && $dataNasc && $numero){
    if(!empty($codEmpresa)){
    if(!empty($nome && $senha && $email && $dataNasc && $numero && $cpf)){
            if(strlen($cpf) == 11 && is_numeric($cpf)){
                $insert = true;
            }else{
                echo '<p class="erro">O cpf deve ter pelo menos 11 caracteres</p>';
                $insert = false;
            }
            if(strlen($senha) < 8){
                echo '<p class="erro">A senha deve ter pelo menos mais de 8 caracteres</p>';
                $insert = false;
            }else{
                $insert = true;
            }
            if(strlen($numero) !== 11 && is_numeric($numero)){
                echo '<p class="erro">O número deve possuir DDD e ter 11 caracteres</p>';
                $insert = false;
            }else{
                $insert = true;
            }
            if($insert == true){
                if($cadAdmin == 1){
                    $permissao = 'ADMIN';
                }
                $dados = $logar->cadUsuario($codEmpresa, $nome, $email, $senha, $dataNasc, $cpf, $numero, $permissao);
                if($dados == true){
                    if($cadAdmin == 1){
                        session_destroy();
                        header("Location: ../../login.php");
                    }
                }
            }
    }else{
        echo '<p class="erro">Preencha todos os campos!</p>';
    }
    }else{
        echo '<p class="erro">Código da empresa inexistente, Por favor contate o administrador!</p>';
    }
}