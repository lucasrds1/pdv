<?php
class Clientes{
    private $pdo;
    public function __construct($driver){
        $this->pdo = $driver;
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
                    VALUES (:codEmpresa, :nomeCliente, :numeroCliente, :enderecoCliente, :cpfCliente, CURRENT_TIMESTAMP, (SELECT nome FROM cad_usuarios WHERE id = :id))";     
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
                            usr_cli_id = (SELECT nome FROM cad_usuarios WHERE id = :id) 
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
                $acao = $submit == 'Cadastrar' ? 'cadastrado' : 'editado';
            // echo "<script>location.href= 'consulta_cliente.php'</script>";
            // $_SESSION['aviso_edicao'] = '<h4 class="sucesso"><img src="../../assets/imagens/avisos/sucesso.png" width="40px" style="padding:5px">Cliente <b>cadastrado</b> com sucesso!</h4>';
            //     //return true;
            echo avisoCadEdit($acao, "../../views/clientes/consulta_cliente.php?dt=1", 'consulta');
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
            return true;
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