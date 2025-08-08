<?php
spl_autoload_register(function ($class) {
    require_once "Classes/{$class}.class.php";
});
//Criando uma instância da classe Produto
$Produto = new Produto();
if (filter_has_var(INPUT_POST, 'btnGravar')):

    $Produto->setNome(filter_input(INPUT_POST, "nome", FILTER_SANITIZE_STRING));
    $Produto->setDesc(filter_input(INPUT_POST, "descricao", FILTER_SANITIZE_STRING));
    $Produto->setPreco(filter_input(INPUT_POST, "preco", FILTER_SANITIZE_STRING));
    $Produto->setUnidMed(filter_input(INPUT_POST, "unidadeMedida", FILTER_SANITIZE_STRING));
    $idProduto = filter_input(INPUT_POST, 'id');

    if (empty($idProduto)):
        //Tentar adicionar exibir mensagem ao usuário
        if ($Produto->add()) {
            echo "<script>window.alert('Produto inserido com sucesso!');window.location.href='apaProdutos.php';</script>";
        } else {
            echo "<script>window.alert('Erro ao inserir Produto!');window.open(document.referrer,'_self');</script>";
        }
    else:
        if ($Produto->update('id', $idProduto)) {
            echo "<script> window.alert('Produto alterado com sucesso.');window.location.href='apaProdutos.php'; </script>";
        } else {
            echo "<script> window.alert('Erro ao alterar o produto.');window.open(document.referrer, '_self'); </script>";
        }

    endif;

elseif (filter_has_var(INPUT_POST, "btnDeletar")):
    $idProduto = intval(filter_input(INPUT_POST, "id"));
    if ($Produto->delete("id", $idProduto)) {
        header("location:apaProdutos.php");
    } else {
        echo "<script>window.alert('Erro ao Excluir');window(document.referrer,'_self');</script>";
    }
endif;