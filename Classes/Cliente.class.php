<?php
class Cliente extends CRUD
{
    protected $table = "cliente";
    private $id_cliente;
    private $nome_cliente;
    private $telefone;
    private $email;
    private $senha;

    public function setId_cliente($id_cliente)
    {
        $this->id_cliente = $id_cliente;
    }
    public function setNome($nome_cliente)
    {
        $this->nome_cliente = $nome_cliente;
    }
    public function setTel($telefone)
    {
        $this->telefone = $telefone;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function setSenha($senha)
    {
        $this->senha = $senha;
    }
    public function getId_cliente()
    {
        return $this->id_cliente;
    }
    public function getNome()
    {
        return $this->nome_cliente;
    }
    public function getTel()
    {
        return $this->telefone;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getSenha()
    {
        return $this->senha;
    }

    public function add()
    {
        // Verifica se o email já existe
        $sqlCheck = "SELECT COUNT(*) FROM $this->table WHERE email = :email";
        $stmtCheck = $this->db->prepare($sqlCheck);
        $stmtCheck->bindParam(":email", $this->email, PDO::PARAM_STR);
        $stmtCheck->execute();
        if($stmtCheck->fetchColumn() > 0){
            throw new Exception("Este email já está cadastrado.");
        }
        
        $sql = "INSERT INTO $this->table (nome_cliente, telefone, email, senha) VALUES (:nome_cliente, :telefone, :email, :senha)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":nome_cliente", $this->nome_cliente, PDO::PARAM_STR);
        $stmt->bindParam(":telefone", $this->telefone, PDO::PARAM_STR);
        $stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
        $stmt->bindParam(":senha", $this->senha, PDO::PARAM_STR);
        return $stmt->execute();
    }
    public function update(string $campo, int $id_cliente)
    {
        $sql = "UPDATE $this->table SET nome_cliente = :nome_cliente, telefone = :telefone, email = :email, senha = :senha WHERE $campo = :id_cliente";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":nome_cliente", $this->nome_cliente, PDO::PARAM_STR);
        $stmt->bindParam(":telefone", $this->telefone, PDO::PARAM_STR);
        $stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
        $stmt->bindParam(":senha", $this->senha, PDO::PARAM_STR);
        $stmt->bindParam(":id_cliente", $id_cliente, PDO::PARAM_INT);
        return $stmt->execute();
    }
}