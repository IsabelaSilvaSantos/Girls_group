<?php 
//Endereço, email, telefone, nome, nome fantasia, rasão social, cnpj
class Empresa extends CRUD{
    protected $table = "Empresa";
    private $id;
    private $nome; 
    private $endereco;
    private $email; 
    private $telefone;
    private $nomeFantasia;
    private $rasaoSocial;
    private $cnpj;

    public function setId($id){
        $this->id = $id;
    }
    public function setNome($nome) {
        $this->nome = $nome;
}
public function getId($id) { 
    $this->id = $id;
}
public function getNome($nome) {
    $this->nome = $nome;
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