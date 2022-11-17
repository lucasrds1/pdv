<?php
class Produtos{
    private $pdo;
    public function __construct($driver){
        $this->pdo = $driver;
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
class Estoque{
    private $pdo;
    private $idEmpresa;
    public function __construct($driver, $codEmpresa){
        $this->pdo = $driver;
        $this->idEmpresa = $codEmpresa;
    }
    public function getAllProdutos(){;
        $sql = "SELECT * FROM cad_produtos WHERE id_empresa = ".$this->idEmpresa;
        $sql = $this->pdo->query($sql);
        if($sql->rowCount() > 0){
            return $sql->fetchAll();
        }
    }
}
class Grupos{
    private $pdo;
    private $idEmpresa;
    public function __construct($driver, $codEmpresa){
        $this->pdo = $driver;
        $this->idEmpresa = $codEmpresa;
    }
    public function getAllGrupo(){
        $sql = "SELECT * FROM tab_grupo WHERE id_empresa = ".$this->idEmpresa;
        $sql = $this->pdo->query($sql);
        if($sql->rowCount()){
            return $sql->fetchAll();
        }
    }
    public function cadGrupo($nomeGrupo, $descGrupo, $situGrupo, $proxGrupo, $id){
        $sql = "INSERT INTO tab_grupo 
        (id_empresa, id_gp_empresa, nome_grupo, desc_grupo, id_situ, usr_ins_grupo, dta_ins_grupo)
        VALUES
        (:codEmpresa, :proxGrupo, :nomeGrupo, :descGrupo, :situGrupo,
        (SELECT nome FROM cad_usuarios WHERE id_empresa = ".$this->idEmpresa." AND id = :id),
        CURRENT_TIMESTAMP)";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':codEmpresa', $this->idEmpresa);
        $sql->bindValue(':proxGrupo', $proxGrupo);
        $sql->bindValue(':nomeGrupo', $nomeGrupo);
        $sql->bindValue(':descGrupo', $descGrupo); 
        $sql->bindValue(':situGrupo', $situGrupo); 
        $sql->bindValue(':id', $id); 
        if($sql->execute()){
            return true;
        }else{
            return false;
        }
    }
    public function getAllEdtGrupos($idGrupo){
        $sql = "SELECT *  FROM tab_grupo WHERE id_empresa = ".$this->idEmpresa." AND id_grupo = :idGrupo";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':idGrupo', $idGrupo); 
        $sql->execute();
        if($sql->rowCount()){
            return $sql->fetchAll();
        }
    }
    public function editaGrupo($codGrupo, $nomeGrupo, $descGrupo, $situGrupo, $id){
        $sql = "UPDATE tab_grupo SET
                nome_grupo = :nomeGrupo,
                desc_grupo = :descGrupo,
                id_situ = :situGrupo,
                usr_ins_grupo = (SELECT nome FROM cad_usuarios WHERE id_empresa = ".$this->idEmpresa." AND id = :id),
                dta_ins_grupo = CURRENT_TIMESTAMP
                WHERE id_empresa = ".$this->idEmpresa." AND id_grupo = :codGrupo";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':codGrupo', $codGrupo);
        $sql->bindValue(':nomeGrupo', $nomeGrupo);
        $sql->bindValue(':descGrupo', $descGrupo); 
        $sql->bindValue(':situGrupo', $situGrupo); 
        $sql->bindValue(':id', $id); 
        if($sql->execute()){
            return true;
        }else{
            return false;
        }
    }
    public function excluirGrupo($codGrupo){
        $sql = "DELETE FROM tab_grupo WHERE id_empresa = ".$this->idEmpresa." AND id_grupo = :codGrupo";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':codGrupo', $codGrupo);
        if($sql->execute()){
            return true;
        }else{
            return false;
        }
    }
}
