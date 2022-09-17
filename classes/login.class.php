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
    public function verificar($sessao){
        if(isset($sessao)){
            return $sessao;
        }else{
            header("Location: ../../login.php");
        }
        return $id;
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
    public function cadastrarUser($nome, $email, $senha, $cnpj){
        if($nome && $senha && $email){
            $cod_empresa = rand(100000, 999999);
            if(!empty($cod_empresa))
            $sql = "INSERT INTO usuarios (cod_empresa, nome, email, senha, cnpj) VALUES (cod_empresa, :nome, :email ,:senha, :cnpj)";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(':cod_empresa', $cod_empresa);
            $sql->bindValue(':nome', $nome);
            $sql->bindValue(':email', $email);
            $sql->bindValue(':senha', $senha);
            $sql->bindValue(':cnpj', $cnpj);
            $sql->execute();
            return true;
        }
    }
}
function valCad($nome, $email, $senha, $cnpj){
    $nome = addslashes(ucwords(trim($nome)));
    $email = addslashes(trim($email));
    $senha = addslashes(trim(md5($senha)));
    $cnpj = addslashes(trim($cnpj));
    return true;
}