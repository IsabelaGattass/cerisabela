<?php
class Usuario extends CRUD
{
    protected $table = "cadastroUsuario";
    private $idFuncionario;
    private $nome;
    private $cpf;
    private $email;
    private $telefone;
    private $senha;
    private $tipoFuncionario;
    public function getIdFuncionario()
    {
        return $this->idFuncionario;
    }
    public function setIdFuncionario($idFuncionario)
    {
        $this->idFuncionario = $idFuncionario;
    }
    public function getnome()
    {
        return $this->nome;
    }
    public function setnome($nome)
    {
        $this->nome = $nome;
    }
    public function getcpf()
    {
        return $this->cpf;
    }
    public function setcpf($cpf)
    {
        $this->cpf = $cpf;
    }
    public function getemail()
    {
        return $this->email;
    }
    public function setemail($email)
    {
        $this->email = $email;
    }
    public function gettelefone()
    {
        return $this->telefone;
    }
    public function settelefone($telefone)
    {
        $this->telefone = $telefone;
    }
    public function getsenha()
    {
        return $this->senha;
    }
    public function setsenha($senha)
    {
        $this->senha = $senha;
    }
    public function gettipoFuncionario()
    {
        return $this->tipoFuncionario;
    }
    public function settipoFuncionario($tipoFuncionario)
    {
        $this->tipoFuncionario = $tipoFuncionario;
    }
    public function add()
    {
        $sql = "INSERT INTO $this->table (nome, cpf, idFuncionario, email, telefone, senha, tipoFuncionario) VALUES (:nome, :cpf, :idFuncionario, :email, :telefone, :senha, :tipoFuncionario)";
         $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":nome", $this->nome, PDO::PARAM_STR);
        $stmt->bindParam(":cpf", $this->cpf, PDO::PARAM_STR);
        $stmt->bindParam(":idFuncionario", $this->idFuncionario, PDO::PARAM_STR);
        $stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
        $stmt->bindParam(":telefone", $this->telefone, PDO::PARAM_STR);
        $stmt->bindParam(":senha", $this->senha, PDO::PARAM_STR);
        $stmt->bindParam(":tipoFuncionario", $this->tipoFuncionario, PDO::PARAM_STR);
        return $stmt->execute();
    }
    public function update($campo, $idFuncionario)
    {
        $sql = "UPDATE $this->table SET nome=:nome,cpf=:cpf, email=:email, telefone=:telefone, senha=:senha, tipoFuncionario=:tipoFuncionario  WHERE $campo=:idFuncionario";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":nome", $this->nome, PDO::PARAM_STR);
        $stmt->bindParam(":idFuncionario", $campo, PDO::PARAM_INT);
        $stmt->bindParam(":cpf", $this->cpf, PDO::PARAM_STR);
        $stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
        $stmt->bindParam(":telefone", $this->telefone, PDO::PARAM_STR);
        $stmt->bindParam(":senha", $this->senha, PDO::PARAM_STR);
        $stmt->bindParam(":tipoFuncionario", $this->tipoFuncionario, PDO::PARAM_STR);
        return $stmt->execute();
    }

}