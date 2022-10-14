<?php
isset($_GET['id_cli']) ? $idCliente = $_GET['id_cli'] : $idCliente = null;
isset($_POST['checkcpf']) ? $checkcpf = $_POST['checkcpf'] : $checkcpf = null;
$nomeCliente = filter_input(INPUT_POST, 'nome_cliente', FILTER_SANITIZE_SPECIAL_CHARS);
$numeroCliente = filter_input(INPUT_POST, 'numero_cliente');
$enderecoCliente = filter_input(INPUT_POST, 'endereco_cliente', FILTER_SANITIZE_SPECIAL_CHARS);
$cpfCliente = filter_input(INPUT_POST, 'cpf_cliente');
$submit = filter_input(INPUT_POST, 'submit');
$insert = false;
if($submit == 'Cadastrar' || $submit == 'Editar'){
    if(!empty($nomeCliente)){
        $insert = true;
        if(strlen($nomeCliente) < 5){
            echo '<p class="erro">O nome deve ter mais de 5 caracteres!</p>';
            $insert = false;
        }
        if($cpfCliente){
            if(strlen($cpfCliente) !== 11 && !is_numeric($cpfCliente)){
                echo '<p class="erro">O cpf deve ter pelo menos 11 caracteres!</p>';
                $insert = false;   
            }
        }
        if($numeroCliente){
            if(strlen($numeroCliente) == 11 && is_numeric($numeroCliente)){
               
            }else{
                echo '<p class="erro">O número deve possuir DDD e ter 11 caracteres!</p>';
                $insert = false;
            }
        }

        if($insert == true && isset($_SESSION['codEmpresa']) && isset($_SESSION['id'])){
            $cadCliente = new Clientes();
            $dados = $cadCliente->cadEditCliente($_SESSION['codEmpresa'], $submit, $idCliente, $nomeCliente, $numeroCliente, $enderecoCliente, $cpfCliente, $_SESSION['id']);
            // }elseif($submit == 'Editar'){
            //     $dados = $cadCliente->cadEditCliente($_SESSION['codEmpresa'], $submit, $nomeCliente, $numeroCliente, $enderecoCliente, $cpfCliente, $_SESSION['id']);
            // }
            if($dados == true){
                if($submit == 'Cadastrar'){
                    echo '<h4 class="sucesso"><img src="../../assets/imagens/sucesso.png" width="40px" style="padding:5px">Cliente <b>editado</b> com sucesso!</h4>';
                }elseif($submit == 'Editar'){
                    echo '<p class="sucesso">Cliente editado com sucesso!</p>';
                }
            }
        }
    }else{
        echo '<p class="erro">Preencha o campo nome</p>';
    }
}
?>
    