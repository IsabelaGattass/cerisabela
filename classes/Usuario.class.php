<?php
class Usuario extends CRUD
{
    protected $table = "usuario";
    private $idFuncionario;
    private $nome;
    private $cpf;
    private $email;
    private $telefone;
    private $senha;
    private $tipoFuncionario;
    public function getIdFuncionario()
    {
        return $this->idFuncionario;
    }
    public function setIdFuncionario($idFuncionario)
    {
        $this->idFuncionario = $idFuncionario;
    }
    public function getnome()
    {
        return $this->nome;
    }
    public function setnome($nome)
    {
        $this->nome = $nome;
    }
    public function getcpf()
    {
        return $this->cpf;
    }
    public function setcpf($cpf)
    {
        $this->cpf = $cpf;
    }
    public function getemail()
    {
        return $this->email;
    }
    public function setemail($email)
    {
        $this->email = $email;
    }
    public function gettelefone()
    {
        return $this->telefone;
    }
    public function settelefone($telefone)
    {
        $this->telefone = $telefone;
    }
    public function getsenha()
    {
        return $this->senha;
    }
    public function setsenha($senha)
    {
        $this->senha = $senha;
    }
    public function gettipoFuncionario()
    {
        return $this->tipoFuncionario;
    }
    public function settipoFuncionario($tipoFuncionario)
    {
        $this->tipoFuncionario = $tipoFuncionario;
    }
    public function add()
    {
        try {
        $senha_cripto = password_hash($this->senha, PASSWORD_DEFAULT);
        $sql = "INSERT INTO $this->table (nome, cpf, idFuncionario, email, telefone, senha, tipoFuncionario) VALUES (:nome, :cpf, :idFuncionario, :email, :telefone, :senha, :tipoFuncionario)";
         $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":nome", $this->nome, PDO::PARAM_STR);
        $stmt->bindParam(":cpf", $this->cpf, PDO::PARAM_STR);
        $stmt->bindParam(":idFuncionario", $this->idFuncionario, PDO::PARAM_STR);
        $stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
        $stmt->bindParam(":telefone", $this->telefone, PDO::PARAM_STR);
        $stmt->bindParam(":senha", $this->senha, PDO::PARAM_STR);
        $stmt->bindParam(":tipoFuncionario", $this->tipoFuncionario, PDO::PARAM_STR);
        $stmt->bindParam(":senha", $senha_cripto);

        $stmt->execute();
         return true;

        } catch (PDOException $e) {
            if ($e->getCode() == 23000) {
                $msg = $e->getMessage();

                if (strpos($msg, 'emailusuario') !== false) {
                    return "Erro: este e-mail já está cadastrado!";
                } elseif (strpos($msg, 'nomeusuario') !== false) {
                    return "Erro: este usuário já está cadastrado!";
                } else {
                    return "Erro: dado duplicado em campo único!";
                }
            }
            return "Erro inesperado: " . $e->getMessage();
        }
    }
    
    public function update($campo, $idFuncionario)
    {
        try {
        $sql = "UPDATE $this->table SET nome=:nome,cpf=:cpf, email=:email, telefone=:telefone, senha=:senha, tipoFuncionario=:tipoFuncionario  WHERE $campo=:idFuncionario";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":nome", $this->nome, PDO::PARAM_STR);
        $stmt->bindParam(":idFuncionario", $campo, PDO::PARAM_INT);
        $stmt->bindParam(":cpf", $this->cpf, PDO::PARAM_STR);
        $stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
        $stmt->bindParam(":telefone", $this->telefone, PDO::PARAM_STR);
        $stmt->bindParam(":senha", $this->senha, PDO::PARAM_STR);
        $stmt->bindParam(":tipoFuncionario", $this->tipoFuncionario, PDO::PARAM_STR);

         $stmt->execute();
         return true;

     } catch (PDOException $e) {
            if ($e->getCode() == 23000) {
                $msg = $e->getMessage();

                if (strpos($msg, 'nomeusuario') !== false) {
                    return "Erro: este usuário já está cadastrado!";
                } else {
                    return "Erro: dado duplicado em campo único!";
                }
            }
            return "Erro inesperado: " . $e->getMessage();
        }
    }

    public function ValidarLogin($email): mixed
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $sql = "SELECT * FROM usuario WHERE email = :email";
        $stmt = $this->db->prepare(query: $sql);
        $stmt->bindValue(param: ':email', value: $email);
        $stmt->execute();
         if ($stmt->rowCount() > 0) {
            $usuario = $stmt->fetch(PDO::FETCH_OBJ);
            if (password_verify($this->senha, $usuario->senha)) {
                $_SESSION['user_id'] = $usuario->id_usuario;
                $_SESSION['user_name'] = $usuario->nome;
                $redirect_url = $this->redirect ?? 'dashboard.php';
                header("Location: $redirect_url");
                exit();
            }
        }
        return "Usuário ou Senha incorreta. Por favor, tente novamente.";
    }
    
     public function logout()
    {
        session_unset();
        session_destroy();
        header("Location: login.php");
        exit();
    }

    public function atualiza_email()
    {

        try {
            // Verifica se a senha atual está correta
            $sql = "SELECT * FROM $this->table WHERE nome = :nome";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':nome', $this->nome);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                $usuario = $stmt->fetch(PDO::FETCH_OBJ);
                if (password_verify($this->senha, $usuario->senha)) {
                    // Atualiza o e-mail
                    $sql = "UPDATE $this->table SET email = :email WHERE nome = :nome";
                    $stmt = $this->db->prepare($sql);
                    $stmt->bindParam(':email', $this->email, PDO::PARAM_STR);
                    $stmt->bindParam(':nome', $this->nome);

                    return $stmt->execute();
                } else {
                }
                return 'Usuário ou Senha incorreta. Por favor, tente novamente.';
            }
        } catch (PDOException $e) {
            return 'Erro no sistema contate o administrador';
        }
    }

    public function alterarSenha($senhaAtual)
    {
        try {
            // Verifica se a senha atual está correta
            $sql = "SELECT * FROM $this->table WHERE nome = :nome";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':nome', $this->nome, PDO::PARAM_STR);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                $usuario = $stmt->fetch(PDO::FETCH_OBJ);
                if ($usuario && password_verify($senhaAtual, $usuario->senha)) {
                    // Atualiza com a nova senha (hash)
                    $novaSenhaHash = password_hash($this->senha, PASSWORD_DEFAULT);
                    $sql = "UPDATE $this->table SET senha = :novaSenha WHERE nome = :nome";
                    $stmt = $this->db->prepare($sql);
                    $stmt->bindParam(':novaSenha', $novaSenhaHash, PDO::PARAM_STR);
                    $stmt->bindParam(':nome', $this->nome, PDO::PARAM_STR);
                    return $stmt->execute();
                }
            } else {
                return false; // Senha atual incorreta
            }
        } catch (PDOException $e) {
            return false;
        }
    }

}

        


