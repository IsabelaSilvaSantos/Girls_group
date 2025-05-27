<?php

class Usuario extends CRUD{
    protected $table = "cadastro_usuario";
    private $nome;
    private $email;
    private $papel;
    private $senha;

    
    public function getnome(){
       return $this->nome;
    }
    public function setnome($nome){
        $this->nome = $nome;
    }
    
    public function getemail(){
       return $this->email;
    }
    public function setemail($email){
        $this->email = $email;
    }
    
    public function getpapel(){
       return $this->papel;
    }
    public function setpapel($papel){
        $this->papel = $papel;
    }
    
    
    public function getsenha(){
        return $this->senha;
    }
    public function setsenha($senha){
        $this->senha = $senha;
    }


    public function add() {  
        $sql = "INSERT INTO $this->table(nome, email, papel, senha) VALUES (:nome, :email, :papel, :senha)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":nome", $this->nome, PDO::PARAM_STR);
        $stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
        $stmt->bindParam(":papel", $this->papel, PDO::PARAM_STR);
        $stmt->bindParam(":senha", $this->senha, PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function update(string $campo, int $id){

    }

}