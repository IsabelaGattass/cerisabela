<?php

class Cliente extends CRUD {
    protected $table = "cliente";

    private $id;
    private $cpf_cliente;
    private $nomeCliente;
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

    // GETTERS
    public function getId() {
        return $this->id;
    }

    public function getCpf_cliente() {
        return $this->cpf_cliente;
    }

    public function getNomeCliente() {
        return $this->nomeCliente;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function getRua() {
        return $this->rua;
    }

    public function getCidade() {
        return $this->cidade;
    }

    public function getBairro() {
        return $this->bairro;
    }

    public function getNumero() {
        return $this->numero;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function getCep() {
        return $this->cep;
    }

    public function getDataNasc() {
        return $this->dataNasc;
    }

    // SETTERS
    public function setId($id) {
        $this->id = $id;
    }

    public function setCpf($cpf_cliente) {
        $this->cpf_cliente = $cpf_cliente;
    }

    public function setNome($nomeCliente) {
        $this->nomeCliente = $nomeCliente;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function setRua($rua) {
        $this->rua = $rua;
    }

    public function setCidade($cidade) {
        $this->cidade = $cidade;
    }

    public function setBairro($bairro) {
        $this->bairro = $bairro;
    }

    public function setNumero($numero) {
        $this->numero = $numero;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

    public function setCep($cep) {
        $this->cep = $cep;
    }

    public function setDataNasc($dataNasc) {
        $this->dataNasc = $dataNasc;
    }

    // MÉTODOS CRUD
    public function add() {
        $sql = "INSERT INTO $this->table (
        nomeCliente, cpf_cliente, email, telefone, senha, rua, cidade,
        bairro, numero, estado, cep, dataNasc) VALUES (:nomeCliente, :cpf_cliente, :email, :telefone, :senha, :rua,:cidade, :bairro, :numero, :estado, :cep, :dataNasc)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':nomeCliente', $this->nomeCliente);
        $stmt->bindParam(':cpf_cliente', $this->cpf_cliente);
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

    public function update($campo, $id) {
        $sql = "UPDATE $this->table SET
        nomeCliente = :nomeCliente,cpf_cliente = :cpf_cliente,email = :email,telefone = :telefone,senha = :senha,rua = :rua,cidade = :cidade,bairro = :bairro,numero = :numero,estado = :estado,cep = :cep,dataNasc = :dataNasc
        WHERE $campo = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':nomeCliente', $this->nomeCliente);
        $stmt->bindParam(':cpf_cliente', $this->cpf_cliente);
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
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
