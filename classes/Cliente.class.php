<?php
 class cliente extends CRUD {
    protected $table = "Cliente";
    private $id;
    private $cpf;
    private $nome;
    private $email; 
    private $telefone; 
    private $senha;
    private $rua; 
    private $cidade; 
    private $bairro; 
    private $numero; 
    private $estado; 
    private $cep;
    private $dataNasc; 
   




    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
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

     public function getSenha() {
        return $this->senha;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function getRua() {
        return $this->rua;
    }

    public function setRua($rua) {
        $this->rua = $rua;
    }

     public function getCidade() {
        return $this->cidade;
    }

    public function setCidade($cidade) {
        $this->cidade = $cidade;
    }

    public function getBairro() {
        return $this->bairro;
    }

    public function setBairro($bairro) {
        $this->bairro = $bairro;
    }

    public function getNumero() {
        return $this->numero;
    }

    public function setNumero($numero) {
        $this->numero = $numero;
    }

     public function getEstado() {
        return $this->estado;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

    
     public function getCep() {
        return $this->cep;
    }

    public function setCep($cep) {
        $this->cep = $cep;
    }

         public function getDataNasc() {
        return $this->dataNasc;
    }

    public function setDataNasc($dataNasc) {
        $this->dataNasc = $dataNasc;
    }
  




    public function add() {
        $sql = "INSERT INTO $this->table (nome, cpf, email, telefone, senha, rua, cidade, bairro, numero, estado, cep, dataNasc) 
                VALUES (:nome, :cpf, :email, :telefone, :senha, :rua, :cidade, :bairro, :numero, :estado, :cep, :dataNasc)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':cpf', $this->cpf);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':telefone', $this->telefone);
        $stmt->bindParam(':senha', $this->senha);
        $stmt->bindParam(':rua', $this->rua);
        $stmt->bindParam(':cidade', $this->cidade);
        $stmt->bindParam(':bairro', $this->bairro);
        $stmt->bindParam(':numero', $this->numero);
        $stmt->bindParam(':estado', $this->estado);
        $stmt->bindParam(':cep', $this->cep);
        $stmt->bindParam(':dataNasc', $this->dataNasc);
        return $stmt->execute();
    }
    

    
    public function update($campo, $id) 
    {
        $sql = "UPDATE $this->table SET nome=:nome, cpf=:cpf, email=:email, telefone=:telefone, senha=:senha, rua=:rua, cidade=:cidade, bairro=:bairro, numero=:numero, estado=:estado, cep=:cep, dataNasc=:dataNasc WHERE $campo=:id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':cpf', $this->cpf);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':telefone', $this->telefone);
        $stmt->bindParam(':senha', $this->senha);
        $stmt->bindParam(':rua', $this->rua);
        $stmt->bindParam(':cidade', $this->cidade);
        $stmt->bindParam(':bairro', $this->bairro);
        $stmt->bindParam(':numero', $this->numero);
        $stmt->bindParam(':estado', $this->estado);
        $stmt->bindParam(':cep', $this->cep);
        $stmt->bindParam(':dataNasc', $this->dataNasc);
        return $stmt->execute();
    }
}
