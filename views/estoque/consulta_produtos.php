<?php
require $_SERVER["DOCUMENT_ROOT"]."/header.php";

if(!isset($_GET['dt']) && $_GET['dt'] !== 1){
    echo "<script>javascript:history.back()</script>";
}
testeacesso('4', $acesso);

?>
<div class="cabecalho_index"  style="padding:0px">
    <span>PRODUTOS INICIAIS</span>
</div>
<br>
<?php
    if (in_array('7', $acesso) || in_array('1', $acesso)) {
        ?>
<button class="botao_adicionar" onclick="location.href= 'cadastro_produtos.php' ">ADICIONAR PRODUTO INICIAL</button>
<hr>
<?php
    }
    ?>
<div class="form_consulta">
    <?php
        if (isset($_SESSION['aviso_edicao'])) {
            echo $_SESSION['aviso_edicao'].'<br>';
            unset($_SESSION['aviso_edicao']);
        }
        if (isset($_SESSION['aviso'])) {
            echo $_SESSION['aviso'];
            unset($_SESSION['aviso']);
        }
    ?>
<div class="container">
    <div class="row">
    <div class="col-lg-12">
    <div class="table-responsive">        
    <table id="tabela_consulta" style="font-size:13px" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th class="not-export-col">Ações</th>
            <th>Loja</th>
            <th>Código do produto</th>
            <th>Descrição/Nome</th>
            <th>Cód. Grupo</th>    
            <th>Cód. Subgrupo</th>
            <th>Cód. Microgrupo</th>  
            <th>Descrição resumida</th>
            <th>Unidade de entrada</th>
            <th>Qntd. Embalagem de entrada</th>
            <th>Unidade de saída</th>
            <th>Qntd. Unid. Saída</th>
            <th>Peso Liquído</th>
            <th>Peso Bruto</th>
            <th>Data alteração</th>
            <th>User. Alteração</th>
        </tr>
    </thead>
    <tbody>
<?php
    $clientes = new Estoque($pdo, $_SESSION['codEmpresa'], $_SESSION['id'], $_SESSION['loja']);
    $estoque = $clientes->getAllProdutos();
    
    if ($estoque > 0) {
        foreach ($estoque as $dado) {
            $idlojas = "SELECT nome_loja FROM cad_lojas WHERE id_empresa = ".$_SESSION['codEmpresa']." AND id_loja = ".$dado['id_loja'];
            $res = $pdo->query($idlojas);
            if($res->rowCount() > 0){
                $row = $res->fetch();
                $nomeLoja = $row['nome_loja'];
            }
            
            ?>
        <tr>
            <td class="not-export-col">
                <a href="edita_produtos.php?action=editar&id_cli=<?=$dado['id_produto']?>"><img src="../../assets/imagens/editar.png" style="width: 22px" title="Editar"></a>
                <img onclick="excluir('../../controller/cliente/excluir_cliente/permissoes_excluirController.php?action=excluir&id_cli=<?=$dado['id_produto']?>')" src="../../assets/imagens/excluir.png" style="width: 22px;cursor:pointer" title="Excluir"></a>
            </td>
            <td><?=$dado['id_loja'] == 0 ? '<span class="vazioTabela">Todas</span>' : strtoupper($nomeLoja)?></td>
            <td><?=$dado['id_emp_produto']?></td>
            <td><?=$dado['descricao']?></td>
            <td><?=$dado['cod_grupo'] == null ? '<span class="vazioTabela">Nenhum</span>' : $dado['cod_grupo']?></td>
            <td><?=$dado['cod_subgrupo'] == null ? '<span class="vazioTabela">Nenhum</span>' : $dado['cod_subgrupo']?></td>
            <td><?=$dado['cod_microgrupo'] == null ? '<span class="vazioTabela">Nenhum</span>' : $dado['cod_microgrupo']?></td>
            <td><?=$dado['descr_resumida'] == null ? '<span class="vazioTabela">Nenhum</span>' : $dado['descr_resumida']?></td>
            <td><?=$dado['unidade_entrada'] == null ? '<span class="vazioTabela">Nenhum</span>' : $dado['unidade_entrada']?></td>
            <td><?=$dado['qt_emb_entrada'] == null ? '<span class="vazioTabela">Nenhum</span>' : $dado['qt_emb_entrada']?></td>
            <td><?=$dado['unidade_saida'] == null ? '<span class="vazioTabela">Nenhum</span>' : $dado['unidade_saida']?></td>
            <td><?=$dado['qt_unid_saida'] == null ? '<span class="vazioTabela">Nenhum</span>' : $dado['qt_unid_saida']?></td>
            <td><?=$dado['peso_liquido'] == null ? '<span class="vazioTabela">Nenhum</span>' : $dado['peso_liquido']?></td>
            <td><?=$dado['peso_bruto'] == null ? '<span class="vazioTabela">Nenhum</span>' : $dado['peso_bruto']?></td>
            <td><?php echo date('d/m/Y - H:i:s', strtotime($dado['dta_ins_produto']))?></td>
            <td><?=$dado['usr_ins_produto']?></td>
        </tr>
<?php
        }
    }
?>
    </tbody>

</table>
</div></div></div></div></div>
    
    <!-- sweetalert2 -->
    <script src="../../assets/swalert/sweetalert2.js"></script>

    <!-- jQuery, Popper.js, Bootstrap JS -->
    <script src="../../assets/datatables/jquery/jquery-3.3.1.min.js"></script>
    <script src="../../assets/datatables/popper/popper.min.js"></script>
    <script src="../../assets/datatables/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../assets/js/script.js"></script>
    <!-- datatables JS -->
    <script type="text/javascript" src="../../assets/datatables/datatables.min.js"></script>    
     
    <!-- para usar botones en datatables JS -->  
    <script src="../../assets/datatables/Buttons-1.5.6/js/dataTables.buttons.min.js"></script>  
    <script src="../../assets/datatables/JSZip-2.5.0/jszip.min.js"></script>    
    <script src="../../assets/datatables/pdfmake-0.1.36/pdfmake.min.js"></script>    
    <script src="../../assets/datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
    <script src="../../assets/datatables/Buttons-1.5.6/js/buttons.html5.min.js"></script>
     
<script>
$(document).ready(function() {    
    $('#tabela_consulta').DataTable({        
        language: {
                "lengthMenu": "Mostrar _MENU_ registros",
                "zeroRecords": "Nenhum resultado encontrado",
                "info": "Mostrando de <span class='registros_numero'>_START_</span> até <span class='registros_numero'>_END_</span> de <span class='registros_numero_total'>_TOTAL_</span> registros",
                "infoEmpty": "Mostrando de 0 até 0 de 0 registos",
                "infoFiltered": "(filtrado de MAX registos no total)",
                "sSearch": "Pesquisar:",
                "oPaginate": {
                    "sFirst": "Primeiro",
                    "sLast":"Último",
                    "sNext":"Seguinte",
                    "sPrevious": "Anterior"
			     },
			     "sProcessing":"Procesando...",
            },
        //para usar los botones   
        responsive: "true",
        dom: 'Bfrtilp',       
        buttons:[ 
			{
				extend:    'excelHtml5',
				text:      '<i class="fas fa-file-excel">&nbsp;</i> ',
				titleAttr: 'Exportar para Excel',
				className: 'btn btn-success',
                exportOptions: {
                    columns: [1,2,3,4,5,6]
                }
			},
			{
				extend:    'pdfHtml5',
				text:      '<i class="fas fa-file-pdf">&nbsp;</i> ',
				titleAttr: 'Exportar para PDF',
				className: 'btn btn-danger',
                exportOptions: {
                    columns: [1,2,3,4,5,6]
                }
			},
			{
				extend:    'print',
				text:      '<i class="fa fa-print">&nbsp;</i> ',
				titleAttr: 'Imprimir',
				className: 'btn btn-info',
                exportOptions: {
                    columns: [1,2,3,4,5,6]
                }
			},
		],
        order: [[5, 'desc']],  
    });     
});

</script>
