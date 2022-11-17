<?php
$codGrupo = filter_input(INPUT_POST, 'cod_grupo');
$nomeGrupo = filter_input(INPUT_POST, 'nome_grupo');
$descGrupo = filter_input(INPUT_POST, 'desc_grupo');
$situGrupo = filter_input(INPUT_POST, 'situ_grupo', FILTER_VALIDATE_INT);
$submit = filter_input(INPUT_POST, 'submit');
$acao = 'Editado';
if ($submit == 'Editar') {
    if ($nomeGrupo) {
        $grupos = new Grupos($pdo, $_SESSION['codEmpresa']);
        $dados = $grupos->editaGrupo($codGrupo, $nomeGrupo, $descGrupo, $situGrupo, $_SESSION['id']);
        if ($dados == true) {
            echo avisoCadEdit($acao, "../../views/estoque/consulta_grupos.php?dt=1", 'consulta');
        } else {
            echo erroCadEdit($acao);
        }
    } else {
        echo '<br><p class="erro">O nome do grupo deve ser preenchido!</p>';
    }
}