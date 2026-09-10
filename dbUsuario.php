<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

spl_autoload_register(function ($class) {
    require_once "Classes/{$class}.class.php";
});

$Usuario = new Usuario();

if (filter_has_var(INPUT_POST, "btnGravar")):
    $Usuario->setnome(filter_input(INPUT_POST, "nome_usuario", FILTER_DEFAULT));
    $Usuario->setemail(filter_input(INPUT_POST, "email", FILTER_DEFAULT));
    $Usuario->setsenha(filter_input(INPUT_POST, "senha", FILTER_DEFAULT));
    $Usuario->setpapel(filter_input(INPUT_POST, "papel", FILTER_DEFAULT));
    $id_usuario = filter_input(INPUT_POST, 'id_usuario');

    if (empty($id_usuario)):
        if ($Usuario->add()) {
            echo "<script>window.alert('Cadastrado com sucesso.');window.location.href='apaUsuario.php';</script>";
        } else {
            echo "<script>window.alert('Erro ao cadastrar.');window.open(document.referrer,'_self');</script>";
        }
    else:
        if ($Usuario->update('id_usuario', $id_usuario)) {
            echo "<script>window.alert('Usuário alterado com sucesso.');window.location.href='apaUsuario.php';</script>";
        } else {
            echo "<script>window.alert('Erro ao alterar o usuário.');window.open(document.referrer,'_self');</script>";
        }
    endif;

elseif (filter_has_var(INPUT_POST, "btnDeletar")):
    $id_usuario = intval(filter_input(INPUT_POST, "id_usuario"));
    if ($Usuario->delete("id_usuario", $id_usuario)) {
        header("location:apaUsuario.php");
    } else {
        echo "<script>window.alert('Erro ao Excluir');window.open(document.referrer,'_self');</script>";
    }

elseif (filter_has_var(INPUT_POST, 'btnAltSenha')):

    if (!isset($_SESSION['id_usuario']) || empty($_SESSION['id_usuario'])) {
        echo "<script>window.alert('Erro: Usuário não identificado na sessão.');window.location.href='gerLogin.php';</script>";
        exit;
    }

    $id_usuario_logado = $_SESSION['id_usuario'];
    $Usuario->setid_usuario($id_usuario_logado);
    $senhaAtual   = filter_input(INPUT_POST, 'senhaAtual', FILTER_DEFAULT);
    $senhaNova    = filter_input(INPUT_POST, 'senha', FILTER_DEFAULT);
    $confirmaNova = filter_input(INPUT_POST, 'confirma', FILTER_DEFAULT);

    if (empty($senhaNova) || $senhaNova != $confirmaNova) {
        echo "<script>window.alert('A Nova Senha e a Confirmação devem ser iguais e não podem estar vazias.');window.open(document.referrer,'_self');</script>";
    } else {
        $Usuario->setsenha($senhaNova);
        if ($Usuario->alterarSenha($senhaAtual)) {
            echo "<script>window.alert('Senha alterada com sucesso.');window.location.href='apaUsuario.php';</script>";
        } else {
            echo "<script>window.alert('Erro ao alterar a senha. Verifique se a Senha Atual está correta.');window.open(document.referrer,'_self');</script>";
        }
    }

elseif (filter_has_var(INPUT_POST, 'btnAltEmail')):

    $Usuario->setnome(filter_input(INPUT_POST, 'nome', FILTER_DEFAULT));
    $Usuario->setsenha(filter_input(INPUT_POST, 'senha', FILTER_DEFAULT));
    $Usuario->setemail(filter_input(INPUT_POST, 'email', FILTER_DEFAULT));

    $resultado = $Usuario->atualiza_email();

    if ($resultado === true) {
        echo "<script>window.alert('E-mail alterado com sucesso.');window.location.href='apaUsuario.php';</script>";
    } else {
        $msg = addslashes($resultado);
        echo "<script>window.alert('{$msg}');window.open(document.referrer,'_self');</script>";
    }
endif;
?>
