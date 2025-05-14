<?php 

//Endereço, email, telefone, nome, nome fantasia, rasão social, cnpj

class Empresa extends CRUD{
    protected $table = "Empresa";
    private $nome; 
    private $endereco;
    private $email; 
    private $telefone;
    private $nomeFantasia;
    private $rasaoSocial;
    private $cnpj;

    public function setNome($nome) {
        $this->nome = $nome;
}
public function setEndereco($endereco){
    $this->endereco = $endereco;
}
public function setEmail($email){
    $this->email = $email;
}
public function setTelefone($telefone){
    $this->telefone = $telefone;
}
public function setNomeFantasia($nomeFantasia){
    $this->nomeFantasia = $nomeFantasia;
}
public function setRasaoSocial($rasaoSocial){
    $this->rasaoSocial = $rasaoSocial;
}
public function setCnpj($cnpj){
    $this->cnpj = $cnpj;
}
public function getNome($nome) {
    $this->nome = $nome;
}
public function getEndereco($endereco) {
    $this->endereco = $endereco;
}
public function getEmail($email) {
    $this->email = $email;
}
public function getTelefone($telefone) {
    $this->telefone = $telefone;
}
public function getRasaoSocial($rasaoSocial) {
    $this->rasaoSocial = $rasaoSocial;
}
public function getNomeFantasia($nomeFantasia) {
    $this->nomeFantasia = $nomeFantasia;
}
public function getCnpj($cnpj) {
    $this->cnpj = $cnpj;
}


public function add(){
    $sql = "INSERT INTO $this->table (nome) VALUES (:nome)";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(":nome", $this->nome, PDO::PARAM_STR);
    return $stmt->execute();
}
public function update(string $campo, int $id){
    $sql = "UPDATE $this->table SET nome=:nome WHERE $campo=:id";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(":nome", $this->nome, PDO::PARAM_STR);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    return $stmt->execute();
}
}