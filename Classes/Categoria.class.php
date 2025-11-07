<?php
// Classe Categoria gerencia as regras de negócio e a interação com o banco de dados para o cadastro de categorias.
class Categoria extends CRUD
{
    // A propriedade protected $table define o nome da tabela no banco de dados com a qual a classe irá operar.
    protected $table = "categoria"; 
    // As propriedades privadas representam as colunas da tabela.
    // O uso do modificador 'private' garante o Encapsulamento, protegendo o acesso direto aos dados.
    private $id_categoria;
    private $nome_categoria;

    // Métodos Getters e Setters são Acessos e Modificações Controlados por Dados

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

    // Método responsável por buscar uma única categoria no banco de dados usando o ID.
    public function getCategoriaById(int $id)
    {
        $sql = "SELECT id_categoria, nome_categoria FROM {$this->table} WHERE id_categoria = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    // Permite que o sistema cadastre novas categorias para os produtos do segmento escolhido.
    public function add()
    {
        $sql = "INSERT INTO {$this->table} (nome_categoria) VALUES (:nome_categoria)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':nome_categoria', $this->nome_categoria, PDO::PARAM_STR);
        return $stmt->execute();
    }

    // Permite que o administrador edite o nome de uma categoria existente.
    public function update(string $campo, int $id)
    {
        $sql = "UPDATE {$this->table} SET nome_categoria = :nome_categoria WHERE id_categoria = :id_categoria";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':nome_categoria', $this->nome_categoria, PDO::PARAM_STR);
        $stmt->bindParam(':id_categoria', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}