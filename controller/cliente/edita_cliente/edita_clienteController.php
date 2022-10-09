<?php
// $nomeCli = filter_input(INPUT_POST, 'nome_cliente', FILTER_SANITIZE_SPECIAL_CHARS);
// $numeroCli = filter_input(INPUT_POST, 'numero_cliente', FILTER_VALIDATE_INT);
// $enderecoCli = filter_input(INPUT_POST, 'endereco_cliente', FILTER_SANITIZE_SPECIAL_CHARS);
// $cpfCli = filter_input(INPUT_POST, 'cpf_cliente', FILTER_SANITIZE_NUMBER_INT);
// $submit = filter_input(INPUT_POST, 'submit');
// $insert = false;
// if($submit == 'Editar'){
//     if(!empty($nomeCliente)){
//         $insert = true;
//         if(strlen($nomeCliente) < 5){
//             echo '<p class="erro">O nome deve ter mais de 5 caracteres</p>';
//             $insert = false;
//         }
//         if($cpfCliente){
//             if(strlen($cpfCliente) !== 11 && !is_numeric($cpfCliente)){
//                 echo '<p class="erro">O cpf deve ter pelo menos 11 caracteres</p>';
//                 $insert = false;   
//             }
//         }
//         if($numeroCliente){
//             if(strlen($numeroCliente) !== 11 && is_numeric($numeroCliente)){
//                 echo '<p class="erro">O número deve possuir DDD e ter 11 caracteres</p>';
//                 $insert = false;
//             }
//         }
// }