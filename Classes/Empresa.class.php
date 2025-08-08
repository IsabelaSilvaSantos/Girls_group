<?php

//Endereço, email, telefone, nome, nome fantasia, rasão social, cnpj

class Empresa extends CRUD
{
    protected $table = "Empresa";
    private $nome;
    private $endereco;
    private $email;
    private $telefone;
    private $nomeFantasia;
    private $razaoSocial;
    private $cnpj;
    private $principalAtividade;
    private $historia;
    private $apresentacao;

    public function setNome($nome)
    {
        $this->nome = $nome;
    }
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }
    public function setNomeFantasia($nomeFantasia)
    {
        $this->nomeFantasia = $nomeFantasia;
    }
    public function setRazaoSocial($razaoSocial)
    {
        $this->razaoSocial = $razaoSocial;
    }
    public function setCnpj($cnpj)
    {
        $this->cnpj = $cnpj;
    }
    public function sethistoria($historia)
    {
        $this->historia = $historia;
    }
    public function setapresentacao($apresentacao)
    {
        $this->apresentacao = $apresentacao;
    }
    public function setprincipalAtividade($principalAtividade)
    {
        $this->principalAtividade = $principalAtividade;
    }
    public function getNome()
    {
        return $this->nome;
    }
    public function getEndereco()
    {
        return $this->endereco;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getTelefone()
    {
        return $this->telefone;
    }
    public function getRazaoSocial()
    {
        return $this->razaoSocial;
    }
    public function getNomeFantasia()
    {
        return $this->nomeFantasia;
    }
    public function getCnpj()
    {
        return $this->cnpj;
    }
    public function getprincipalAtividade()
    {
        return $this->principalAtividade;
    }
    public function gethistoria()
    {
        return $this->historia;
    }
    public function getapresentacao()
    {
        return $this->apresentacao;
    }


    public function add()
    {
        $sql = "INSERT INTO $this->table (nome, endereco, email, telefone, nomeFantasia, razaoSocial, cnpj, principalAtividade, historia, apresentacao ) VALUES (:nome, :endereco, :email, :telefone, :nomeFantasia, :razaoSocial, :cnpj, :principalAtividade, :historia, :apresentacao)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":nome", $this->nome, PDO::PARAM_STR);
        $stmt->bindParam(":endereco", $this->endereco, PDO::PARAM_STR);
        $stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
        $stmt->bindParam(":telefone", $this->telefone, PDO::PARAM_STR);
        $stmt->bindParam(":nomeFantasia", $this->nomeFantasia, PDO::PARAM_STR);
        $stmt->bindParam(":razaoSocial", $this->razaoSocial, PDO::PARAM_STR);
        $stmt->bindParam(":cnpj", $this->cnpj, PDO::PARAM_STR);
        $stmt->bindParam(":principalAtividade", $this->principalAtividade, PDO::PARAM_STR);
        $stmt->bindParam(":historia", $this->historia, PDO::PARAM_STR);
        $stmt->bindParam(":apresentacao", $this->apresentacao, PDO::PARAM_STR);
        return $stmt->execute();
    }
    public function update(string $campo, int $id)
    {
        $sql = "UPDATE $this->table SET nome = :nome, endereco= :endereco, email = :email, telefone = :telefone, nomeFantasia = :nomeFantasia, razaoSocial = :razaoSocial, cnpj = :cnpj, principalAtividade = :principalAtividade, historia = :historia, apresentacao = :apresentacao WHERE $campo = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":nome", $this->nome, PDO::PARAM_STR);
        $stmt->bindParam(":endereco", $this->endereco, PDO::PARAM_STR);
        $stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
        $stmt->bindParam(":telefone", $this->telefone, PDO::PARAM_STR);
        $stmt->bindParam(":nomeFantasia", $this->nomeFantasia, PDO::PARAM_STR);
        $stmt->bindParam(":razaoSocial", $this->razaoSocial, PDO::PARAM_STR);
        $stmt->bindParam(":cnpj", $this->cnpj, PDO::PARAM_STR);
        $stmt->bindParam(":principalAtividade", $this->principalAtividade, PDO::PARAM_STR);
        $stmt->bindParam(":historia", $this->historia, PDO::PARAM_STR);
        $stmt->bindParam(":apresentacao", $this->apresentacao, PDO::PARAM_STR);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);

        return $stmt->execute();
    }
}