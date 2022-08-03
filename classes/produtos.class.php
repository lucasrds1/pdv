<?php
class Produtos{
    private $pdo;

    public function __construct(){
        $dbname = "crud_vendas";
        $host = "localhost";
        $user = "root";
        $password = "";
        try {
            $this->pdo = new PDO("mysql:dbname=$dbname;host=$host", $user, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getAll_itensNota(){
        $sql = "SELECT * FROM itens_nota";
        $sql = $this->pdo->query($sql);
        if($sql->rowCount() > 0){
            return $sql->fetchAll();
        } 
       }

   public function getAll_nota(){
    $sql = "SELECT * FROM nota";
    $sql = $this->pdo->query($sql);
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

    public function cadastrar_produto($eNota, $dataVenda, $formaPagamento, $observacao, $quantidade, $descricao, $vr_unit){
        //1 passo = verificar se existe no sistema
        //2 passo = se nao existir, adiciona
        if($this->verificar_nota($eNota) == false){
            $sql = "INSERT INTO nota  (eNota, dataVenda, formaPagamento, observacao) VALUES (:eNota, :dataVenda, :formaPagamento, :observacao)";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(':eNota', $eNota);
            $sql->bindValue(':dataVenda', $dataVenda);
            $sql->bindValue(':formaPagamento', $formaPagamento);
            $sql->bindValue(':observacao', $observacao);
            //$sql->execute(); 
            if($sql->execute()){
                //criar função para esse insert
                $sql = "INSERT INTO itens_nota (eNota, quantidade, descricao, vr_unit) VALUES (:eNota, :quantidade, :descricao, :vr_unit)";
                $sql = $this->pdo->prepare($sql);
                $sql->bindValue(':eNota', $eNota);
                $sql->bindValue(':quantidade', $quantidade);
                $sql->bindValue(':descricao', $descricao);
                $sql->bindValue(':vr_unit', $vr_unit);
                $sql->execute();
                echo '<div class="cadRealizado">cadastro realizado!</div>';
            }
            
        }else{
            echo '<div class="aviso_notaVazia">essa nota ja existe</div>';
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