<?php

class Usuario extends CRUD
{
    protected $table = "usuario";
    private $id_usuario;
    private $nome_usuario;
    private $email;
    private $papel;
    private $senha;


    public function getid_usuario()
    {
        return $this->id_usuario;
    }
    public function setid_usuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;
    }

    public function getnome()
    {
        return $this->nome_usuario;
    }
    public function setnome($nome_usuario)
    {
        $this->nome_usuario = $nome_usuario;
    }

    public function getemail()
    {
        return $this->email;
    }
    public function setemail($email)
    {
        $this->email = $email;
    }

    public function getpapel()
    {
        return $this->papel;
    }
    public function setpapel($papel)
    {
        $this->papel = $papel;
    }


    public function getsenha()
    {
        return $this->senha;
    }
    public function setsenha($senha)
    {
        $this->senha = $senha;
    }


    public function add()
    {
        $senhaComHash = password_hash($this->senha, PASSWORD_DEFAULT);
        $sql = "INSERT INTO $this->table(nome_usuario, email, papel, senha) VALUES (:nome_usuario, :email, :papel, :senha)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":nome_usuario", $this->nome_usuario, PDO::PARAM_STR);
        $stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
        $stmt->bindParam(":papel", $this->papel, PDO::PARAM_STR);
        $stmt->bindParam(":senha", $senhaComHash, PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function update(string $campo, int $id_usuario)
    {
        if (!empty($this->senha)) {
            $senha = password_hash($this->senha, PASSWORD_DEFAULT);
        } else {
            // mantém a senha atual do banco
            $sqlSenha = "SELECT senha FROM $this->table WHERE $campo = :id";
            $stmtSenha = $this->db->prepare($sqlSenha);
            $stmtSenha->bindParam(":id", $id_usuario, PDO::PARAM_INT);
            $stmtSenha->execute();
            $senha = $stmtSenha->fetchColumn();
        }

        $sql = "UPDATE $this->table SET nome_usuario = :nome_usuario, email = :email, papel = :papel, senha = :senha WHERE $campo = :id_usuario";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":nome_usuario", $this->nome_usuario);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":papel", $this->papel);
        $stmt->bindParam(":senha", $senha);
        $stmt->bindParam(":id_usuario", $id_usuario, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function buscarUsuario($usuario): mixed
    {
        $sql = "SELECT * FROM $this->table WHERE lower (nome_usuario) = lower (:nome_usuario)";
        $stmt = $this->db->prepare(query: $sql);
        $stmt->bindValue(param: ':nome_usuario', value: $usuario);
        $stmt->execute();
        return $stmt->rowCount() > 0 ? $stmt->fetch(mode: PDO::FETCH_OBJ) : null;
    }
}
