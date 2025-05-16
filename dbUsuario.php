<?php

if(filter_has_var(INPUT_POST,"btnGravar")) {
    spl_autoload_register(function ($class){
        require_once "classes/{$class}.class.php";
    });

    //Criando uma instância da classe Raça
    $raca = new Raca();
    $raca->setNome(filter_input(INPUT_POST,"raca", 
    FILTER_SANITIZE_STRING));

    //Tenta adicionar e exibe a mensagemao usuário
    if($raca->add()){
        echo"<script>window.alert('Raça adicionada com sucesso.');window.
        location.href=racas.php;</script>";
    }else{
        echo "<script>window.alert('Erro ao adicionar Raça.');window.
        open(document.referrer,'_self');</script>";
    }
}