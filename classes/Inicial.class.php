<?php
class Inicial extends CRUD {
    protected $table = "inicial";

    private $id_inicial;
    private $titulo;
    private $subtitulo;
    private $info;
    private $imagem;

    public function getId() {
        return $this->id_inicial;
    }

    public function setId($id_inicial) {
        $this->id_inicial = $id_inicial;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function getSubtitulo() {
        return $this->subtitulo;
    }

    public function setSubtitulo($subtitulo) {
        $this->subtitulo = $subtitulo;
    }

    public function getInfo() {
        return $this->info;
    }

    public function setInfo($info) {
        $this->info = $info;
    }

    public function getImagem() {
        return $this->imagem;
    }

    public function setImagem($imagem) {
        $this->imagem = $imagem;
    }

    // Método para adicionar um novo registro
    public function add() {
        $sql = "INSERT INTO {$this->table} (titulo, subtitulo, info, imagem) 
                VALUES (:titulo, :subtitulo, :info, :imagem)";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':titulo', $this->titulo);
        $stmt->bindParam(':subtitulo', $this->subtitulo);
        $stmt->bindParam(':info', $this->info);
        $stmt->bindParam(':imagem', $this->imagem);

        return $stmt->execute();
    }

    // Método obrigatório da classe abstrata CRUD
    public function update($id, $dados) {
        $sql = "UPDATE {$this->table} 
                SET titulo = :titulo, subtitulo = :subtitulo, info = :info, imagem = :imagem 
                WHERE id_inicial = :id";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':titulo', $dados['titulo']);
        $stmt->bindParam(':subtitulo', $dados['subtitulo']);
        $stmt->bindParam(':info', $dados['info']);
        $stmt->bindParam(':imagem', $dados['imagem']);
        $stmt->bindParam(':id', $id);

        return $stmt->execute();
    }
}
?>