<?php

//Endereço, email, telefone, nome, nome fantasia, rasão social, cnpj

class Empresa extends CRUD
{
    protected $table = "empresa";
    private $id_empresa;
    private $nome_empresa;
    private $endereco;
    private $email;
    private $telefone;
    private $nome_fantasia;
    private $razao_social;
    private $cnpj;
    private $principal_atividade;
    private $historia;
    private $apresentacao;

    public function setNome($nome_empresa)
    {
        $this->nome_empresa = $nome_empresa;
    }

    public function setid_empresa($id_empresa)
    {
        $this->id_empresa = $id_empresa;
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
    public function setNomeFantasia($nome_fantasia)
    {
        $this->nome_fantasia = $nome_fantasia;
    }
    public function setRazaoSocial($razao_social)
    {
        $this->razao_social = $razao_social;
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
    public function setprincipalAtividade($principal_atividade)
    {
        $this->principal_atividade = $principal_atividade;
    }
    public function getNome()
    {
        return $this->nome_empresa;
    }
    public function getid_empresa()
    {
        return $this->id_empresa;
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
    public function getRazao_social()
    {
        return $this->razao_social;
    }
    public function getNome_fantasia()
    {
        return $this->nome_fantasia;
    }
    public function getCnpj()
    {
        return $this->cnpj;
    }
    public function getprincipal_atividade()
    {
        return $this->principal_atividade;
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
        $sql = "INSERT INTO $this->table (nome_empresa, endereco, email, telefone, nome_fantasia, razao_social, cnpj, principal_atividade, historia, apresentacao ) VALUES (:nome_empresa, :endereco, :email, :telefone, :nome_fantasia, :razao_social, :cnpj, :principal_atividade, :historia, :apresentacao)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":nome_empresa", $this->nome_empresa, PDO::PARAM_STR);
        $stmt->bindParam(":endereco", $this->endereco, PDO::PARAM_STR);
        $stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
        $stmt->bindParam(":telefone", $this->telefone, PDO::PARAM_STR);
        $stmt->bindParam(":nome_fantasia", $this->nome_fantasia, PDO::PARAM_STR);
        $stmt->bindParam(":razao_social", $this->razao_social, PDO::PARAM_STR);
        $stmt->bindParam(":cnpj", $this->cnpj, PDO::PARAM_STR);
        $stmt->bindParam(":principal_atividade", $this->principal_atividade, PDO::PARAM_STR);
        $stmt->bindParam(":historia", $this->historia, PDO::PARAM_STR);
        $stmt->bindParam(":apresentacao", $this->apresentacao, PDO::PARAM_STR);
        return $stmt->execute();
    }
    public function update(string $campo, int $id_empresa)
    {
        $sql = "UPDATE $this->table SET nome_empresa = :nome_empresa, endereco= :endereco, email = :email, telefone = :telefone, nome_fantasia = :nome_fantasia, razao_social = :razao_social, cnpj = :cnpj, principal_atividade = :principal_atividade, historia = :historia, apresentacao = :apresentacao WHERE $campo = :id_empresa";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":nome_empresa", $this->nome_empresa, PDO::PARAM_STR);
        $stmt->bindParam(":endereco", $this->endereco, PDO::PARAM_STR);
        $stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
        $stmt->bindParam(":telefone", $this->telefone, PDO::PARAM_STR);
        $stmt->bindParam(":nome_fantasia", $this->nome_fantasia, PDO::PARAM_STR);
        $stmt->bindParam(":razao_social", $this->razao_social, PDO::PARAM_STR);
        $stmt->bindParam(":cnpj", $this->cnpj, PDO::PARAM_STR);
        $stmt->bindParam(":principal_atividade", $this->principal_atividade, PDO::PARAM_STR);
        $stmt->bindParam(":historia", $this->historia, PDO::PARAM_STR);
        $stmt->bindParam(":apresentacao", $this->apresentacao, PDO::PARAM_STR);
        $stmt->bindParam(":id_empresa", $id_empresa, PDO::PARAM_INT);

        return $stmt->execute();
    }
}