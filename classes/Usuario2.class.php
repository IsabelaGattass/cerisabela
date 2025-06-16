<?php


class Usuario extends CRUD {
    protected $table = "usuario_3b";
    private $id;
    private $usuario;
    private $senha;

    public function getId()
    {
        return $this->id;
    }


    public function setId($id)
    {
        $this->id = $id;
    }


    public function getUsuario()
    {
        return $this->usuario;
    }

    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;

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
        $sql = "INSERT INTO $this->table (usuario, senha) 
               VALUES (:usuario, :senha)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":usuario", $this->usuario, );
        $stmt->bindParam(":senha", $this->senha, );


        return $stmt->execute();
    }

    public function update(string $campo, int $id)
    {
        $sql = "UPDATE $this->table SET usuario= :usuario, senha= :senha WHERE $campo= :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam("usuario", $this->usuario, PDO::PARAM_STR);
        $stmt->bindParam("senha", $this->senha, PDO::PARAM_STR);
    
        return $stmt->execute();
    }

}