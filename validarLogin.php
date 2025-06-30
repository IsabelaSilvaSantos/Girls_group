<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$usuario= filter_input(type: INPUT_POST, var_name: 'nome', filter: FILTER_SANITIZE_STRING);
$senha = filter_input(type: INPUT_POST, var_name: 'Senha', filter: FILTER_SANITIZE_STRING);

spl_autoload_register(callback: function ($class): void {
require_once "Classes/{$class}.class.php";
});
$login = new Usuario();
$dados = $login->buscarUsuario($usuario);

if ($dados) {
if (password_verify(password: $senha, hash: $dados->senha)) {
$_SESSION['nome'] = $dados->nome;
$_SESSION['id'] = $dados->id;
header('Location: index.php');
exit();
} else {
        echo "<script>alert('Senha incorreta'); window.history.back();</script>";
    }
} else {
    echo "<script>alert('Usuário não encontrado'); window.history.back();</script>";
}
} else {
    header(header: "Location: index.php");
    exit;
}
?>
