<?php
require "server.php";
class Produtos{
    private $pdo;
    public function __construct(){
        $dbname = "crud-vendas";
        $host = "localhost";
        $user = "root";
        $password = "";
        try {
            $this->pdo = new PDO("mysql:dbname=$dbname;host=$host", $user, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            header("Location: error.php");
        }
    }
    public function getAll(){
        $sql = "SELECT * FROM nota NATURAL JOIN itens_nota";
        $sql = $this->pdo->query($sql);
        if($sql->rowCount() > 0){
            return $sql->fetchAll();
        } 
    }
   public function getAll_nota_hoje(){
    $sql = "SELECT * FROM nota WHERE dataVenda = CURDATE()";
    $sql = $this->pdo->query($sql);
    //$sql->bindValue(':limite', $limite);
    $sql->execute();
    if($sql->rowCount() > 0){
        return $sql->fetchAll();
    }
   }
   public function consultar_nota($eNota){
    if($eNota != null){
        $sql = "SELECT * FROM nota /*INNER JOIN itens_nota ON nota.eNota=itens_nota.eNota*/ WHERE eNota = :eNota";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':eNota', $eNota);
        $sql->execute();
        if($sql->rowCount() > 0){
            return $sql->fetchAll();
        }else{
            echo '<div class="aviso_notaVazia">nota não encontrada!</div>';
        }
    }
    }

    // public function get_nota($eNota1){
    //     if($this->verificar_nota($eNota1) == false){
    //         return false;
    //     }else{
    //         return true;
    //     }
    // }

    public function consultar_itensNota($eNota){
        if($eNota != null){
            $sql = "SELECT * FROM itens_nota WHERE eNota = :eNota";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(':eNota', $eNota);
            $sql->execute();
            if($sql->rowCount() > 0){
                return $sql->fetchAll();
            }
        }
    }

    public function cadastrar_produto($eNota, $dataVenda, $formaPagamento, $observacao, $item){
        //1 passo = verificar se existe no sistema
        //2 passo = se nao existir, adiciona
        if($this->verificar_nota($eNota) == false){
            $item+1;
            $sql = "INSERT INTO nota  (eNota, dataVenda, formaPagamento, observacao, qntd_produtos) VALUES (:eNota, :dataVenda, :formaPagamento, :observacao, :item)";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(':eNota', $eNota);
            $sql->bindValue(':dataVenda', $dataVenda);
            $sql->bindValue(':formaPagamento', $formaPagamento);
            $sql->bindValue(':observacao', $observacao);
            $sql->bindValue(':item', $item);
            $sql->execute(); 
            // if($sql->execute()){
            //     //criar função para outro insert
            //     $sql = "INSERT INTO itens_nota (eNota, item, quantidade, descricao, vr_unit) VALUES (:eNota, :item, :quantidade, :descricao, :vr_unit)";
            //     $sql = $this->pdo->prepare($sql);
            //     $sql->bindValue(':eNota', $eNota);
            //     $sql->bindValue(':item', $item);
            //     $sql->bindValue(':quantidade', $quantidade);
            //     $sql->bindValue(':descricao', $descricao);
            //     $sql->bindValue(':vr_unit', $vr_unit);
            //     $sql->execute();
            //     echo '<div class="cadRealizado">cadastro realizado!</div>';
            // }
            
        }else{
            echo '<div class="aviso_notaVazia">essa nota ja existe</div>';
        }
    }
    public function cadastrar_itens($eNota, $quantidade, $descricao, $valor){
        $sql = "INSERT INTO itens_nota (eNota, quantidade, descricao, vr_unit) VALUES (:eNota, :quantidade, :descricao, :valor)";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':eNota', $eNota);
        //$sql->bindValue(':item', $item);
        $sql->bindValue(':quantidade', $quantidade);
        $sql->bindValue(':descricao', $descricao);
        $sql->bindValue(':valor', $valor);
        if($sql->execute()){
            echo '<div class="cadRealizado">cadastro realizado!</div>';
        }
    }

    public function verificar_nota($eNota){
        $sql = "SELECT * FROM nota WHERE eNota = :eNota";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':eNota', $eNota);
        $sql->execute();
        if($sql->rowCount() > 0){
            return true;
        }else{
            return false;
            //header("Location ../../crud/excluir_venda/excluir_venda.php");     
        }
    }
    public function excluirNota($eNota){
        if($eNota != ''){
            $sql = "DELETE nota, itens_nota FROM nota INNER JOIN itens_nota ON itens_nota.eNota = nota.eNota WHERE nota.eNota = :eNota";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(':eNota', $eNota);
            $sql->execute();
            echo '<script>alert("Venda excluida com sucesso!")</script>';
        }
    }
    public function editar_produto($eNota, $dataVenda, $formaPagamento, $observacao, $item, $quantidade, $descricao, $vr_unit){
        if($this->verificar_nota($eNota) == true){
            $sql = "UPDATE nota SET dataVenda = :dataVenda, formaPagamento = :formaPagamento, observacao = :observacao WHERE eNota = :eNota";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(':eNota', $eNota);
            $sql->bindValue(':dataVenda', $dataVenda);
            $sql->bindValue(':formaPagamento', $formaPagamento);
            $sql->bindValue(':observacao', $observacao);
            $sql->execute();
            if($sql->execute()){
                $sql = "UPDATE itens_nota SET item = :item, quantidade = :quantidade, descricao = :descricao, vr_unit = :vr_unit WHERE eNota = :eNota AND item = :item";
                $sql = $this->pdo->prepare($sql);
                $sql->bindValue(':eNota', $eNota);
                $sql->bindValue(':item', $item);
                $sql->bindValue(':quantidade', $quantidade);
                $sql->bindValue(':descricao', $descricao);
                $sql->bindValue(':vr_unit', $vr_unit);
                $sql->execute();
                echo '<div class="cadRealizado">edição realizado!</div>';
            }
        }else{
            echo 'nota nao existe';
        }
    }
    public function excluirNota_item($eNota, $item){
        if($this->verificar_nota($eNota) == true){
            $sql = "DELETE FROM itens_nota WHERE eNota = :eNota AND item = :item";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(':eNota', $eNota);
            $sql->bindValue(':item', $item);
            $sql->execute();
        }
    }
}
class Clientes{
    private $pdo;
    public function __construct(){
        $dbname = "crud-vendas";
        $host = "localhost";
        $user = "root";
        $password = "";
        try {
            $this->pdo = new PDO("mysql:dbname=$dbname;host=$host", $user, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            header("Location: error.php");
        }
    }
    public function cadEditCliente($codEmpresa, $submit, $idCliente, $nomeCliente, $numeroCliente, $enderecoCliente, $cpfCliente, $id){
        if($numeroCliente == ''){
            $numeroCliente = null;
        }else{
            $numeroCliente = addslashes(trim($numeroCliente));
        }
        if($enderecoCliente == ''){
            $enderecoCliente = null;
        }else{
            $enderecoCliente = addslashes(ucwords($enderecoCliente));
        }
        if($cpfCliente == ''){
            $cpfCliente = null;
        }else{
            $cpfCliente = addslashes(trim($cpfCliente));
        }
        $nomeCliente = addslashes(trim(ucwords($nomeCliente)));
        
    //if($submit == 'Cadastrar'){
            if($submit == 'Cadastrar'){
                if($this->valCpfCliente($codEmpresa, $cpfCliente, $submit) == false){
                    $sql = "INSERT INTO clientes
                    (cod_empresa, nome_cliente, numero_cliente, endereco_cliente, cpf_cliente, dta_ins_cli, usr_cli_id) 
                    VALUES (:codEmpresa, :nomeCliente, :numeroCliente, :enderecoCliente, :cpfCliente, CURRENT_TIMESTAMP, (SELECT nome FROM usuarios WHERE id = :id))";     
                }else{
                    echo '<p class="erro">Cpf já existe no sistema!</p>';
                    return false;
                }
                 }elseif($submit == 'Editar' && $idCliente !== ''){
                    if($this->valCpfCliente($codEmpresa, $cpfCliente, $submit, $idCliente) == false){ 
                $sql = "UPDATE clientes SET 
                        nome_cliente = :nomeCliente,
                        numero_cliente = :numeroCliente, 
                        endereco_cliente = :enderecoCliente, 
                        cpf_cliente = :cpfCliente,
                        dta_ins_cli = CURRENT_TIMESTAMP, 
                        usr_cli_id = (SELECT nome FROM usuarios WHERE id = :id) 
                        WHERE cod_empresa = :codEmpresa AND id_cliente = :idCliente";
            }else{
                echo '<p class="erro">Cpf já existe no sistema!</p>';
                return false;
            }
        }
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(':codEmpresa', $codEmpresa);
            $sql->bindValue(':nomeCliente', $nomeCliente);
            $sql->bindValue(':numeroCliente', $numeroCliente);
            $sql->bindValue(':enderecoCliente', $enderecoCliente); 
            $sql->bindValue(':cpfCliente', $cpfCliente); 
            $sql->bindValue(':id', $id); 
            $submit == 'Editar' ? $sql->bindValue(':idCliente', $idCliente) : '';
            if($sql->execute()){
            echo "<script>location.href= 'consulta_cliente.php'</script>";
            $_SESSION['aviso_edicao'] = '<h4 class="sucesso"><img src="../../assets/imagens/sucesso.png" width="40px" style="padding:5px">Cliente <b>editado</b> com sucesso!</h4>';
                //return true;
            }else{
                return false;
        }
   // }
    }
    public function excluirCli($codEmpresa, $idCliente){
        $sql = "DELETE FROM clientes WHERE cod_empresa = :codEmpresa AND id_cliente = :idCliente";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':codEmpresa', $codEmpresa);
        $sql->bindValue(':idCliente', $idCliente);
        if($sql->execute()){
            echo "<script>location.href= 'consulta_cliente.php'</script>";
            $_SESSION['aviso_edicao'] = '<h4 class="sucesso"><img src="../../assets/imagens/sucesso.png" width="40px" style="padding:5px">Cliente <b>excluído</b> com sucesso!</h4>';
        }else{
            return false;
        }
    }
    public function getAllCli($codEmpresa){
        if(isset($codEmpresa)){
            $sql = "SELECT * FROM clientes
            WHERE cod_empresa = :codEmpresa";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(':codEmpresa', $codEmpresa);
            if($sql->execute()){
                return $sql->fetchAll();
            }
        }
    }
    public function getAllEdtCli($codEmpresa, $idCliente){
        $sql = "SELECT * FROM clientes WHERE cod_empresa = :codEmpresa AND id_cliente = :idCliente";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':codEmpresa', $codEmpresa);
        $sql->bindValue(':idCliente', $idCliente);
        $sql->execute();
        if($sql->execute()){
            return $sql->fetchAll();
        }
    }
    public function valCpfCliente($codEmpresa, $cpfCliente, $submit, $idCliente = ''){
        if($cpfCliente == null){
            return false;
        }else{
            if($submit == 'Cadastrar'){
                $sql = "SELECT cpf_cliente FROM clientes WHERE cod_empresa = :codEmpresa AND cpf_cliente = :cpfCliente";
                $sql = $this->pdo->prepare($sql);
                $sql->bindValue(':codEmpresa', $codEmpresa);
                $sql->bindValue(':cpfCliente', $cpfCliente);
                $sql->execute();
                if($sql->rowCount() > 0){
                    return true;
                }else{
                    return false;
                }
            }elseif($submit == 'Editar'){
                $sql = "SELECT cpf_cliente FROM clientes WHERE cod_empresa = :codEmpresa AND cpf_cliente = :cpfCliente AND id_cliente <> :idCliente";
                $sql = $this->pdo->prepare($sql);
                $sql->bindValue(':codEmpresa', $codEmpresa);
                $sql->bindValue(':cpfCliente', $cpfCliente);
                $sql->bindValue(':idCliente', $idCliente);
                $sql->execute();
                if($sql->rowCount() > 0){
                    return true;
                }else{
                    return false;
                }
            }
            
        }
    }
}