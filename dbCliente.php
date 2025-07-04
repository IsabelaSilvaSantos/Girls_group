<?php
spl_autoload_register(function ($class) {
    require_once "Classes/{$class}.class.php";
});
//Criando uma instância da classe Cliente
$Cliente = new Cliente();
if (filter_has_var(INPUT_POST, 'btnGravar')):

    $Cliente->setNome(filter_input(INPUT_POST, "nome", FILTER_SANITIZE_STRING));
    $Cliente->setTel(filter_input(INPUT_POST, "telefone", FILTER_SANITIZE_STRING));
    $Cliente->setEmail(filter_input(INPUT_POST, "email", FILTER_SANITIZE_STRING));
    $Cliente->setSenha(filter_input(INPUT_POST, "senha", FILTER_SANITIZE_STRING));
    $idCliente = filter_input(INPUT_POST, 'id');

    if (empty($idCliente)):
        //Tentar adicionar exibir mensagem ao usuário
        if ($Cliente->add()) {
            echo "<script>window.alert('Cliente inserido com sucesso!');window.location.href=apaCliente.php;</script>";
        } else {
            echo "<script>window.alert('Erro ao inserir Cliente!');window.open(document.referrer,'_self');</script>";
        }
    else:
        if ($Cliente->update('id', $idCliente)) {
            echo "<script> window.alert('Cliente alterado com sucesso.');window.location.href='apaCliente.php'; </script>";
        } else {
            echo "<script> window.alert('Erro ao alterar o Cliente.');window.open(document.referrer, '_self'); </script>";
        }

    endif;

elseif (filter_has_var(INPUT_POST, "btnDeletar")):
    $idCliente = intval(filter_input(INPUT_POST, "id"));
    if ($Cliente->delete("id", $idCliente)) {
        header("location:apaCliente.php");
    } else {
        echo "<script>window.alert('Erro ao Excluir');window(document.referrer,'_self');</script>";
    }
endif;