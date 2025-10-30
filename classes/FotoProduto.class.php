<?php
class FotoProduto extends CRUD {
    protected $table = 'ft_produto';
    private $idFoto;
    private $produto;       
    private $nome;
    private $legenda;
    private $texto;
    private $dataUpload;

    // Getters e Setters
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
            $sql = "INSERT INTO ft_produto (fk_animal, nome, legenda, texto, data_upload) 
                    VALUES (prouto, :nome, :legenda, :texto, :dataUpload)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue("prouto", $this->produto);
            $stmt->bindValue(":nome", $this->nome);
            $stmt->bindValue(":legenda", $this->legenda);
            $stmt->bindValue(":texto", $this->texto);
            $stmt->bindValue(":dataUpload", $this->dataUpload);
            return $stmt->execute();
        
        }
    public function update(string $campo, int $id){
        $sql = "UPDATE ft_produto 
                    SET fk_animal = prouto, nome = :nome, legenda = :legenda, texto = :texto 
                    WHERE id_foto = :idFoto";
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(":prouto", $this->produto);
            $stmt->bindValue(":nome", $this->nome);
            $stmt->bindValue(":legenda", $this->legenda);
            $stmt->bindValue(":texto", $this->texto);
            $stmt->bindValue(":idFoto", $id);
            return $stmt->execute();
    }

}
