<?php
class Login{
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
            header("Location: error.php");
        }
    }
    public function entrar($nome, $senha){
        //$senha = password_hash($senha, PASSWORD_DEFAULT);
        $senha = md5($senha);
        $sql = "SELECT * FROM usuarios WHERE nome = :nome AND senha = :senha"; 
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':nome', $nome);
        $sql->bindValue(':senha', $senha);
        $sql->execute();
        if($sql->rowCount() > 0){
            return $sql->fetch();
        }else{
            return false;
        }
    }
    public function getNomeById($id){
        $sql = "SELECT nome FROM usuarios WHERE id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();
        if($sql->rowCount() > 0){
            return $sql->fetch();
        }else{
            return false;
        }
    }
    public function cadastrarUser($nome, $senha){
        $nome = addslashes(ucwords(trim($nome)));
        $senha = addslashes(trim(md5($senha)));
        $sql = "INSERT INTO usuarios (nome, senha) VALUES (:nome, :senha)";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':nome', $nome);
        $sql->bindValue(':senha', $senha);
        $sql->execute();
        header("Location: index.php");
    }
}