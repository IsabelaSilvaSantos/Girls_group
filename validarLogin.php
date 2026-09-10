<?php
ob_start();

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$destino = filter_input(INPUT_GET, 'redirect', FILTER_SANITIZE_URL);
$destino = !empty($destino) ? $destino : 'IdexAdmin.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $usuario = trim(filter_input(INPUT_POST, 'nome', FILTER_DEFAULT) ?? '');
    $senha   = trim(filter_input(INPUT_POST, 'senha', FILTER_DEFAULT) ?? '');

    if (empty($usuario) || empty($senha)) {
        $_SESSION['login_erro'] = 'Preencha o usuário e a senha.';
        header('Location: gerLogin.php');
        ob_end_flush();
        exit;
    }

    spl_autoload_register(function ($class): void {
        require_once "Classes/{$class}.class.php";
    });

    $login = new Usuario();
    $dados = $login->buscarUsuario($usuario);

    if ($dados) {
        if (password_verify($senha, $dados->senha)) {
            $_SESSION['id_usuario']   = $dados->id_usuario;
            $_SESSION['nome_usuario'] = $dados->nome_usuario;
            $_SESSION['papel']        = $dados->papel;

            header("Location: {$destino}");
            exit();
        } else {
            $_SESSION['login_erro'] = 'Senha incorreta. Tente novamente.';
            header('Location: gerLogin.php');
            exit();
        }
    } else {
        $_SESSION['login_erro'] = 'Usuário não encontrado.';
        header('Location: gerLogin.php');
        exit();
    }
} else {
    header("Location: gerLogin.php");
    exit;
}

ob_end_flush();
?>
