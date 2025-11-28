<?php
class Categoria extends CRUD
{
    protected $table = "categoria"; 
    private $id_categoria;
    private $nome_categoria;

    public function getid_categoria()
    {
        return $this->id_categoria;
    }

    public function setid_categoria($id_categoria)
    {
        $this->id_categoria = $id_categoria;
    }

    public function getNome_categoria()
    {
        return $this->nome_categoria;
    }

    public function setNome_categoria(string $nome_categoria)
    {
        $this->nome_categoria = $nome_categoria;
    }

    public function getCategoriaById(int $id)
    {
        $sql = "SELECT id_categoria, nome_categoria FROM {$this->table} WHERE id_categoria = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function add()
    {
        $sql = "INSERT INTO {$this->table} (nome_categoria) VALUES (:nome_categoria)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':nome_categoria', $this->nome_categoria, PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function update(string $campo, int $id)
    {
        $sql = "UPDATE {$this->table} SET nome_categoria = :nome_categoria WHERE id_categoria = :id_categoria";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':nome_categoria', $this->nome_categoria, PDO::PARAM_STR);
        $stmt->bindParam(':id_categoria', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}