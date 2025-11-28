<?php
class FotoProduto extends CRUD
{
    protected $table = 'ft_produto';  // Nome da tabela de fotos no banco de dados

    private $idFoto;
    private $produto;       // id do produto (ou objeto, se quiser estender depois)
    private $foto;
    private $legenda;
    private $alternativo;
    private $dataUpload;

    // ======== GETTERS e SETTERS ========

    public function getIdFoto()
    {
        return $this->idFoto;
    }

    public function setIdFoto($idFoto)
    {
        $this->idFoto = $idFoto;
    }

    public function getProduto()
    {
        return $this->produto;
    }

    public function setProduto($produto)
    {
        $this->produto = $produto;
    }

    public function getFoto()
    {
        return $this->foto;
    }

    public function setFoto($foto)
    {
        $this->foto = $foto;
    }

    public function getLegenda()
    {
        return $this->legenda;
    }

    public function setLegenda($legenda)
    {
        $this->legenda = $legenda;
    }

    public function getAlternativo()
    {
        return $this->alternativo;
    }

    public function setAlternativo($alternativo)
    {
        $this->alternativo = $alternativo;
    }

    public function getDataUpload()
    {
        return $this->dataUpload;
    }

    public function setDataUpload($dataUpload)
    {
        $this->dataUpload = $dataUpload;
    }

    // ======== CRUD ========

    public function add()
    {
        $sql = "INSERT INTO foto_produto (fk_produto, foto, legenda, alternativo, data_upload) 
                VALUES (:produto, :foto, :legenda, :alternativo, :dataUpload)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":produto", $this->produto);
        $stmt->bindValue(":foto", $this->foto);
        $stmt->bindValue(":legenda", $this->legenda);
        $stmt->bindValue(":alternativo", $this->alternativo);
        $stmt->bindValue(":dataUpload", $this->dataUpload ?? date('Y-m-d H:i:s'));
        return $stmt->execute();
    }

    public function update(string $campo, int $id)
    {
        $sql = "UPDATE foto_produto
                SET fk_produto = :produto, 
                    foto = :foto, 
                    legenda = :legenda, 
                    alternativo = :alternativo 
                WHERE id_foto = :idFoto";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":produto", $this->produto);
        $stmt->bindValue(":foto", $this->foto);
        $stmt->bindValue(":legenda", $this->legenda);
        $stmt->bindValue(":alternativo", $this->alternativo);
        $stmt->bindValue(":idFoto", $id);
        return $stmt->execute();
    }

    public function fotosProdutos(int $idProduto)
    {
        // Verificar se o ID do produto é válido
        if ($idProduto <= 0) {
            throw new InvalidArgumentException("ID do produto inválido: {$idProduto}");
        }

        // Buscar fotos do produto no banco de dados
        $sql = "SELECT * FROM $this->table WHERE fk_produto = :fk_produto";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':fk_produto', $idProduto);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}
?>

