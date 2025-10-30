<?php

spl_autoload_register(function ($class) {
    require_once "Classes/{$class}.class.php";
});

$foto = new FotoProduto();
$imgFile = new Imagem(prefixo: "prod_");
$nomeArquivo = '';

if (filter_has_var(INPUT_POST, "btnGravar")):
    $foto->iniciarTransacao();
    try {
        $idFoto = filter_input(INPUT_POST, 'idFoto', FILTER_VALIDATE_INT);
        $idProduto = filter_input(INPUT_POST, 'idProduto', FILTER_VALIDATE_INT);
        $fotoAntiga = filter_input(INPUT_POST, 'fotoAntiga');
        $foto->setIdProduto($idProduto);
        $foto->setNomeArquivo($fotoAntiga);

        if (!empty($_FILES['foto']['name'])) {
            $nomeArquivo = $imgFile->upload($_FILES['foto']);
            $foto->setNomeArquivo($nomeArquivo);

            if (!empty($fotoAntiga)) {
                $imgFile->deletar($fotoAntiga);
            }
        }

        $foto->setLegenda(filter_input(INPUT_POST, 'legenda'));
        $foto->setTextoAlternativo(filter_input(INPUT_POST, 'textoAlt'));

        if (empty($idFoto)):
            if ($foto->add()) {
                $mensagem = 'Foto adicionada com sucesso!';
            } else {
                $mensagem = 'Erro ao adicionar foto.';
            }
        else:
            if ($foto->update('id_foto', $idFoto)) {
                $mensagem = 'Foto atualizada com sucesso.';
            }
        endif;

        echo "<script>window.alert('$mensagem'); window.location.href='listagemFotos.php?idProduto=$idProduto';</script>";
        $foto->confirmarTransacao();

    } catch (\Throwable $th) {

        if (!empty($nomeArquivo)) {
            $imgFile->deletar($nomeArquivo);
        }
        $foto->cancelarTransacao();
        $erro = $th->getMessage();
        echo "<script>
                  window.alert('Erro: $erro.'); 
                  window.open(document.referrer, '_self');
              </script>";
    }


elseif (filter_has_var(INPUT_POST, "btnDeletar")):
    try {

        $foto->iniciarTransacao();
        $idFoto = intval(filter_input(INPUT_POST, 'idFoto'));
        $ftDel = $foto->search('id_foto', $idFoto);
        $imgFile->deletar($ftDel->nome_arquivo);

        if ($foto->delete('id_foto', $idFoto)) {
            header("location:listagemFotos.php?idProduto=$ftDel->id_produto");
        }
        $foto->confirmarTransacao();

    } catch (\Throwable $th) {
        $foto->cancelarTransacao();
        $erro = $th->getMessage();
        echo "<script>
                window.alert('Erro: " . addslashes($erro) . "');
                window.open(document.referrer,'_self');
              </script>";
    }

endif;
?>