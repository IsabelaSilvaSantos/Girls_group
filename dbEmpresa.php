<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

spl_autoload_register(function ($class) {
    require_once "Classes/{$class}.class.php";
});

$Empresa = new Empresa();

if (!isset($_SESSION['id_usuario'])) {
    echo "<script>window.alert('Sessão expirada. Faça login novamente.');window.location.href='gerLogin.php';</script>";
    exit;
}
$id_do_usuario_logado = $_SESSION['id_usuario'];

if (filter_has_var(INPUT_POST, 'btnGravar')):

    $Empresa->setNome(filter_input(INPUT_POST, "nome_empresa", FILTER_DEFAULT));
    $Empresa->setEndereco(filter_input(INPUT_POST, "endereco", FILTER_DEFAULT));
    $Empresa->setEmail(filter_input(INPUT_POST, "email", FILTER_DEFAULT));
    $Empresa->setTelefone(filter_input(INPUT_POST, "telefone", FILTER_DEFAULT));
    $Empresa->setNomeFantasia(filter_input(INPUT_POST, "nome_fantasia", FILTER_DEFAULT));
    $Empresa->setRazaoSocial(filter_input(INPUT_POST, "razao_social", FILTER_DEFAULT));
    $Empresa->setCnpj(filter_input(INPUT_POST, "cnpj", FILTER_DEFAULT));
    $Empresa->sethistoria(filter_input(INPUT_POST, "historia", FILTER_DEFAULT));
    $Empresa->setapresentacao(filter_input(INPUT_POST, "apresentacao", FILTER_DEFAULT));
    $Empresa->setprincipalAtividade(filter_input(INPUT_POST, "principal_atividade", FILTER_DEFAULT));
    $id_empresa = filter_input(INPUT_POST, 'id_empresa');

    if (empty($id_empresa)):

        $Empresa->setid_usuario($id_do_usuario_logado);

        if ($Empresa->add()) {
            echo "<script>window.alert('Empresa inserida com sucesso!');window.location.href='apaEmpresa.php';</script>";
        } else {
            echo "<script>window.alert('Erro ao inserir Empresa!');window.open(document.referrer,'_self');</script>";
        }
    else:
        if ($Empresa->update('id_empresa', $id_empresa)) {
            echo "<script>window.alert('Empresa alterada com sucesso.');window.location.href='apaEmpresa.php';</script>";
        } else {
            echo "<script>window.alert('Erro ao alterar a Empresa.');window.open(document.referrer,'_self');</script>";
        }

    endif;

elseif (filter_has_var(INPUT_POST, "btnDeletar")):
    $id_empresa = intval(filter_input(INPUT_POST, "id_empresa"));
    if ($Empresa->delete("id_empresa", $id_empresa)) {
        header("location:apaEmpresa.php");
    } else {
        echo "<script>window.alert('Erro ao Excluir');window.open(document.referrer,'_self');</script>";
    }
endif;
?>
