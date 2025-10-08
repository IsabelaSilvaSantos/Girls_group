<?php
// C:\xampp\htdocs\Girls_group\dbFotoProduto.php

// Inclui o autoloader CORRIGIDO
// Isso garante que classes como FotoProduto, Imagem, CRUD, e outras sejam carregadas
spl_autoload_register(function ($class) {
    // ESTE É O CAMINHO CORRETO PARA SUAS CLASSES
    require_once "Classes/{$class}.class.php";
});

// 1. Instâncias
$foto = new FotoProduto();
// Reutiliza a classe Imagem, definindo um prefixo para o nome do arquivo
$imgFile = new Imagem(prefixo: "prod_"); 
$nomeArquivo = ''; // Variável de controle para o nome do arquivo, usada no catch

if (filter_has_var(INPUT_POST, "btnGravar")):
    
    // Assumindo que sua classe CRUD tem iniciarTransacao()
    $foto->iniciarTransacao(); 
    try {
        $idFoto = filter_input(INPUT_POST, 'idFoto', FILTER_VALIDATE_INT);
        $idProduto = filter_input(INPUT_POST, 'idProduto', FILTER_VALIDATE_INT);
        $fotoAntiga = filter_input(INPUT_POST, 'fotoAntiga');
        
        // 2. Seta o ID do Produto
        $foto->setIdProduto($idProduto); 
        $foto->setNomeArquivo($fotoAntiga); // Mantém o nome antigo por padrão

        // 3. Processamento da Nova Imagem
        if (!empty($_FILES['foto']['name'])) {
            $nomeArquivo = $imgFile->upload($_FILES['foto']); // Faz o upload
            $foto->setNomeArquivo($nomeArquivo); // Seta o novo nome do arquivo
            
            // Se estiver em modo de edição e houver foto antiga, deleta a antiga
            if (!empty($fotoAntiga)) {
                $imgFile->deletar($fotoAntiga);
            }
        }

        // 4. Seta Metadados
        $foto->setLegenda(filter_input(INPUT_POST, 'legenda'));
        $foto->setTextoAlternativo(filter_input(INPUT_POST, 'textoAlt'));

        // 5. Lógica de Adição ou Edição
        if (empty($idFoto)):
            if ($foto->add()) {
                $mensagem = 'Foto adicionada com sucesso!';
            } else {
                $mensagem = 'Erro ao adicionar foto.';
            }
        else:
            if ($foto->update('id_foto', $idFoto)) { // Atualiza a foto existente
                $mensagem = 'Foto atualizada com sucesso.';
            }
        endif;

        // Redireciona de volta para a listagem/gerenciamento de fotos do produto
        echo "<script>window.alert('$mensagem'); window.location.href='listagemFotos.php?idProduto=$idProduto';</script>";
        $foto->confirmarTransacao();
        
    } catch (\Throwable $th) {
        // Em caso de erro, desfaz o DB e o upload
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

// Lógica de Deletar
elseif (filter_has_var(INPUT_POST, "btnDeletar")):
    try {
        // Assumindo que sua classe CRUD tem iniciarTransacao()
        $foto->iniciarTransacao();
        $idFoto = intval(filter_input(INPUT_POST, 'idFoto'));
        
        // Busca o objeto para pegar o caminho do arquivo e o id_produto
        $ftDel = $foto->search('id_foto', $idFoto); 
        
        $imgFile->deletar($ftDel->nome_arquivo); 
        
        if ($foto->delete('id_foto', $idFoto)) {
            // Redireciona para a listagem de fotos daquele produto
            header("location:listagemFotos.php?idProduto=$ftDel->id_produto"); 
        }
        $foto->confirmarTransacao();
        
    } catch (\Throwable $th) {
        $foto->cancelarTransacao();
        $erro = $th->getMessage();
        echo "<script>
                window.alert('Erro: ".addslashes($erro)."');
                window.open(document.referrer,'_self');
              </script>";
    }

endif; 
?>