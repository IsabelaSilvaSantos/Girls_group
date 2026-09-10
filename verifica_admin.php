<?php
require_once "verifica_usuario.php";

if (($_SESSION['papel'] ?? '') !== 'Admin') {
    header("Location: IdexAdmin.php?acesso=negado");
    exit;
}
