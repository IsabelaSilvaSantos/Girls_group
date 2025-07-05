<?php
spl_autoload_register(function ($class) {
    require_once "Classes/{$class}.class.php";
});
//Criando uma instância da classe Produto
$Empresa = new Empresa();
if (filter_has_var(INPUT_POST, 'btnGravar')):

    $Empresa->setNome(filter_input(INPUT_POST, "nome", FILTER_SANITIZE_STRING));
    $Empresa->setEndereco(filter_input(INPUT_POST, "endereco", FILTER_SANITIZE_STRING));
    $Empresa->setEmail(filter_input(INPUT_POST, "email", FILTER_SANITIZE_STRING));
    $Empresa->setTelefone(filter_input(INPUT_POST, "telefone", FILTER_SANITIZE_STRING));
    $Empresa->setNomeFantasia(filter_input(INPUT_POST, "NomeFantasia", FILTER_SANITIZE_STRING));
    $Empresa->setRazaoSocial(filter_input(INPUT_POST, "RazaoSocial", FILTER_SANITIZE_STRING));
    $Empresa->setCnpj(filter_input(INPUT_POST, "cnpj", FILTER_SANITIZE_STRING));
    $Empresa->sethistoria(filter_input(INPUT_POST, "historia", FILTER_SANITIZE_STRING));
    $Empresa->setapresentacao(filter_input(INPUT_POST, "apresentacao", FILTER_SANITIZE_STRING));
    $Empresa->setprincipalAtividade(filter_input(INPUT_POST, "principalAtividade", FILTER_SANITIZE_STRING));
    $idEmpresa = filter_input(INPUT_POST, 'id');

    if (empty($idEmpresa)):
        //Tentar adicionar exibir mensagem ao usuário
        if ($Empresa->add()) {
            echo "<script>window.alert('Empresa inserido com sucesso!');window.location.href=apaEmpresa.php;</script>";
        } else {
            echo "<script>window.alert('Erro ao inserir Empresa!');window.open(document.referrer,'_self');</script>";
        }
    else:
        if ($Empresa->update('id', $idEmpresa)) {
            echo "<script> window.alert('Empresa alterada com sucesso.');window.location.href='apaEmpresa.php'; </script>";
        } else {
            echo "<script> window.alert('Erro ao alterar a Empresa.');window.open(document.referrer, '_self'); </script>";
        }

    endif;

elseif (filter_has_var(INPUT_POST, "btnDeletar")):
    $idEmpresa = intval(filter_input(INPUT_POST, "id"));
    if ($Empresa->delete("id", $idEmpresa)) {
        header("location:apaEmpresa.php");
    } else {
        echo "<script>window.alert('Erro ao Excluir');window(document.referrer,'_self');</script>";
    }
endif;