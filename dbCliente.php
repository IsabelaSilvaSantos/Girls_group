<?php

if(filter_has_var(INPUT_POST, 'btnGravar')){
   spl_autoload_register(function ($class){
   require_once "Classes/{$class}.class.php";
   });
   //Criando uma instância da classe Cliente
    $Cliente = new Cliente();
    $Cliente->setNome(filter_input(INPUT_POST, "cliente", FILTER_SANITIZE_STRING));
    $Cliente->setTelefone(filter_input(INPUT_POST, "cliente", FILTER_SANITIZE_STRING));
    $Cliente->setEmail(filter_input(INPUT_POST, "cliente", FILTER_SANITIZE_STRING));
    $Cliente->setSenha(filter_input(INPUT_POST, "cliente", FILTER_SANITIZE_STRING));

    //Tentar adicionar exibir mensagem ao usuário
    if($Cliente->add()){
        echo "<script>window.alert('Cliente inserido com sucesso!');window.location.href=racas.php;</script>";
    }else{
        echo "<script>window.alert('Erro ao inserir Cliente!');window.open(document.referrer,'_self');</script>";
    }
}