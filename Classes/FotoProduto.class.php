<?php
// A classe FotoProduto herda da sua classe base de CRUD, 
// assumindo que 'CRUD' possui os métodos básicos (delete, search, etc.)
// e gerencia a conexão com o banco de dados ($this->db).

class FotoProduto extends CRUD {
    
    protected $table = 'foto_produto'; 

    private $id_foto;
    private $id_produto;        // Chave estrangeira (fk_animal -> id_produto)
    private $nome_arquivo;      // Nome do arquivo físico (nome -> nome_arquivo)
    private $legenda;
    private $texto_alternativo; // (alternativo -> texto_alternativo)
    private $data_upload;       // (dataUpload -> data_upload)

    // ------------------------------------
    // Getters e Setters
    // ------------------------------------

    public function getIdFoto() { return $this->id_foto; }
    public function setIdFoto($id_foto) { $this->id_foto = $id_foto; }

    public function getIdProduto() { return $this->id_produto; }
    public function setIdProduto($id_produto) { $this->id_produto = $id_produto; }

    public function getNomeArquivo() { return $this->nome_arquivo; }
    public function setNomeArquivo($nome_arquivo) { $this->nome_arquivo = $nome_arquivo; }

    public function getLegenda() { return $this->legenda; }
    public function setLegenda($legenda) { $this->legenda = $legenda; }

    public function getTextoAlternativo() { return $this->texto_alternativo; }
    public function setTextoAlternativo($texto_alternativo) { $this->texto_alternativo = $texto_alternativo; }

    public function getDataUpload() { return $this->data_upload; }
    public function setDataUpload($data_upload) { $this->data_upload = $data_upload; }


    // ------------------------------------
    // Métodos de Persistência
    // ------------------------------------

    public function add() {
        $sql = "INSERT INTO $this->table (id_produto, nome_arquivo, legenda, texto_alternativo) 
                 VALUES (:id_produto, :nome_arquivo, :legenda, :texto_alternativo)";
        
        $stmt = $this->db->prepare($sql);
        
        $stmt->bindValue(":id_produto", $this->id_produto);
        $stmt->bindValue(":nome_arquivo", $this->nome_arquivo);
        $stmt->bindValue(":legenda", $this->legenda);
        $stmt->bindValue(":texto_alternativo", $this->texto_alternativo);

        return $stmt->execute();
    }
    
    /**
     * Atualiza um registro existente de foto na tabela foto_produto
     */
    public function update(string $campo, int $id) {
        $sql = "UPDATE $this->table 
                 SET id_produto = :id_produto, nome_arquivo = :nome_arquivo, legenda = :legenda, texto_alternativo = :texto_alternativo 
                 WHERE $campo = :id";
        
        $stmt = $this->db->prepare($sql);
        
        $stmt->bindValue(":id_produto", $this->id_produto);
        $stmt->bindValue(":nome_arquivo", $this->nome_arquivo);
        $stmt->bindValue(":legenda", $this->legenda);
        $stmt->bindValue(":texto_alternativo", $this->texto_alternativo);
        $stmt->bindValue(":id", $id);
        
        return $stmt->execute();
    }

    /**
     * Busca todas as fotos pertencentes a um Produto (Usada para listagem ou galeria)
     * @param int $idProduto ID do produto
     * @return array
     */
    public function fotosProduto(int $idProduto) {
        $sql = "SELECT * FROM $this->table where id_produto = :id_produto";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id_produto', $idProduto);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    
    /**
     * Busca o nome do arquivo da primeira foto de um produto.
     * Essencial para listagens de produtos que precisam de uma imagem de capa.
     * @param int $idProduto ID do produto
     * @return string|null Nome do arquivo ou null se não houver foto.
     */
    public function getFirstPhotoPathByProductId(int $idProduto): ?string {
        $sql = "SELECT nome_arquivo FROM $this->table WHERE id_produto = :id_produto ORDER BY id_foto ASC LIMIT 1";
        $stmt = $this->db->prepare($sql);
        
        // Garante que o ID do produto é um inteiro
        $stmt->bindParam(':id_produto', $idProduto, PDO::PARAM_INT);
        $stmt->execute();

        // Obtém o primeiro resultado como um objeto
        // Como o SELECT retorna apenas uma coluna (nome_arquivo), o resultado é uma stdClass com essa propriedade.
        $result = $stmt->fetch(PDO::FETCH_OBJ);
        
        // Retorna o nome do arquivo se o resultado existir, caso contrário, retorna null
        return $result ? $result->nome_arquivo : null;
    }
}
?>
