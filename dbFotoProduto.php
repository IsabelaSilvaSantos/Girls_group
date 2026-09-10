<?php

spl_autoload_register(function ($class) {
    require_once "Classes/{$class}.class.php";
});

$foto    = new FotoProduto();
$imgFile = new Imagem(prefixo: "prod_");
$nomeArquivo = '';

if (filter_has_var(INPUT_POST, "btnGravar")):
    $foto->iniciarTransacao();
    try {
        $idFoto    = filter_input(INPUT_POST, 'idFoto',    FILTER_VALIDATE_INT);
        $idProduto = filter_input(INPUT_POST, 'idProduto', FILTER_VALIDATE_INT);
        $fotoAntiga = filter_input(INPUT_POST, 'fotoAntiga', FILTER_DEFAULT);

        $foto->setIdProduto($idProduto);
        $foto->setNomeArquivo($fotoAntiga);

        if (!empty($_FILES['foto']['name'])) {
            $nomeArquivo = $imgFile->upload($_FILES['foto']);
            $foto->setNomeArquivo($nomeArquivo);

            if (!empty($fotoAntiga)) {
                $imgFile->deletar($fotoAntiga);
            }
        }

        $foto->setLegenda(filter_input(INPUT_POST, 'legenda', FILTER_DEFAULT));
        $foto->setTextoAlternativo(filter_input(INPUT_POST, 'textoAlt', FILTER_DEFAULT));

        if (empty($idFoto)):
            $sucesso = $foto->add();
            $mensagem = $sucesso ? 'Foto adicionada com sucesso!' : 'Erro ao adicionar foto.';
        else:
            $sucesso = $foto->update('id_foto', $idFoto);
            $mensagem = $sucesso ? 'Foto atualizada com sucesso.' : 'Erro ao atualizar foto.';
        endif;

        $mensagemSafe = addslashes($mensagem);
        echo "<script>window.alert('{$mensagemSafe}'); window.location.href='listagemFotos.php?idProduto={$idProduto}';</script>";
        $foto->confirmarTransacao();

    } catch (\Throwable $th) {
        if (!empty($nomeArquivo)) {
            $imgFile->deletar($nomeArquivo);
        }
        $foto->cancelarTransacao();
        $erro = addslashes($th->getMessage());
        echo "<script>window.alert('Erro: {$erro}'); window.open(document.referrer, '_self');</script>";
    }

elseif (filter_has_var(INPUT_POST, "btnDeletar")):
    try {
        $foto->iniciarTransacao();
        $idFoto = intval(filter_input(INPUT_POST, 'idFoto'));
        $ftDel  = $foto->search('id_foto', $idFoto);

        if ($ftDel) {
            $imgFile->deletar($ftDel->nome_arquivo);
        }

        if ($foto->delete('id_foto', $idFoto)) {
            $foto->confirmarTransacao();
            header("location:listagemFotos.php?idProduto=" . intval($ftDel->id_produto ?? 0));
            exit;
        }
        $foto->confirmarTransacao();

    } catch (\Throwable $th) {
        $foto->cancelarTransacao();
        $erro = addslashes($th->getMessage());
        echo "<script>window.alert('Erro: {$erro}'); window.open(document.referrer,'_self');</script>";
    }

endif;
?>
