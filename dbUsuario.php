<?php
    spl_autoload_register(function($class){
      require_once "classes/{$class}.class.php";
    });
    //Criando uma intância da classe Usuario
    $Usuario = new Usuario();
if(filter_has_var(INPUT_POST,"btnGravar")):
    $Usuario->setnome(filter_input(INPUT_POST, "nome", FILTER_SANITIZE_STRING));
    $Usuario->setemail(filter_input(INPUT_POST, "email", FILTER_SANITIZE_STRING));
    $Usuario->setsenha(filter_input(INPUT_POST, "senha", FILTER_SANITIZE_STRING));
    $Usuario->setpapel(filter_input(INPUT_POST, "papel", FILTER_SANITIZE_STRING));
    $id = filter_input(INPUT_POST, 'id');
    

    if (empty($id)):
        //Tentar adicionar e exibe a mensagem ao usuário
        if($Usuario->add()):
            echo "<script>window.alert('Cadastrado com sucesso.');windows.location.href='gerUsuario.php';</script>";
        else:
            echo "<script>window.alert('Erro ao cadastrar.');window.open(document.referrer,'_self');</script>";
        endif;
    else:
        if ($Usuario->update('id', $idUsuario)):
            echo "<script> window.alert('Raça alterada com sucesso.');window.location.href='apaProdutos.php'; </script>";
        else:
            echo "<script> window.alert('Erro ao alterar o produto.');window.open(document.referrer, '_self'); </script>";
        endif;
    endif;

elseif (filter_has_var(INPUT_POST, "btnDeletar")):
    $idUsuario = intval(filter_input(INPUT_POST, "id"));
    if ($Usuario->delete("id", $idUsuario)):
        header("location:apaUsuario.php");
    else:
        echo "<script>window.alert('Erro ao Excluir');window(document.referrer,'_self');</script>";
    endif;
endif;