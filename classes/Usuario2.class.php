<?php


class Usuario2 extends CRUD {
    protected $table = "usuario";
    private $id;
    private $email;
    private $senha;

    public function getId()
    {
        return $this->id;
    }


    public function setId($id)
    {
        $this->id = $id;
    }


    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;

    }


    public function getSenha()
    {
        return $this->senha;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;

    }


    public function add()
    {
        $sql = "INSERT INTO $this->table (email, senha) 
               VALUES (:email, :senha)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":email", $this->email, );
        $stmt->bindParam(":senha", $this->senha, );


        return $stmt->execute();
    }

    public function update(string $campo, int $id)
    {
        $sql = "UPDATE $this->table SET email= :email, senha= :senha WHERE $campo= :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam("email", $this->email, PDO::PARAM_STR);
        $stmt->bindParam("senha", $this->senha, PDO::PARAM_STR);
    
        return $stmt->execute();
    }

    public function search(string $campo, string $senha, string $email){
    $sql = "SELECT * FROM $this->table WHERE $campo = email";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(":email", $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->rowCount() > 0 ? $stmt->fetch(mode: PDO::FETCH_OBJ) : null;
}

}