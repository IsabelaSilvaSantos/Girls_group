<?php
    // Mantém a verificação de usuário
    require_once "verifica_usuario.php";
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="images/LOgoMenu.png" type="image/x-icon" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="CSS/LayoutIndexAdmin.css" />
    <title>Painel de Controle | Gestão da Página Inicial</title>
</head>

<body>
    <header>
        <?php require_once "_parts/_menuAdmin.php"; ?>
    </header>

    <div class="container my-5">
        <h1 class="mb-5 text-center text-primary">
            <i class="bi bi-house-gear-fill me-2"></i> Gestão da Página Inicial
        </h1>
        
    </div> 
    <footer>
        <?php require_once "_parts/_footer.php" ?>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
