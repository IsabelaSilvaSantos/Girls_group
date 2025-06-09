<?php

if(filter_has_var(INPUT_POST, 'btnGravar')){
   spl_autoload_register(function ($class){
   require_once "Classes/{$class}.class.php";
   });
   //Criando uma instância da classe Produto
    $Produto = new Produto();
    $Produto->setNome(filter_input(INPUT_POST, "nome", FILTER_SANITIZE_STRING));
    $Produto->setDesc(filter_input(INPUT_POST, "descricao", FILTER_SANITIZE_STRING));
    $Produto->setPreco(filter_input(INPUT_POST, "preco", FILTER_SANITIZE_STRING));
    $Produto->setUnidMed(filter_input(INPUT_POST, "unidadeMedida", FILTER_SANITIZE_STRING));

    //Tentar adicionar exibir mensagem ao usuário
    if($Produto->add()){
        echo "<script>window.alert('Produto inserido com sucesso!');window.location.href=Produtos.php;</script>";
    }else{
        echo "<script>window.alert('Erro ao inserir Produto!');window.open(document.referrer,'_self');</script>";
    }
}