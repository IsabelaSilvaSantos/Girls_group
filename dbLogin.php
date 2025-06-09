<?php
if(filter_has_var(INPUT_POST,"btnGravar")){
    spl_autoload_register(function($class){
      require_once "classes/{$class}.class.php";
    });
    //Criando uma intância da classe Usuario
    $Login = new Login();
    $Login->setusuario(filter_input(INPUT_POST, "usuario", FILTER_SANITIZE_STRING));
    $Login->setsenha(filter_input(INPUT_POST, "senha", FILTER_SANITIZE_STRING));
    
    //Tentar adicionar e exibe a mensagem ao usuário
    if($Login->add()){
        echo "<script>window.alert('Login efetuado com sucesso.');windows.location.href=gerLogin.php;</script>";
    }else{
        echo "<script>window.alert('Erro ao efetuar login.');window.open(document.referrer,'_self');</script>";
    }
}