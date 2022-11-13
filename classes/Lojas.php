<?php
class Loja{
    private $pdo;
    public function __construct($driver){
        $this->pdo = $driver;
    }
    public function getLojas($codEmpresa){
        $sql = "SELECT id_loja, UPPER(nome_loja) nome_loja 
            FROM cad_lojas 
            WHERE id_empresa = $codEmpresa";
        $sql = $this->pdo->query($sql);
        if($sql->rowCount() > 0){
            return $sql->fetchAll();
        }
    }
}