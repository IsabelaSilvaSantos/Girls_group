<?php
class Imagem
{
    private $diretorio = 'images/';
    private $prefixo;
    private $tam_Max;
    private $ext_Perm;

    public function __construct(
        string $diretorio = 'images/',
        int $tam_Max = 20971520,
        array $ext_Perm = ['jpg', 'jpeg', 'png', 'gif'],
        string $prefixo = ''
    ) {
        $this->diretorio = rtrim($diretorio, '/') . '/';
        $this->prefixo = $prefixo;
        $this->tam_Max = $tam_Max;
        $this->ext_Perm = $ext_Perm;

        if (!is_dir($this->diretorio)) {
            mkdir($this->diretorio, 0755, true);
        }
    }

    public function upload(array $file): string
    {
        $this->validarErro($file);
        $this->validarTamanho($file);
        $this->validarExtensao($file);

        $extensao = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $nomeArquivo = $this->prefixo . uniqid() . '.' . $extensao;
        $caminhoCompleto = $this->diretorio . $nomeArquivo;

        if (move_uploaded_file($file['tmp_name'], $caminhoCompleto)) {
            return $nomeArquivo;
        } else {
            throw new Exception("Falha ao mover o arquivo para o destino: " . $caminhoCompleto);
        }
    }

    public function deletar(string $nomeArquivo): bool
    {
        if (empty($nomeArquivo)) {
            return true;
        }

        $caminhoCompleto = $this->diretorio . $nomeArquivo;


        if (file_exists($caminhoCompleto) && is_file($caminhoCompleto)) {
            return unlink($caminhoCompleto);
        }
        return false;
    }

    private function validarErro(array $arquivo)
    {
        if ($arquivo['error'] !== UPLOAD_ERR_OK) {
            throw new Exception("Erro no upload da imagem. Código: " . $arquivo['error']);
        }
    }

    private function validarTamanho(array $arquivo)
    {
        if ($arquivo['size'] > $this->tam_Max) {
            $tamanhoMB = round($this->tam_Max / 1024 / 1024, 2);
            throw new Exception("A imagem excede o tamanho máximo permitido de {$tamanhoMB}MB.");
        }
    }

    private function validarExtensao(array $arquivo)
    {
        $extensao = strtolower(pathinfo($arquivo['name'], PATHINFO_EXTENSION));
        if (!in_array($extensao, $this->ext_Perm)) {
            throw new Exception("Extensão de arquivo não permitida. Permitidas: " . implode(", ", $this->ext_Perm));
        }
    }
}