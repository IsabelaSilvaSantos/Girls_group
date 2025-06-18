<?php

class Login extends CRUD{
    protected $table = "cadastro_usuario";
    private $nome;
    private $senha;

    
    public function getnome(){
       return $this->nome;
    }
    public function setnome($nome){
        $this->nome = $nome;
    }
    public function getsenha(){
        return $this->senha;
    }
    public function setsenha($senha){
        $this->senha = $senha;
    }


    public function add() {  
        $senhaComHash = password_hash($this->senha, PASSWORD_DEFAULT);
        $sql = "INSERT INTO $this->table (nome, senha) VALUES (:nome, :senha)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":nome", $this->nome, PDO::PARAM_STR);
        $stmt->bindParam(":senha", $senhaComHash, PDO::PARAM_STR);
        return $stmt->execute();

    }
        public function update(string $campo, int $id){
            $sql = "UPDATE $this->table SET nome = :nome, senha = :senha WHERE $campo = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":nome", $this->nome, PDO::PARAM_STR);
            $stmt->bindParam(":senha", $this->senha, PDO::PARAM_INT);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            return $stmt->execute();
        }
        }
        
    
