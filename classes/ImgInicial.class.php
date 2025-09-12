<?php
class ImgInicial extends CRUD {
    protected $table = 'imagem';
    private $idImg;
    private $inicial;       // objeto Animal ou apenas o ID
    private $legenda;
    private $alternativo;
    private $dataUpload;

    public function getIdImg() {
        return $this->idImg;
    }

    public function setIdImg($idImg) {
        $this->idFoto = $idImg;
    }

    public function getInicial() {
        return $this->inicial;
    }

    public function setInicial($inicial) {
        $this->inicial = $inicial; 
    }

    public function getLegenda() {
        return $this->legenda;
    }

    public function setLegenda($legenda) {
        $this->legenda = $legenda;
    }

    public function getAlternativo() {
        return $this->alternativo;
    }

    public function setAlternativo($alternativo) {
        $this->alternativo = $alternativo;
    }

    public function getDataUpload() {
        return $this->dataUpload;
    }

    public function setDataUpload($dataUpload) {
        $this->dataUpload = $dataUpload;
    }

    public function add() {
            $sql = "INSERT INTO foto_animal (fk_animal, nome, legenda, alternativo, data_upload) 
                    VALUES (:animal, :nome, :legenda, :alternativo, :dataUpload)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(":animal", $this->animal);
            $stmt->bindValue(":nome", $this->nome);
            $stmt->bindValue(":legenda", $this->legenda);
            $stmt->bindValue(":alternativo", $this->alternativo);
            $stmt->bindValue(":dataUpload", $this->dataUpload);
            return $stmt->execute();
        
        }
    public function update(string $campo, int $id){
        $sql = "UPDATE foto_animal 
                    SET fk_animal = :animal, nome = :nome, legenda = :legenda, alternativo = :alternativo 
                    WHERE id_foto = :idFoto";
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(":animal", $this->animal);
            $stmt->bindValue(":nome", $this->nome);
            $stmt->bindValue(":legenda", $this->legenda);
            $stmt->bindValue(":alternativo", $this->alternativo);
            $stmt->bindValue(":idFoto", $id);
            return $stmt->execute();
    }

    public function fotosAnimal(int $idAnimal) {
        $sql = "SELECT * FROM $this->table where fk_animal = :fk_animal";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':fk_animal',$idAnimal);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}
