<?php

class FotoProduto extends CRUD
{

    protected $table = 'foto_produto';

    private $id_foto;
    private $id_produto;
    private $nome_arquivo;
    private $legenda;
    private $texto_alternativo;
    private $data_upload;

    public function getIdFoto()
    {
        return $this->id_foto;
    }
    public function setIdFoto($id_foto)
    {
        $this->id_foto = $id_foto;
    }

    public function getIdProduto()
    {
        return $this->id_produto;
    }
    public function setIdProduto($id_produto)
    {
        $this->id_produto = $id_produto;
    }

    public function getNomeArquivo()
    {
        return $this->nome_arquivo;
    }
    public function setNomeArquivo($nome_arquivo)
    {
        $this->nome_arquivo = $nome_arquivo;
    }

    public function getLegenda()
    {
        return $this->legenda;
    }
    public function setLegenda($legenda)
    {
        $this->legenda = $legenda;
    }

    public function getTextoAlternativo()
    {
        return $this->texto_alternativo;
    }
    public function setTextoAlternativo($texto_alternativo)
    {
        $this->texto_alternativo = $texto_alternativo;
    }

    public function getDataUpload()
    {
        return $this->data_upload;
    }
    public function setDataUpload($data_upload)
    {
        $this->data_upload = $data_upload;
    }

    public function add()
    {
        $sql = "INSERT INTO $this->table (id_produto, nome_arquivo, legenda, texto_alternativo) VALUES (:id_produto, :nome_arquivo, :legenda, :texto_alternativo)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":id_produto", $this->id_produto);
        $stmt->bindValue(":nome_arquivo", $this->nome_arquivo);
        $stmt->bindValue(":legenda", $this->legenda);
        $stmt->bindValue(":texto_alternativo", $this->texto_alternativo);

        return $stmt->execute();
    }

    public function update(string $campo, int $id)
    {
        $sql = "UPDATE $this->table SET id_produto = :id_produto, nome_arquivo = :nome_arquivo, legenda = :legenda, texto_alternativo = :texto_alternativo WHERE $campo = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":id_produto", $this->id_produto);
        $stmt->bindValue(":nome_arquivo", $this->nome_arquivo);
        $stmt->bindValue(":legenda", $this->legenda);
        $stmt->bindValue(":texto_alternativo", $this->texto_alternativo);
        $stmt->bindValue(":id", $id);
        return $stmt->execute();
    }

    public function fotosProduto(int $idProduto)
    {
        $sql = "SELECT * FROM $this->table where id_produto = :id_produto";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id_produto', $idProduto);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function getFirstPhotoPathByProductId(int $idProduto): ?string
    {
        $sql = "SELECT nome_arquivo FROM $this->table WHERE id_produto = :id_produto ORDER BY id_foto ASC LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id_produto', $idProduto, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_OBJ);
        return $result ? $result->nome_arquivo : null;
    }
}
?>