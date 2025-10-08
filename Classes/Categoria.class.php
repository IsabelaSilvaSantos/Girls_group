<?php

// A classe Categoria estende a classe base CRUD.
class Categoria extends CRUD
{
    protected $table = "categoria";
    
    // Propriedades
    private $nome_categoria;
    
    // GETTERS & SETTERS
    public function getNome_categoria() {
        return $this->nome_categoria;
    }
    
    public function setNome_categoria(string $nome_categoria) {
        $this->nome_categoria = $nome_categoria;
    }

    /**
     * Busca uma categoria pelo seu ID (necessário para mostrar o título da página).
     * Nota: O método getById do CRUD base foi sobrescrito ou ajustado 
     * no CRUD.php para usar 'id_produto'. Por segurança, criamos um específico.
     * @param int $id ID da categoria
     * @return object|null
     */
    public function getCategoriaById(int $id)
    {
        $sql = "SELECT id_categoria, nome_categoria FROM {$this->table} WHERE id_categoria = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }
    
    // Implementação do método abstrato add()
    public function add()
    {
        $sql = "INSERT INTO {$this->table} (nome_categoria) VALUES (:nome_categoria)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':nome_categoria', $this->nome_categoria, PDO::PARAM_STR);
        return $stmt->execute();
    }

    // Implementação do método abstrato update()
    public function update(string $campo, int $id)
    {
        $sql = "UPDATE {$this->table} SET nome_categoria = :nome_categoria WHERE id_categoria = :id_categoria";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':nome_categoria', $this->nome_categoria, PDO::PARAM_STR);
        $stmt->bindParam(':id_categoria', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}