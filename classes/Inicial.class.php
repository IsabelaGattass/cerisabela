<?php
class Inicial extends CRUD {
    protected $id_inicial = "cadastroProduto";
     private $titulo;
    private $subtitulo;
    private $info;


      public function getIdInicial()
    {
        return $this->id_inicial;
    }
    public function getTitulo() {
        return $this->titulo;
    }
    public function getSubtitulo() {
        return $this->subtitulo;
    }
    public function getInfo() {
        return $this->info;
    }


public function setiIdInicial($id_inicial)
    {
        $this->id_inicial = $id_inicial;
    }
    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }
    public function setSubtitulo($subtitulo) {
        $this->subtitulo = $subtitulo;
    }
    public function setInfo($info) {
        $this->info = $info;
    }

    public function add()
    {
        $sql = "INSERT INTO $this->table (titulo, subtitulo, info) VALUES (:titulo, :subtitulo, :info)";
         $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":titulo", $this->titulo, PDO::PARAM_STR);
        $stmt->bindParam(":subtitulo", $this->subtitulo, PDO::PARAM_STR);
        $stmt->bindParam(":info", $this->info, PDO::PARAM_STR);
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