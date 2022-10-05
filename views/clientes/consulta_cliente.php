<?php
require '../../views/partials/header/header.php';
?>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../../assets/datatables/bootstrap/css/bootstrap.min.css">
    <!-- CSS personalizado --> 
    <link rel="stylesheet" href="../../assets/datatables/main.css">  
      
    <!--datables CSS básico-->
    <link rel="stylesheet" type="text/css" href="../../assets/datatables/datatables.min.css"/>
    <!--datables estilo bootstrap 4 CSS-->  
    <link rel="stylesheet"  type="text/css" href="../../assets/datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
           
    <!--font awesome con CDN-->  
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">  
      

<div class="container_cadastro">
<div class="cabecalho_index">
       <span>CONSULTA DE CLIENTES</span>
</div>
<div class="form_consulta">
<div class="container">
    <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">        
                    <table id="tabela_consulta" style="font-size:13px" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Ações</th>
            <th>Nome</th>
            <th>Numero</th>    
            <th>Endereço</th>
            <th>CPF</th>  
            <th>Data da última alteração</th>
            <th>Última alteração</th>
        </tr>
    </thead>
    <tbody>
<?php
$clientes = new Clientes();
$dados = $clientes->getAllCli($_SESSION['codEmpresa']);
if($dados > 0){
foreach($dados as $dado){
?>

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
    <!-- jQuery, Popper.js, Bootstrap JS -->
    <script src="../../assets/datatables/jquery/jquery-3.3.1.min.js"></script>
    <script src="../../assets/datatables/popper/popper.min.js"></script>
    <script src="../../assets/datatables/bootstrap/js/bootstrap.min.js"></script>
      
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
				text:      '<i class="fas fa-file-excel">&nbsp;Excel</i> ',
				titleAttr: 'Exportar para Excel',
				className: 'btn btn-success'
			},
			{
				extend:    'pdfHtml5',
				text:      '<i class="fas fa-file-pdf">&nbsp;PDF</i> ',
				titleAttr: 'Exportar para PDF',
				className: 'btn btn-danger'
			},
			{
				extend:    'print',
				text:      '<i class="fa fa-print">&nbsp;Imprimir</i> ',
				titleAttr: 'Imprimir',
				className: 'btn btn-info'
			},
		]	        
    });     
});
</script>


