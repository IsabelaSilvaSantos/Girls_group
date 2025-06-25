<?php
//Nome do Produto, Descrição, Preço, Unidade de Medida
class Produto extends CRUD{
    protected $table = "Produtos";
    private $id;
    private $nome;
    private $descricao;
    private $preco;
    private $unidadeMedida;

    public function setId($id){
        $this->id = $id;
    }
    public function setNome($nome){
        $this->nome = $nome;
    }
    public function setDesc($descricao){
        $this->descricao = $descricao;
    }
    public function setPreco($preco){
        $this->preco = $preco;
    }
    public function setUnidMed($unidadeMedida){
        $this->unidadeMedida = $unidadeMedida;
    }
    public function getId(){
        return $this-> id;
    }
    public function getNome(){
        return $this->nome;
    }
    public function getDesc(){
        return $this->descricao;
    }
    public function getPreco(){
        return $this->preco;
    }
    public function getUnidMed(){
        return $this->unidadeMedida;
    }

    public function add(){
        $sql = "INSERT INTO $this->table (nome, descricao, preco, unidadeMedida) VALUES (:nome, :descricao, :preco, :unidadeMedida)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":nome", $this->nome, PDO::PARAM_STR);
        $stmt->bindParam(":descricao", $this->descricao, PDO::PARAM_STR);
        $stmt->bindParam(":preco", $this->preco, PDO::PARAM_STR);
        $stmt->bindParam(":unidadeMedida", $this->unidadeMedida, PDO::PARAM_STR);
        return $stmt->execute();
    }
    public function update(string $campo, int $id){
        $sql = "UPDATE $this->table SET nome=:nome, :descricao, :preco, :unidadeMedida WHERE $campo = :id, :nome, :descricao, :preco, :unidadeMedida";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":nome", $this->nome, PDO::PARAM_STR);
        $stmt->bindParam(":descricao", $id, PDO::PARAM_INT);
        $stmt->bindParam(":preco", $id, PDO::PARAM_INT);
        $stmt->bindParam(":unidadeMedida", $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
    public function findAll() {
        $sql = "select * from $this->table";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}