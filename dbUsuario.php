<?php
if(filter_has_var(INPUT_POST,"btnGravar")){
    spl_autoload_register(function($class){
      require_once "classes/{$class}.class.php";
    });
    //Criando uma intância da classe Usuario
    $Usuario = new Usuario();
    $Usuario->setnome(filter_input(INPUT_POST, "usuario", FILTER_SANITIZE_STRING));
    $Usuario->setemail(filter_input(INPUT_POST, "email", FILTER_SANITIZE_STRING));
    $Usuario->setpapel(filter_input(INPUT_POST, "senha", FILTER_SANITIZE_STRING));
    $Usuario->setsenha(filter_input(INPUT_POST, "papel", FILTER_SANITIZE_STRING));
    
    //Tentar adicionar e exibe a mensagem ao usuário
    if($Usuario->add()){
        echo "<script>window.alert('Cadastrado com sucesso.');windows.location.href=gerUsuario.php;</script>";
    }else{
        echo "<script>window.alert('Erro ao cadastrar.');window.open(document.referrer,'_self');</script>";
    }
}