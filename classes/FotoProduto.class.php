<?php
class FotoProduto extends CRUD
{
    protected $table = 'foto_produto';
    private $idFoto;
    private $produto;       // id do produto
    private $frente;
    private $verso;
    private $legenda;
    private $alternativo;
    private $dataUpload;
    private $db;

    // ======== CONSTRUTOR ========
    public function __construct()
    {
        $this->db = Database::getInstance(); // usa a conexão do CRUD ou sua classe Database
    }

    // ======== GETTERS e SETTERS ========

    public function getIdFoto() { return $this->idFoto; }
    public function setIdFoto($idFoto) { $this->idFoto = $idFoto; }

    public function getProduto() { return $this->produto; }
    public function setProduto($produto) { $this->produto = $produto; }

    public function getFrente() { return $this->frente; }
    public function setFrente($frente) { $this->frente = $frente; }

    public function getVerso() { return $this->verso; }
    public function setVerso($verso) { $this->verso = $verso; }

    public function getLegenda() { return $this->legenda; }
    public function setLegenda($legenda) { $this->legenda = $legenda; }

    public function getAlternativo() { return $this->alternativo; }
    public function setAlternativo($alternativo) { $this->alternativo = $alternativo; }

    public function getDataUpload() { return $this->dataUpload; }
    public function setDataUpload($dataUpload) { $this->dataUpload = $dataUpload; }

    // ======== CRUD ========

    public function add()
    {
        try {
            $sql = "INSERT INTO foto_produto (fk_produto, frente, verso, legenda, alternativo, data_upload) 
                    VALUES (:produto, :frente, :verso, :legenda, :alternativo, :dataUpload)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(":produto", $this->produto);
            $stmt->bindValue(":frente", $this->frente);
            $stmt->bindValue(":verso", $this->verso);
            $stmt->bindValue(":legenda", $this->legenda);
            $stmt->bindValue(":alternativo", $this->alternativo);
            $stmt->bindValue(":dataUpload", $this->dataUpload ?? date('Y-m-d H:i:s'));
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Erro ao adicionar foto: " . $e->getMessage();
            return false;
        }
    }

    public function update(string $campo, int $id)
    {
        try {
            $sql = "UPDATE foto_produto
                    SET fk_produto = :produto, 
                        frente = :frente, 
                        verso = :verso, 
                        legenda = :legenda, 
                        alternativo = :alternativo 
                    WHERE id_foto = :idFoto";
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(":produto", $this->produto);
            $stmt->bindValue(":frente", $this->frente);
            $stmt->bindValue(":verso", $this->verso);
            $stmt->bindValue(":legenda", $this->legenda);
            $stmt->bindValue(":alternativo", $this->alternativo);
            $stmt->bindValue(":idFoto", $id);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Erro ao atualizar foto: " . $e->getMessage();
            return false;
        }
    }

    // 🔍 Buscar todas as fotos de um produto
    public function fotosproduto(int $idProduto)
    {
        try {
            $sql = "SELECT * FROM $this->table WHERE fk_produto = :fk_produto";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':fk_produto', $idProduto, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo "Erro ao buscar fotos: " . $e->getMessage();
            return [];
        }
    }

    // 🔎 Buscar uma única foto
    public function findById(int $idFoto)
    {
        try {
            $sql = "SELECT * FROM $this->table WHERE id_foto = :idFoto";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':idFoto', $idFoto, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo "Erro ao buscar foto: " . $e->getMessage();
            return null;
        }
    }

}
?>
