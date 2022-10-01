<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../../assets/styles/jquery.dataTables.min.css" rel="stylesheet">

</head>
<body>
    
<table id="tabela_consulta" class="display" style="width:100%">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Numero</th>    
            <th>Endereço</th>
            <th>CPF</th>  
        <tr>
    </thead>
    <tbody>
        <tr>
            <td>Lucas</td>
            <td>8889889</td>
            <td>avenida</td>
            <td>08912089331</td>
        </tr>
    </tbody>
</table>
</body>
</html>
<script src="assets/js/jquery-3.5.1.js"></script>
<script src="assets/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script>
$(document).ready(function () {
    $('#tabela_consulta').DataTable({
    });
});
</script>