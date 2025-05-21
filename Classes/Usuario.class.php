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
    public function setpapwl($papel){
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
        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":papel", $this->papel);
        $stmt->bindParam(":senha", $this->senha);
        return $stmt->execute();
    }

    public function update(string $campo, int $id){

    }

}