<?php
require "../server.php";

$method = strtolower($_SERVER['REQUEST_METHOD']);
if($method == 'get'){
    $users = new Login($pdo);
    $dados = $users->getAllUsers();
    foreach($dados as $item){
        $arrayApi['result'][] = [
            'id' => $item['id'],
            'id_empresa' => $item['id_empresa'],
            'id_loja' => $item['id_loja'],
            'nome' => $item['nome'],
            'permissoes' => $item['permissoes'],
        ];
    }
}else{
    $arrayApi['error'] = 'ocorreu um erro';
}

require "returnApi.php";