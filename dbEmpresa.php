<?php

if (filter_has_var(INPUT_POST,'button')){
    spl_autoload_register(function ($class){
        require_once "Classes/{$class}.class.php";
    });

    //Criando uma instância da Classe Raça
    $Empresa = new Empresa();
    $Empresa->setNome(filter_input(INPUT_POST, "nome", FILTER_SANITIZE_STRING));
    $Empresa->setendereco(filter_input(INPUT_POST, "endereco", FILTER_SANITIZE_STRING));
    $Empresa->setemail(filter_input(INPUT_POST, "email", FILTER_SANITIZE_STRING));
    $Empresa->settelefone(filter_input(INPUT_POST, "telefone", FILTER_SANITIZE_STRING));
    $Empresa->setnomeFantasia(filter_input(INPUT_POST, "nomeFantasia", FILTER_SANITIZE_STRING));
    $Empresa->setrazaoSocial(filter_input(INPUT_POST, "razaoSocial", FILTER_SANITIZE_STRING));
    $Empresa->setcnpj(filter_input(INPUT_POST, "cnpj", FILTER_SANITIZE_STRING));
    $Empresa->setprincipalAtividade(filter_input(INPUT_POST, "principalAtividade", FILTER_SANITIZE_STRING));
    $Empresa->sethitoria(filter_input(INPUT_POST, "hitoria", FILTER_SANITIZE_STRING));
    $Empresa->setapresentacao(filter_input(INPUT_POST, "apresentacao", FILTER_SANITIZE_STRING));

    //Tenta adicionar e exibe a mensagem aousuário 
    if($Empresa->add()){
        echo"<script>window.alert('Cadastro da empresa adicionados com sucesso!');window.location.href=Empresa.php;</script>";
    }else{
        echo "<script>window.alert('Erro ao adicionar dados das empresa!');window.open(document.referrer,'_self');</script>";
    }
    }