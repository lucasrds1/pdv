<?php
session_start();
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
    public function cadastrarEmp($codEmpresa, $nome, $email, $cnpj, $numeroemp){
        if($codEmpresa && $nome && $email){
            
            if($cnpj == ''){
                $cnpj = null;
            }
            if($numeroemp == ''){
                $numeroemp = null;
            }
           // $valCod = valCodEmpresa($cod_empresa);
            if($this->valCodEmpresa($codEmpresa) == false){ 
                if($this->valEmailEmpresa($email) == false && $this->valCnpj($cnpj) == false){
                $sql = "INSERT INTO empresa (cod_empresa, email_empresa, nome_empresa, cnpj, numero_empresa) VALUES (:cod_empresa, :email_empresa , :nome_empresa, :cnpj, :numeroemp)";
                $sql = $this->pdo->prepare($sql);
                $sql->bindValue(':cod_empresa', $codEmpresa);
                $sql->bindValue(':nome_empresa', $nome);
                $sql->bindValue(':email_empresa', $email);
                $sql->bindValue(':cnpj', $cnpj); 
                $sql->bindValue(':numeroemp', $numeroemp); 
                if($sql->execute()){
                    return true;

                }else{
                    echo '<p class="erro">Ocorreu um erro ao cadastrar!</p>';
                    return false;
                }  
                }
            }else{
                echo '<p class="erro">Código empresa já existe, tente novamente ou contate o administrador!</p>';
                return false;
            }
        }
    }
    public function valCodEmpresa($cod_empresa){
        $sql = "SELECT * FROM empresa WHERE cod_empresa = :cod_empresa";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':cod_empresa', $cod_empresa);
        $sql->execute();
        if($sql->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }
    public function valEmailEmpresa($email){
        $sql = "SELECT * FROM empresa WHERE email_empresa = :email";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':email', $email);
        $sql->execute();
        if($sql->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }
    public function valCnpj($cnpj){
        if($cnpj == null){
            return false;
        }else{
            $sql = "SELECT * FROM empresa WHERE cnpj = :cnpj";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(':cnpj', $cnpj);
            $sql->execute();
            if($sql->rowCount() > 0){
                return true;
            }else{
                return false;
            }
        }
    }
    public function cadUsuario($codEmpresa, $nome, $email, $senha, $dataNasc, $cpf, $numero, $permissao){
        if($this->valCodEmpresa($codEmpresa) == true){
            if($this->valEmailUsuario($email) == false){ 
            if($this->valCpf($cpf) == false){
                $sql = "INSERT INTO usuarios 
                        (cod_empresa, cpf, nome, data_nascimento, numero_celular, email, senha, permissoes)
                        VALUES (:codEmpresa, :cpf, :nome, :dataNasc, :numero, :email, :senha, :permissoes)";
                $sql = $this->pdo->prepare($sql);
                $sql->bindValue(':codEmpresa', $codEmpresa);
                $sql->bindValue(':cpf', $cpf);
                $sql->bindValue(':nome', $nome);
                $sql->bindValue(':dataNasc', $dataNasc);
                $sql->bindValue(':numero', $numero);
                $sql->bindValue(':email', $email);
                $sql->bindValue(':senha', $senha);
                $sql->bindValue(':permissoes', $permissao);
                if($sql->execute()){
                    return true;
                }else{
                    //echo '<p class="erro">Ocorreu um erro ao cadastrar!</p>';
                    return false;
                }  
            }else{
                echo '<p class="erro">Cpf já existe!</p>';
                return false;
            }
            }else{
                echo '<p class="erro">Email já existe!</p>';
                return false;
            }
    }else{
        echo '<p class="erro">Código da empresa inexistente, por favor contate o administrador!</p>';
        return false;
    }
    }
    public function valEmailUsuario($email){
        $sql = "SELECT * FROM usuarios WHERE email = :email";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':email', $email);
        $sql->execute();
        if($sql->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }
    public function valCpf($cpf){
        $sql = "SELECT * FROM usuarios WHERE cpf = :cpf";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':cpf', $cpf);
        $sql->execute();
        if($sql->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }
}
function valCadEmpresa($nome, $email, $cnpj, $numeroemp){
    $nome = addslashes(ucwords($nome));
    $email = addslashes(trim($email));
    $cnpj = addslashes(trim($cnpj));
    $numeroemp = addslashes(trim($numeroemp));
    return true;
}
function valCadUsuario($nome, $email, $senha, $dataNasc, $cpf, $numero){
    $nome = addslashes(ucwords(trim($nome)));
    $email = addslashes(trim($email));
    $senha = addslashes(trim(md5($senha)));
    $dataNasc = trim($dataNasc);
    $cpf = addslashes(trim($cpf));
    $numero = addslashes(trim($numero));
    return true;
}
