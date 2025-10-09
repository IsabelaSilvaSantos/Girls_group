<?php
ob_start();

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$destino = filter_input(INPUT_GET, 'redirect', FILTER_SANITIZE_URL);
$destino = !empty($destino) ? $destino : 'IdexAdmin.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $usuario = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

    spl_autoload_register(function ($class): void {
        require_once "Classes/{$class}.class.php";
    });

    $login = new Usuario();

    $dados = $login->buscarUsuario($usuario);

    if ($dados) {
        if (password_verify($senha, $dados->senha)) {

            $_SESSION['user_id'] = $dados->id_usuario;
            $_SESSION['nome_usuario'] = $dados->nome_usuario;

            session_write_close();

            header("Location: {$destino}");
            exit();

        } else {

            echo "<script>console.error('Senha incorreta.'); window.history.back();</script>";
        }
    } else {

        echo "<script>console.error('Usuário não encontrado.'); window.history.back();</script>";
    }
} else {

    header("Location: gerLogin.php");
    exit;
}

ob_end_flush();
?>