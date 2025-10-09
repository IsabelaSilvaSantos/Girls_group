<?php

// Assumindo que a classe CRUD e a conexão com o banco (this->db) já estão definidas
class Usuario extends CRUD
{
    protected $table = "usuario";
    private $id_usuario;
    private $nome_usuario;
    private $email;
    private $papel;
    private $senha; // Guarda a senha sem hash quando vinda do formulário

    // --- GETTERS & SETTERS ---

    public function getid_usuario()
    {
        return $this->id_usuario;
    }
    public function setid_usuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;
    }

    public function getnome()
    {
        return $this->nome_usuario;
    }
    public function setnome($nome_usuario)
    {
        $this->nome_usuario = $nome_usuario;
    }

    public function getemail()
    {
        return $this->email;
    }
    public function setemail($email)
    {
        $this->email = $email;
    }

    public function getpapel()
    {
        return $this->papel;
    }

    public function setpapel($papel)
    {
        $this->papel = $papel;
    }
    public function getsenha()
    {
        return $this->senha;
    }
    public function setsenha($senha)
    {
        $this->senha = $senha;
    }

    // --- MÉTODOS CRUD EXISTENTES ---

    public function add()
    {
        // Senha é criptografada antes de ser salva
        $senhaComHash = password_hash($this->senha, PASSWORD_DEFAULT);
        $sql = "INSERT INTO $this->table(nome_usuario, email, papel, senha) VALUES (:nome_usuario, :email, :papel, :senha)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":nome_usuario", $this->nome_usuario, PDO::PARAM_STR);
        $stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
        $stmt->bindParam(":papel", $this->papel, PDO::PARAM_STR);
        $stmt->bindParam(":senha", $senhaComHash, PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function update(string $campo, int $id_usuario)
    {
        if (!empty($this->senha)) {
            // Se uma nova senha foi fornecida no formulário, ela é hasheada
            $senha = password_hash($this->senha, PASSWORD_DEFAULT);
        } else {
            // Se a senha estiver vazia, busca a senha atual para mantê-la
            $sqlSenha = "SELECT senha FROM $this->table WHERE $campo = :id";
            $stmtSenha = $this->db->prepare($sqlSenha);
            $stmtSenha->bindParam(":id", $id_usuario, PDO::PARAM_INT);
            $stmtSenha->execute();
            $senha = $stmtSenha->fetchColumn();
        }

        $sql = "UPDATE $this->table SET nome_usuario = :nome_usuario, email = :email, papel = :papel, senha = :senha WHERE $campo = :id_usuario";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":nome_usuario", $this->nome_usuario);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":papel", $this->papel);
        $stmt->bindParam(":senha", $senha);
        $stmt->bindParam(":id_usuario", $id_usuario, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function buscarUsuario($usuario): mixed
    {
        $sql = "SELECT * FROM $this->table WHERE lower (nome_usuario) = lower (:nome_usuario)";
        $stmt = $this->db->prepare(query: $sql);
        $stmt->bindValue(param: ':nome_usuario', value: $usuario);
        $stmt->execute();
        return $stmt->rowCount() > 0 ? $stmt->fetch(mode: PDO::FETCH_OBJ) : null;
    }
    
    // --- NOVOS MÉTODOS PARA ALTERAÇÃO DE DADOS ---

    /**
     * Tenta atualizar o e-mail do usuário após verificar a senha atual.
     * Assume que: $this->nome_usuario, $this->email e $this->senha (senha atual em texto puro) foram setados.
     * @return bool|string Retorna true em sucesso, ou mensagem de erro.
     */
    public function atualiza_email()
    {
        try {
            // 1. Busca o usuário pelo nome para verificar a senha atual
            $sql = "SELECT senha, nome_usuario FROM $this->table WHERE nome_usuario = :nome_usuario";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':nome_usuario', $this->nome_usuario);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $usuario = $stmt->fetch(PDO::FETCH_OBJ);
                
                // 2. Verifica a senha atual fornecida ($this->senha)
                if (password_verify($this->senha, $usuario->senha)) {
                    
                    // 3. Atualiza o novo e-mail
                    $sql = "UPDATE $this->table SET email = :email WHERE nome_usuario = :nome_usuario";
                    $stmt = $this->db->prepare($sql);
                    $stmt->bindParam(':email', $this->email, PDO::PARAM_STR);
                    $stmt->bindParam(':nome_usuario', $this->nome_usuario);

                    return $stmt->execute() ? true : "Erro ao executar a atualização do e-mail no banco de dados.";
                } else {
                    return 'A Senha atual fornecida está incorreta.';
                }
            } else {
                 return 'Usuário não encontrado.';
            }
        } catch (PDOException $e) {
            // 23000 é geralmente código para violação de chave única/duplicidade
            if ($e->getCode() == 23000) {
                return 'Erro: Este e-mail já está em uso por outro usuário.';
            }
            return 'Erro no sistema contate o administrador.';
        }
    }

    /**
     * Altera a senha do usuário após verificar a senha atual.
     * Assume que: $this->nome_usuario foi setado (quem está alterando), e $this->senha (nova senha) foi setada.
     * @param string $senhaAtual A senha atual do usuário (texto puro)
     * @return bool Retorna true em sucesso, ou false em caso de falha na verificação/execução.
     */
    public function alterarSenha($senhaAtual)
    {
        try {
            // 1. Busca o usuário pelo nome para verificar a senha atual
            $sql = "SELECT senha, nome_usuario FROM $this->table WHERE nome_usuario = :nome_usuario";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':nome_usuario', $this->nome_usuario, PDO::PARAM_STR);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $usuario = $stmt->fetch(PDO::FETCH_OBJ);

                // 2. Verifica se a senha atual fornecida está correta
                if ($usuario && password_verify($senhaAtual, $usuario->senha)) {
                    
                    // 3. Cria o hash da nova senha (armazenada em $this->senha)
                    $novaSenhaHash = password_hash($this->senha, PASSWORD_DEFAULT);
                    
                    // 4. Atualiza a senha no banco de dados
                    $sql = "UPDATE $this->table SET senha = :novaSenha WHERE nome_usuario = :nome_usuario";
                    $stmt = $this->db->prepare($sql);
                    $stmt->bindParam(':novaSenha', $novaSenhaHash, PDO::PARAM_STR);
                    $stmt->bindParam(':nome_usuario', $this->nome_usuario, PDO::PARAM_STR);
                    
                    return $stmt->execute();
                } else {
                    return false; // Senha atual incorreta
                }
            } else {
                return false; // Usuário não encontrado
            }
        } catch (PDOException $e) {
            // Logar $e->getMessage() aqui seria útil para debug
            return false;
        }
    }
}
