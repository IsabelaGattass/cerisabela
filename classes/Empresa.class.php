<?php


class Empresa extends CRUD {
    protected $table = "empresa";
    private $id_empresa;
    private $nome;
    private $cnpj;
    private $nome_fant;
    private $telefone;
    private $email;
    private $responsaveis;
    private $atv_economica;
    private $rede_social;
    private $apresentação;
    private $historico;

    public function getId()
    {
        return $this->id_empresa;
    }


    public function setId($id_empresa)
    {
        $this->id_empresa = $id_empresa;
    }


    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;

    }


    public function getCnpj()
    {
        return $this->cnpj;
    }

    public function setCnpj($cnpj)
    {
        $this->cnpj = $cnpj;

    }

    public function getNomeFantasia()
    {
        return $this->nome_fant;
    }


    public function setNomeFantasia($nome_fant)
    {
        $this->nome_fant = $nome_fant;

    }


    public function getTelefone()
    {
        return $this->telefone;
    }

    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;

    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;

    }


    public function getResponsaveis()
    {
        return $this->responsaveis;
    }

    public function setReponaveis($responsaveis)
    {
        $this->responsaveis = $responsaveis;

    }

    
    
    public function getAtvEconomica()
    {
        return $this->atv_economica;
    }

    public function setAtvEconomica($atv_economica)
    {
        $this->atv_economica = $atv_economica;

    }



    public function getRedeSocial()
    {
        return $this->rede_social;
    }

    public function setRedeSocial($rede_social)
    {
        $this->rede_social = $rede_social;

    }



    public function getApresentacao()
    {
        return $this->apresentação;
    }

    public function setApresentacao($apresentação)
    {
        $this->apresentação = $apresentação;

    }


    public function getHistorico()
    {
        return $this->historico;
    }

    public function setHistorico($historico)
    {
        $this->historico = $historico;

    }




    public function add()
    {
        $sql = "INSERT INTO $this->table (nome, cnpj, nome_fant, telefone, email, responsaveis, atv_economica, rede_social, apresentação) VALUES (:nome, :cnpj, :nome_fant, :telefone, :email)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":nome", $this->nome, PDO::PARAM_STR);
        $stmt->bindParam(":cnpj", $this->cnpj, PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function update(string $campo, int $id)
    {
        $sql = "UPDATE $this->table SET nome= :nome WHERE $campo= :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam("nome", $this->nome, PDO::PARAM_STR);
        $stmt->bindParam("id", $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

}

    



