<?php

class Login extends CRUD{
    protected $table = "Login";
    private $usuario;
    private $senha;

    
    public function getusuario(){
       return $this->usuario;
    }
    public function setusuario($usuario){
        $this->usuario = $usuario;
    }
    public function getsenha(){
        return $this->senha;
    }
    public function setsenha($senha){
        $this->senha = $senha;
    }


    public function add() {  
        $senhaComHash = password_hash($this->senha, PASSWORD_DEFAULT);
        $sql = "INSERT INTO $this->table (usuario, senha) VALUES (:usuario, :senha)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":usuario", $this->usuario, PDO::PARAM_STR);
        $stmt->bindParam(":senha", $this->senha, PDO::PARAM_STR);
        return $stmt->execute();

    }
        public function update(string $campo, int $id){
            $sql = "UPDATE $this->table SET nome=:usuario, :senha)  WHERE $campo=:usuario, :senha)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":usuario", $id, PDO::PARAM_INT);
            $stmt->bindParam(":senha", $id, PDO::PARAM_INT);
            return $stmt->execute();
        }
        }
        
    
