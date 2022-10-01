<?php
require '../../views/partials/header/header.php';
?>
<div class="container_cadastro">
<div class="cabecalho">
    <h1>CONSULTAR CLIENTE</h1>
</div>
<hr>
<div class="form_consulta">
<table id="tabela_consulta" class="display" style="width:100%">
    <thead>
        <tr>
            <th>Ações</th>
            <th>Nome</th>
            <th>Numero</th>    
            <th>Endereço</th>
            <th>CPF</th>  
            <th>Data de cadastro</th>
            <th>Usuário que cadastrou</th>
        </tr>
    </thead>

<?php
$clientes = new Clientes();
$dados = $clientes->getAllCli($_SESSION['codEmpresa']);
if($dados > 0){
foreach($dados as $dado){
?>

    <tbody>
        <tr>
            <td></td>
            <td><?=$dado['nome_cliente']?></td>
            <td><?=$dado['numero_cliente'] == null ? '<span class="vazioTabela">Nenhum</span>' : $dado['numero_cliente']?></td>
            <td><?=$dado['endereco_cliente'] == null ? '<span class="vazioTabela">Nenhum</span>' : $dado['endereco_cliente']?></td>
            <td><?=$dado['cpf_cliente'] == null ? '<span class="vazioTabela">Nenhum</span>' : $dado['cpf_cliente']?></td>
            <td><?php echo date('d/m/Y', strtotime($dado['dta_ins_cli']))?></td>
            <td><?=$dado['usr_cli_id']?></td>


        </tr>
        <?php
}}
        ?>
    </tbody>
</table>
</div>

<script src="../../assets/js/jquery-3.5.1.js"></script>
<script src="../../assets/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="../../assets/js/moment.min.js" type="text/javascript"></script>
<script>
$(document).ready(function () {
    $('#tabela_consulta').DataTable({
    sort: true,
    searching: true,    
    order: [[ 2, 'asc' ]]
    });
});
</script>


