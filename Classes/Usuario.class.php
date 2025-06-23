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
        $senhaComHash = password_hash($this->senha, PASSWORD_DEFAULT);
        $sql = "INSERT INTO $this->table(nome, email, papel, senha) VALUES (:nome, :email, :papel, :senha)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":nome", $this->nome, PDO::PARAM_STR);
        $stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
        $stmt->bindParam(":papel", $this->papel, PDO::PARAM_STR);
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
public function buscarUsuario($usuario): mixed{
$sql = "SELECT * FROM cadastro_usuario WHERE nome = :nome";
$stmt = $this->db->prepare(query: $sql);
$stmt->bindValue(param: ':nome', value: $usuario);
$stmt->execute();
return $stmt->rowCount() > 0 ? $stmt->fetch(mode: PDO::FETCH_OBJ) : null;
}
}
