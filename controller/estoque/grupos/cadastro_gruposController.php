<?php

$nomeGrupo = filter_input(INPUT_POST, 'nome_grupo');
$descGrupo = filter_input(INPUT_POST, 'desc_grupo');
$situGrupo = filter_input(INPUT_POST, 'situ_grupo', FILTER_VALIDATE_INT);
$submit = filter_input(INPUT_POST, 'submit');
$acao = 'Cadastrado';
if($submit == 'Cadastrar'){
   if($nomeGrupo){

        $qry = $pdo->query("SELECT id_grupo FROM tab_grupo WHERE id_empresa = ".$_SESSION['codEmpresa']." ORDER BY id_grupo DESC limit 1");
        $res = $qry->fetch();
        if(count($res) > 0){
            $ultGrupo = $res['id_grupo'];
            $proxGrupo = $ultGrupo + 1;
            $grupos = new Grupos($pdo);
            $dados = $grupos->cadGrupo($nomeGrupo, $descGrupo, $situGrupo, $proxGrupo, $_SESSION['codEmpresa'], $_SESSION['id']);
            if($dados == true){
                echo avisoCadEdit($acao, "../../views/estoque/consulta_grupos.php?dt=1", 'consulta');
            }else{
                echo erroCadEdit($acao);
            }
        }else{
            $ultGrupo = 0;
        }
        
    }else{
        echo '<br><p class="erro">O nome do grupo deve ser preenchido!</p>';
        $insert = false;
    }
}