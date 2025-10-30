<?php
spl_autoload_register(function ($class) {
    require_once "classes/{$class}.class.php";
});

$Categoria = new Categoria();

if (filter_has_var(INPUT_POST, 'btnGravar')):

    $Categoria->setNome_categoria(filter_input(INPUT_POST, "nome_categoria", FILTER_SANITIZE_STRING));
    $id_categoria = filter_input(INPUT_POST, 'id_categoria', FILTER_VALIDATE_INT);

    if (!$id_categoria):

        if ($Categoria->add()) {
            echo "<script>window.alert('Categoria inserida com sucesso!');window.location.href='apaCategoria.php';</script>";
        } else {
            echo "<script>window.alert('Erro ao inserir Categoria!');window.open(document.referrer,'_self');</script>";
        }

    else:
       
        if ($Categoria->update('id_categoria', $id_categoria)) {
            echo "<script> window.alert('Categoria alterada com sucesso.');window.location.href='apaCategoria.php'; </script>";
        } else {
            echo "<script> window.alert('Erro ao alterar a categoria.');window.open(document.referrer, '_self'); </script>";
        }

    endif;

elseif (filter_has_var(INPUT_POST, "btnDeletar")):
    
    $id_categoria = intval(filter_input(INPUT_POST, "id_categoria"));
    
    if ($Categoria->delete("id_categoria", $id_categoria)) {
        header("location:apaCategoria.php");
    } else {
        echo "<script>window.alert('Erro ao Excluir');window.open(document.referrer,'_self');</script>";
    }
    
endif;