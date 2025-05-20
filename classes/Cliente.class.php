<?php
 class Cliente extends CRUD {
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



    public function getid() {
        return $this->id;
    }

    public function setid($id) {
        $this->id = $id;
    }

    public function getnome() {
        return $this->nome;
    }

    public function setnome($nome) {
        $this->nome = $nome;
    }

     public function getcpf() {
        return $this->cpf;
    }

    public function setcpf($cpf) {
        $this->cpf = $cpf;
    }

    public function getemail() {
        return $this->email;
    }

    public function setemail($email) {
        $this->email = $email;
    }

    public function gettelefone() {
        return $this->telefone;
    }

    public function settelefone($telefone) {
        $this->telefone = $telefone;
    }

     public function getsenha() {
        return $this->senha;
    }

    public function setsenha($senha) {
        $this->senha = $senha;
    }

    public function getrua() {
        return $this->rua;
    }

    public function setrua($rua) {
        $this->rua = $rua;
    }

     public function getcidade() {
        return $this->cidade;
    }

    public function setcidade($cidade) {
        $this->cidade = $cidade;
    }

    public function getbairro() {
        return $this->bairro;
    }

    public function setbairro($bairro) {
        $this->bairro = $bairro;
    }

    public function getnumero() {
        return $this->numero;
    }

    public function setnumero($numero) {
        $this->numero = $numero;
    }

     public function getestado() {
        return $this->estado;
    }

    public function setestado($estado) {
        $this->estado = $estado;
    }

    
     public function getcep() {
        return $this->cep;
    }

    public function setcep($cep) {
        $this->cep = $cep;
    }

         public function getdataNasc() {
        return $this->dataNasc;
    }

    public function setdataNasc($dataNasc) {
        $this->dataNasc = $dataNasc;
    }



    public function add() {
        $sql = "INSERT INTO $this->table (nome, cpf, email, telefone, senha, rua, cidade, bairro, numero, estado, cep, dataNasc) VALUES (:nome, :cpf, :email, :telefone, :senha, :rua, :cidade, :bairro, :numero, :estado, :cep, :dataNasc)";
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
