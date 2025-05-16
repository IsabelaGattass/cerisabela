<?php
class Usuario extends CRUD{
    protected $table= "cadastroUsuario";
    private $idFuncionario;
    private $nome;
    private $cpf;
    private $email;
    private $telefone;
    private $senha;
 public function getIdFuncionario() {
    return $this->idFuncionario;
}
public function setIdFuncionario($idFuncionario) {
    $this->idFuncionario = $idFuncionario;
}
public function getnome() {
    return $this->nome;
}
    public function setnome($nome) {
    $this->nome = $nome;
}
    public function getCpf() {
        return $this->cpf;
    }
    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }
    public function getEmail() {
        return $this->email;
    }
    public function setEmail($email) {
        $this->email = $email;
    }
    public function getTelefone() {
        return $this->telefone;
    }
    public function setTelefone($telefone) {
            $this->telefone = $telefone;
    }
public function getsenha() {
    return $this->senha;
}
public function setSenha($senha) {
    $this->senha = $senha;
}
    public function add()
    {
        $sql = "INSERT INTO $this->table (nome) VALUES (:nome)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":nome", $this->nome, PDO::PARAM_STR);
        return $stmt->execute();

    }
    public function update(string $campo, int $id)
    {
        $sql = "UPDATE $this->table SET nome=:nome WHERE $campo=:id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":nome", $this->nome, PDO::PARAM_STR);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
    
}