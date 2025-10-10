<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
 
if (!isset($_SESSION['id_usuario'])) { 
    $redirect = basename($_SERVER['SCRIPT_NAME'], '.php');
    header("Location: gerLogin.php?redirect=$redirect.php");
    exit;
}
?>