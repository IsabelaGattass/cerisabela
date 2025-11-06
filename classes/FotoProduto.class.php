<?php
class FotoProduto extends CRUD {
    protected $table = 'ft_produto';
    private $idFoto;
    private $produto;       
    private $nome;
    private $legenda;
    private $texto;
    private $dataUpload;

   
    public function getIdFoto() {
        return $this->idFoto;
    }

    public function setIdFoto($idFoto) {
        $this->idFoto = $idFoto;
    }

    public function getProduto() {
        return $this->produto;

    }

    public function setProduto($produto) {
        $this->produto = $produto; 
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getLegenda() {
        return $this->legenda;
    }

    public function setLegenda($legenda) {
        $this->legenda = $legenda;
    }

    public function getTexto() {
        return $this->texto;
    }

    public function setTexto($texto) {
        $this->texto = $texto;
    }

    public function getDataUpload() {
        return $this->dataUpload;
    }

    public function setDataUpload($dataUpload) {
        $this->dataUpload = $dataUpload;
    }

    public function add() {
            $sql = "INSERT INTO ft_produto (fk_produto, nome, legenda, texto, dataUpload) 
                    VALUES (prouto, :nome, :legenda, :texto, :dataUpload)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue("produto", $this->produto);
            $stmt->bindValue(":nome", $this->nome);
            $stmt->bindValue(":legenda", $this->legenda);
            $stmt->bindValue(":texto", $this->texto);
            $stmt->bindValue(":dataUpload", $this->dataUpload);
            return $stmt->execute();
        
        }
    public function update(string $campo, int $id){
        $sql = "UPDATE ft_produto 
                    SET fk_produto = produto, nome = :nome, legenda = :legenda, texto = :texto 
                    WHERE id_foto = :idFoto";
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(":produto", $this->produto);
            $stmt->bindValue(":nome", $this->nome);
            $stmt->bindValue(":legenda", $this->legenda);
            $stmt->bindValue(":texto", $this->texto);
            $stmt->bindValue(":idFoto", $id);
            return $stmt->execute();
    }

        public function fotosproduto(int $idProduto) {
        $sql = "SELECT * FROM $this->table where fk_produto = :fk_produto";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':fk_produto',$idProduto);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

}
