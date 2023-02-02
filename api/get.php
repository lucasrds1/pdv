<?php
require "../server.php";

$method = strtolower($_SERVER['REQUEST_METHOD']);
if($method == 'get'){
    $get = $_GET['sql'];

    if($get){
        $query = str_replace('-', ' ', $get);
        $sql = $pdo->query($query);
        if($sql){
            $res = $sql->fetchAll();
            //var_dump($res);
            $i = -1;
            foreach($res as $lin){
                $i++;
               // echo $lin;
                $arrayApi['result'][] = [
                    'res'.$i => $lin
                ];
            }
            
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