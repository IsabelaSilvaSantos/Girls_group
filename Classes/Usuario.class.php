<?php

class Usuario extends CRUD{
    protected $table = "cadastro_usario";
    private $nome;
    private $email;
    private $papel;
    private $senha;

    
    public function setnome(){
       return $this->nome;
    }
    
    public function setemail(){
       return $this->email;
    }
    
    public function setpapel(){
       return $this->papel;
    }
    
    public function setsenha(){
        return $this->senha;
    }


    public function add() {  
        $sql = "INSERT INTO $this->table(nome, email, papel, senha) VALUES (:nome, :email, :papel, :senha)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":papel", $this->papel);
        $stmt->bindParam(":senha", $this->senha);
        return $stmt->execute();
    }

    public function update(string $campo, int $id){

    }

}