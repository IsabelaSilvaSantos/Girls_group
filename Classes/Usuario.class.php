<?php

class Usuario extends CRUD{
    protected $table = "cadastro_usario";
    private $nome;
    private $email;
    
    private $papel;
    private $senha;

    public function getnome()
    {
        $this->nome;
    }
    public function setemail()
    {
        $this->email;
    }
    public function setpapel()
    {
        $this->papel;
    }
    public function getsenha()

    {
        $this->senha;
    }



    {  
    public function add()
        $sql = "INSERT INTO $this->table(nome, email, senha) VALUES (:nome, email, senha)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam("nome", $this->nome, $this->nome);
        $stmt->bindParam("email", $this->email);
        $stmt->bindParam("papel", $this->papel);
        $stmt->bindParam("senha", $this->senha);
        return $stmt->execute();
    }



}