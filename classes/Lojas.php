<?php
class Loja{
    private $pdo;
    private $idEmpresa;
    private $idLoja;
    public function __construct($driver, $codEmpresa, $idLoja){
        $this->pdo = $driver;
        $this->idEmpresa = $codEmpresa;
        $this->idLoja = $idLoja;
    }
    public function getLojas(){
        $sql = "SELECT id_loja, UPPER(nome_loja) nome_loja 
            FROM cad_lojas 
            WHERE id_empresa = ".$this->idEmpresa;
        $sql = $this->pdo->query($sql);
        if($sql->rowCount() > 0){
            return $sql->fetchAll();
        }
    }
    public function qrySelectLojasEdit($tipo, $id){
            $sql = "SELECT id_loja, nome_loja FROM cad_lojas 
            WHERE id_empresa = ".$this->idEmpresa.
            " AND id_loja = ";
        if($tipo == 'id_cli'){
            $sql .= "(SELECT id_loja FROM clientes WHERE id_cliente = :id AND cod_empresa = ".$this->idEmpresa.")";
        }
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':id', $id);
        if($sql->execute()){
            $array = array();
            $array[] = $sql->fetch();
            $array[] = $tipo;
            if ($array !== '') {
                return $array;
            }
        }
        
    }
}