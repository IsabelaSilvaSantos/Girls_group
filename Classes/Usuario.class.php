<?php

class Usuario extends CRUD {
    protected $table = "usuario";
    private $nome;
    private $email;
    private $senha;

public function getnome() {
    return $this->nome;
}
public function setemail() {
    return $this->email;
}
public function getsenha() {
    return $this->senha;
}

public function add() {
$sql = "INSERT INTO $this->table(nome, email, senha) VALUES (:nome, email, senha)";
$stmt = $this->db->prepare($sql);
$stmt->bindParam("nome", $this->nome, $this->nome);
$stmt->bindParam("email", $this->email);
$stmt->bindParam("senha", $this->senha);
return $stmt->execute();
}



}