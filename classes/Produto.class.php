<?php
class Produto extends CRUD {
    protected $table = "cadastroProduto";
     private $idProduto;
    private $nome;
    private $descricao;
    private $preco;
    private $unidade;

      public function getIdProduto()
    {
        return $this->idProduto;
    }
    public function getNome() {
        return $this->nome;
    }
    public function getDescricao() {
        return $this->descricao;
    }
    public function getPreco() {
        return $this->preco;
    }
    public function getUnidade() {
        return $this->unidade;
    }
public function setiIdProduto($idProduto)
    {
        $this->idProduto = $idProduto;
    }
    public function setNome($nome) {
        $this->nome = $nome;
    }
    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }
    public function setPreco($preco) {
        $this->preco = $preco;
    }
    public function setUnidade($unidade) {
        $this->unidade = $unidade;
    }

    public function add()
    {
        $sql = "INSERT INTO $this->table (nome, descricao, preco, unidade) VALUES (:nome, :descricao, :preco, :unidade)";
         $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":nome", $this->nome, PDO::PARAM_STR);
        $stmt->bindParam(":descricao", $this->descricao, PDO::PARAM_STR);
        $stmt->bindParam(":preco", $this->preco, PDO::PARAM_STR);
        $stmt->bindParam(":unidade", $this->unidade, PDO::PARAM_STR);
        return $stmt->execute();
    }
    public function update($campo, $idProduto)
    {
        $sql = "UPDATE $this->table SET nome=:nome,descricao=:descricao,preco=:preco,uniade=:unidade WHERE $campo=:idProduto";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":nome", $this->nome, PDO::PARAM_STR);
        $stmt->bindParam(":idProduto", $campo, PDO::PARAM_INT);
        $stmt->bindParam(":descricao", $this->descricao, PDO::PARAM_STR);
        $stmt->bindParam(":preco", $this->preco, PDO::PARAM_STR);
        $stmt->bindParam(":unidade", $this->unidade, PDO::PARAM_STR);
        return $stmt->execute();
    }
}