<?php
$nomeCliente = filter_input(INPUT_POST, 'nome_cliente', FILTER_SANITIZE_SPECIAL_CHARS);
$numeroCliente = filter_input(INPUT_POST, 'numero_cliente', FILTER_VALIDATE_INT);
$enderecoCliente = filter_input(INPUT_POST, 'endereco_cliente', FILTER_SANITIZE_SPECIAL_CHARS);
$cpfCliente = filter_input(INPUT_POST, 'cpf_cliente', FILTER_SANITIZE_NUMBER_INT);
$submit = filter_input(INPUT_POST, 'submit');
$insert = false;
if($submit == 'Cadastrar'){
    if(!empty($nomeCliente)){
        $insert = true;
        if(strlen($nomeCliente) > 5){
            $insert = true;
        }else{
            echo '<p class="erro">O nome deve ter mais de 5 caracteres</p>';
            $insert = false;
        }
        if($cpfCliente){
            if(strlen($cpfCliente) == 11 && is_numeric($cpfCliente)){
                $insert = true;    
            }else{
                echo '<p class="erro">O cpf deve ter pelo menos 11 caracteres</p>';
                $insert = false;
            }
        }
        if($numeroCliente){
            if(strlen($numeroCliente) !== 11 && is_numeric($numeroCliente)){
                echo '<p class="erro">O número deve possuir DDD e ter 11 caracteres</p>';
                $insert = false;
            }
        }
        if($insert == true && isset($_SESSION['codEmpresa']) && isset($_SESSION['id'])){
            $cadCliente = new Clientes();
            $dados = $cadCliente->cadCliente($_SESSION['codEmpresa'], $nomeCliente, $numeroCliente, $enderecoCliente, $cpfCliente, $_SESSION['id']);
            if($dados == true){
                echo '<p class="sucesso">Cliente cadastrado com sucesso!</p>';
            }else{
                echo '<p class="erro">Ocorreu um erro ao cadastrar o cliente!</p>';

            }
        }
    }else{
        echo '<p class="erro">Preencha o campo nome</p>';
    }
}
    