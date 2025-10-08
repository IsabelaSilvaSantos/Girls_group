<?php
// Classe utilitária para gerenciar o upload e exclusão de arquivos de imagem

class Imagem {
    private $diretorio = 'images/'; // Diretório padrão de upload
    private $prefixo;               // Prefixo para o nome do arquivo (ex: 'prod_')

    /**
     * Construtor da classe Imagem
     * @param string $diretorio Onde salvar a imagem (relativo ao script)
     * @param string $prefixo Prefixo para renomear o arquivo
     */
    public function __construct(string $diretorio = 'images/', string $prefixo = '') {
        $this->diretorio = $diretorio;
        $this->prefixo = $prefixo;
        
        // Garante que o diretório existe e é gravável
        if (!is_dir($this->diretorio)) {
            mkdir($this->diretorio, 0777, true);
        }
    }

    /**
     * Faz o upload do arquivo
     * @param array $file O array $_FILES['nome_do_campo']
     * @return string O novo nome do arquivo gerado
     */
    public function upload(array $file): string {
        if ($file['error'] !== UPLOAD_ERR_OK) {
            throw new Exception("Erro no upload do arquivo: Código " . $file['error']);
        }

        $extensao = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        
        // Gera um nome único e seguro (ex: prod_6527c08b3e8e7.jpg)
        $nomeArquivo = $this->prefixo . uniqid() . '.' . $extensao;
        $caminhoCompleto = $this->diretorio . $nomeArquivo;

        if (move_uploaded_file($file['tmp_name'], $caminhoCompleto)) {
            return $nomeArquivo;
        } else {
            throw new Exception("Falha ao mover o arquivo para o destino: " . $caminhoCompleto);
        }
    }

    /**
     * Deleta um arquivo do diretório de upload
     * @param string $nomeArquivo Nome do arquivo a ser deletado
     * @return bool
     */
    public function deletar(string $nomeArquivo): bool {
        if (empty($nomeArquivo)) {
            return true;
        }
        $caminhoCompleto = $this->diretorio . $nomeArquivo;
        
        // Verifica se o arquivo existe e o deleta
        if (file_exists($caminhoCompleto) && is_file($caminhoCompleto)) {
            return unlink($caminhoCompleto);
        }
        return false;
    }
}
?>