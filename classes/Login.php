<?php
class Login{
    private $pdo;
    public function __construct($driver){
        $this->pdo = $driver;
    }
    public function verificar($sessao){
        if(isset($sessao)){
            return $sessao;
        }else{
            header("Location: ../../login.php");
        }
    }
    public function entrar($email, $senha){
        //$senha = password_hash($senha, PASSWORD_DEFAULT);
        $senha = md5($senha);
        $sql = "SELECT * FROM cad_usuarios WHERE email = :email AND senha = :senha"; 
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':email', $email);
        $sql->bindValue(':senha', $senha);
        $sql->execute();
        if($sql->rowCount() > 0){
            return $sql->fetch();
            //pegar cod emrpessa
        }else{
            return false;
        }
    }
    public function entraLog($id, $codEmpresa, $loja){
        $sql = "INSERT INTO tab_logs_login 
                (id_empresa, id_loja, user_logs, hora_log)
                VALUES
                ($codEmpresa, $loja, (select nome from cad_usuarios where id_empresa = $codEmpresa and id = $id), SYSDATE())";
                $sql = $this->pdo->query($sql);
    }
    public function getNomeById($id){
        $sql = "SELECT nome FROM cad_usuarios WHERE id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();
        if($sql->rowCount() > 0){
            return $sql->fetch();
        }else{
            return false;
        }
    }
    public function getNomeEmpresabycod($codEmpresa){
        $sql = "SELECT nome_empresa FROM cad_empresas WHERE id_empresa = :codEmpresa";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':codEmpresa', $codEmpresa);
        $sql->execute();
        if($sql->rowCount() > 0){
            return $sql->fetch();
        }else{
            return false;
        }
    }
    public function permissao($id){
        $sql = "SELECT permissoes FROM cad_usuarios WHERE id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();
        if($sql->rowCount() > 0){
            $row = $sql->fetch();
            $res = explode('/', $row['permissoes']);
            return $res;
            
        }else{
            return false;
        }
    }
    public function cadastrarEmp($codEmpresa, $nomeEmp, $emailEmp, $tipoCad, $cadastroFJ, $numeroEmp, $lojasEmp){
        if($codEmpresa !== ''){
           // $valCod = valCodEmpresa($cod_empresa);
            if($this->valCodEmpresa($codEmpresa) == false){ 
                if($this->valEmailEmpresa($emailEmp) == false){
                    if($this->valCnpj($cadastroFJ) == false){
                    $sql = "INSERT INTO cad_empresas
                            (id_empresa, email_empresa, nome_empresa, numero_empresa, cnpj_cpf, tipo_cadastro, qtd_lojas, dt_cadastro) 
                            VALUES
                            (:cod_empresa, :email_empresa , :nome_empresa, :numero_empresa, :cnpj_cpf, :tipo_cadastro, :qtd_lojas, CURRENT_TIMESTAMP)";
                    $sql = $this->pdo->prepare($sql);
                    $sql->bindValue(':cod_empresa', $codEmpresa);
                    $sql->bindValue(':nome_empresa', $nomeEmp);
                    $sql->bindValue(':email_empresa', $emailEmp);
                    $sql->bindValue(':tipo_cadastro', $tipoCad); 
                    $sql->bindValue(':cnpj_cpf', $cadastroFJ); 
                    $sql->bindValue(':numero_empresa', $numeroEmp); 
                    $sql->bindValue(':qtd_lojas', $lojasEmp); 

                    if($sql->execute()){
                        return true;

                    }else{
                        echo '<p class="erro">Ocorreu um erro ao cadastrar!</p>';
                        return false;
                    } 
                    }else{
                        echo '<p class="erro">CPF ou CNPJ já existentes no sistema!</p>';
                        return false;
                    }
                }else{
                    echo '<p class="erro">Email já existente no sistema!</p>';
                    return false;
                }
            }else{
                echo '<p class="erro">Código empresa já existe, tente novamente ou contate o administrador!</p>';
                return false;
            }
        }
    }
    public function valCodEmpresa($cod_empresa){
        $sql = "SELECT * FROM cad_empresas WHERE id_empresa = :cod_empresa";
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
        $sql = "SELECT * FROM cad_empresas WHERE email_empresa = :email";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':email', $email);
        $sql->execute();
        if($sql->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }
    public function valCnpj($cadastroFJ){
            $sql = "SELECT * FROM cad_empresas WHERE cnpj_cpf = :cadastroFJ";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(':cadastroFJ', $cadastroFJ);
            $sql->execute();
            if($sql->rowCount() > 0){
                return true;
            }else{
                return false;
            }
    }
    public function cadUsuario($codEmpresa, $nome, $email, $senha, $dataNasc, $cpf, $numero, $permissao){
        $nome = valCadNome($nome);
        $email = valCadEmail($email);
        $senha = valCadSenha($senha);
        $dataNasc = valCadData($dataNasc);
        $cpf = valCadCpf($cpf);
        $numero = valCadNum($numero);
        
        if($this->valCodEmpresa($codEmpresa) == true){
            if($this->valEmailUsuario($email) == false){ 
            if($this->valCpf($cpf) == false){
                $sql = "INSERT INTO cad_usuarios 
                        (id_empresa, cpf, nome, data_nascimento, numero_celular, email, senha, permissoes)
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
                    echo avisoCadEdit('cadastrado', "../../login.php", 'Login');
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
        $sql = "SELECT * FROM cad_usuarios WHERE email = :email";
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
        $sql = "SELECT * FROM cad_usuarios WHERE cpf = :cpf";
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
// function testeAcesso($cod){
    
// }
function valCadEmpresa($nome, $email, $cnpj, $numeroemp){
    $nome = addslashes(ucwords($nome));
    $email = addslashes(trim($email));
    $cnpj = addslashes(trim($cnpj));
    $numeroemp = addslashes(trim($numeroemp));
    return true;
}
function valCadNome($nome){
    $nome = addslashes(ucwords(trim($nome)));
    return $nome;
}
function valCadEmail($email){
    $email = addslashes(trim($email));
    return $email;
}
function valCadCpf($cpf){
    $cpf = addslashes(trim($cpf));
    return $cpf;
}
function valCadNum($numero){
    $numero = addslashes(trim($numero));
    return $numero;
}
function valCadSenha($senha){
    $senha = addslashes(trim(md5($senha)));
    return $senha;
}
function valCadData($dataNasc){
    $dataNasc = trim($dataNasc);
    return $dataNasc;
}

