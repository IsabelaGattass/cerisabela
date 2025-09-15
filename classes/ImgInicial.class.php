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
        $this->idImg = $idImg;
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
            $sql = "INSERT INTO foto_animal (fk_animal, legenda, alternativo, data_upload) 
                    VALUES (:inicial, :legenda, :alternativo, :dataUpload)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(":animal", $this->inicial);
            $stmt->bindValue(":legenda", $this->legenda);
            $stmt->bindValue(":alternativo", $this->alternativo);
            $stmt->bindValue(":dataUpload", $this->dataUpload);
            return $stmt->execute();
        
        }

        // tabela imagem no banco de dados
    public function update(string $campo, int $id){
        $sql = "UPDATE imagem
                    SET fk_animal = :inicial, legenda = :legenda, alternativo = :alternativo 
                    -- id na tabela imagem bd
                    WHERE id_img = :idImg";
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(":animal", $this->inicial);
            $stmt->bindValue(":legenda", $this->legenda);
            $stmt->bindValue(":alternativo", $this->alternativo);
            $stmt->bindValue(":idImg", $id);
            return $stmt->execute();
    }

    public function fotosAnimal(int $idInicial) {
        $sql = "SELECT * FROM $this->table where fk_animal = :fk_animal";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':fk_animal',$idInicial);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}
