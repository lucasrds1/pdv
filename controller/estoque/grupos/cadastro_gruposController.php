<?php

$nomeGrupo = filter_input(INPUT_POST, 'nome_grupo');
$descGrupo = filter_input(INPUT_POST, 'desc_grupo');
$situGrupo = filter_input(INPUT_POST, 'situ_grupo', FILTER_VALIDATE_INT);
$submit = filter_input(INPUT_POST, 'submit');
$acao = 'Cadastrado';
if($submit == 'Cadastrar'){
   if($nomeGrupo){

        $qry = $pdo->query("SELECT id_gp_empresa FROM tab_grupo WHERE id_empresa = ".$_SESSION['codEmpresa']." ORDER BY id_gp_empresa DESC limit 1");
        if ($qry->rowCount() > 0) {
            $res = $qry->fetch();
            $ultGrupo = $res['id_gp_empresa'];
            $proxGrupo = $ultGrupo + 1;
        }else{
            $proxGrupo = 1100;
        }
            $grupos = new Grupos($pdo, $_SESSION['codEmpresa']);
            $dados = $grupos->cadGrupo($nomeGrupo, $descGrupo, $situGrupo, $proxGrupo, $_SESSION['id']);
            if($dados == true){
                echo avisoCadEdit($acao, "../../views/estoque/consulta_grupos.php?dt=1", 'consulta');
            }else{
                echo erroCadEdit($acao);
            }
    }else{
        echo '<br><p class="erro">O nome do grupo deve ser preenchido!</p>';
        $insert = false;
    }
}