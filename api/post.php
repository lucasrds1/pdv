<?php
require "../server.php";

$method = strtolower($_SERVER['REQUEST_METHOD']);
if($method == 'post'){
    $table = $_POST['table'];
    $column = implode(',', [$_POST['column']]);
    $values = implode(',', [$_POST['values']]);
    if($table && isset($column) && isset($values)){
        //$query = str_replace('-', ' ', $post);
        $query = "INSERT INTO $table ($column) VALUES ($values)";
        $sql = $pdo->query($query);
        if($sql){
            $arrayApi['result'] = 'Requisição realizada com sucesso '.$query;
            
        }else{
            $arrayApi['error'] = 'Erro na consulta';
        }
       
    }else{
        $arrayApi['error'] = 'Erro na requisição';
    }
}else{
    $arrayApi['error'] = 'Erro no metodo';
}

require "returnApi.php";

