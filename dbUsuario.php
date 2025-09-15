<?php
spl_autoload_register(function ($class) {
    require_once "classes/{$class}.class.php";
});
//Criando uma intância da classe Usuario
$Usuario = new Usuario();
if (filter_has_var(INPUT_POST, "btnGravar")):
    $Usuario->setnome(filter_input(INPUT_POST, "nome_usuario", FILTER_SANITIZE_STRING));
    $Usuario->setemail(filter_input(INPUT_POST, "email", FILTER_SANITIZE_STRING));
    $Usuario->setsenha(filter_input(INPUT_POST, "senha", FILTER_SANITIZE_STRING));
    $Usuario->setpapel(filter_input(INPUT_POST, "papel", FILTER_SANITIZE_STRING));
    $id_usuario = filter_input(INPUT_POST, 'id_usuario');


    if (empty($id_usuario)):
        //Tentar adicionar e exibe a mensagem ao usuário
        if ($Usuario->add()) {
            echo "<script>window.alert('Cadastrado com sucesso.');window.location.href='apaUsuario.php';</script>";
        } else {
            echo "<script>window.alert('Erro ao cadastrar.');window.open(document.referrer,'_self');</script>";
        }
    else:
        if ($Usuario->update('id_usuario', $id_usuario)) {
            echo "<script> window.alert('Usuário alterado com sucesso.');window.location.href='apaUsuario.php'; </script>";
        } else {
            echo "<script> window.alert('Erro ao alterar o usuário.');window.open(document.referrer, '_self'); </script>";
        }

    endif;

elseif (filter_has_var(INPUT_POST, "btnDeletar")):
    $id_usuario = intval(filter_input(INPUT_POST, "id_usuario"));
    if ($Usuario->delete("id_usuario", $id_usuario)) {
        header("location:apaUsuario.php");
    } else {
        echo "<script>window.alert('Erro ao Excluir');window(document.referrer,'_self');</script>";
    }
endif;