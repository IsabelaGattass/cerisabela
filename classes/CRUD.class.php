<?php

abstract class CRUD {
    protected $table;
    protected $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    // Métodos abstratos
    abstract public function add();
    abstract public function update(string $campo, int $id);

    // Listar todos os registros
    public function all() {
        $sql = "SELECT * FROM $this->table";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // Buscar registro por campo
    public function search(string $campo, $id) {
        $sql = "SELECT * FROM $this->table WHERE $campo = :id"; // corrigido
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount() > 0 ? $stmt->fetch(PDO::FETCH_OBJ) : null;
    }

    // Excluir registro
    public function delete(string $campo, int $id) {
        $sql = "DELETE FROM $this->table WHERE $campo = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        try {
            return $stmt->execute();
        } catch(PDOException $e) {
            error_log('Erro ao excluir Registro: '.$e->getMessage());
            return false;
        }
    }

    // Métodos para iniciar, confirmar e cancelar transações
    public function iniciarTransacao()
    {
        $this->db->beginTransaction();
    }

    public function confirmarTransacao()
    {
        $this->db->commit();
    }

    public function cancelarTransacao()
    {
        $this->db->rollBack();
    }
}

