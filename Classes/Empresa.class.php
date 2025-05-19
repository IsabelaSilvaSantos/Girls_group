<?php 

//Endereço, email, telefone, nome, nome fantasia, rasão social, cnpj

class Empresa extends CRUD{
    protected $table = "Empresa";
    private $nome; 
    private $endereco;
    private $email; 
    private $telefone;
    private $nomeFantasia;
    private $razaoSocial;
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
public function setRazaoSocial($razaoSocial){
    $this->razaoSocial = $razaoSocial;
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
public function getRazaoSocial($razaoSocial) {
    $this->razaoSocial = $razaoSocial;
}
public function getNomeFantasia($nomeFantasia) {
    $this->nomeFantasia = $nomeFantasia;
}
public function getCnpj($cnpj) {
    $this->cnpj = $cnpj;
}


public function add(){
    $sql = "INSERT INTO $this->table (nome, endereco, email, telefone, nomeFantasia, razaoSocial, cnpj) VALUES (:nome, :endereco, :email, :telefone, :nomeFantasia, :razaoSocial, :cnpj)";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(":nome", $this->nome, PDO::PARAM_STR);
    $stmt->bindParam(":endereco", $this->endereco, PDO::PARAM_STR);
    $stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
    $stmt->bindParam(":telefone", $this->telefone, PDO::PARAM_STR);
    $stmt->bindParam(":nomeFantasia", $this->nomeFantasia, PDO::PARAM_STR);
    $stmt->bindParam(":razaoSocial", $this->razaoSocial, PDO::PARAM_STR);
    $stmt->bindParam(":cnpj", $this->cnpj, PDO::PARAM_STR);
    return $stmt->execute();
}
public function update(string $campo, int $id){
    $sql = "UPDATE $this->table SET nome=:nome, :endereco, :email, :telefone, :nomeFantasia, :razaoSocial, :cnpj WHERE $campo=:id";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(":nome", $this->nome, PDO::PARAM_STR);
    $stmt->bindParam(":endereco", $id, PDO::PARAM_INT);
    $stmt->bindParam(":email", $id, PDO::PARAM_INT);
    $stmt->bindParam(":telefone", $id, PDO::PARAM_INT);
    $stmt->bindParam(":nomeFantasia", $id, PDO::PARAM_INT);
    $stmt->bindParam(":razaoSocial", $id, PDO::PARAM_INT);
    $stmt->bindParam(":cnpj", $id, PDO::PARAM_INT);
    return $stmt->execute();
}
}