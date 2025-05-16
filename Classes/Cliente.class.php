<?php
//email, senha, telefone
class Cliente extends CRUD{
    protected $table = "Cliente";
    private $id;
    private $nome;
    private $telefone;
    private $email;
    private $senha;

    public function setId($id){
        $this->id = $id;
    }
    public function setNome($nome){
        $this->nome = $nome;
    }
    public function setTel($telefone){
        $this->telefone = $telefone;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function setSenha($senha){
        $this->senha = $senha;
    }
    public function getId($id){
        $this->id = $id;
    }
    public function getNome($nome){
        $this->nome = $nome;
    }
    public function getTel($telefone){
        $this->telefone = $telefone;
    }
    public function getEmail($email){
        $this->email = $email;
    }
    public function getSenha($senha){
        $this->senha = $senha;
    }

    public function add(){
        $sql = "INSERT INTO $this->table (nome, telefone, email, senha) VALUES (:nome, telefone, email, senha)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":nome", $this->nome, PDO::PARAM_STR);
        $stmt->bindParam(":telefone", $this->telefone, PDO::PARAM_STR);
        $stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
        $stmt->bindParam(":senha", $this->senha, PDO::PARAM_STR);
        return $stmt->execute();
    }
    public function update(string $campo, int $id){
        $sql = "UPDATE $this->table SET nome = :nome, telefone, email, senha WHERE $campo = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":nome", $this->nome, PDO::PARAM_STR);
        $stmt->bindParam(":telefone", $id, PDO::PARAM_INT);
        $stmt->bindParam(":email", $id, PDO::PARAM_INT);
        $stmt->bindParam(":senha", $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}