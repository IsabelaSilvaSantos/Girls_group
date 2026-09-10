<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$login_erro = $_SESSION['login_erro'] ?? '';
unset($_SESSION['login_erro']);
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/Logo.png" type="image/x-icon" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="CSS/layoutGer.css">
    <title>Tela de Login</title>
</head>

<body>
    <header>
        <?php require_once "_parts/_menuLogin.php"; ?>
    </header>

    <main class="container mt-5">
        <h3 class="text-center">Login</h3>

        <form action="validarLogin.php" method="post" class="row g-4 mt-1">
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="nome" class="form-label">Usuário</label>
                    <input type="text" name="nome" id="nome" placeholder="Digite o usuário" required
                        class="form-control <?php echo $login_erro ? 'is-invalid' : ''; ?>">
                </div>
                <div class="col-md-6">
                    <label for="senha" class="form-label">Senha</label>
                    <input type="password" name="senha" id="senha" placeholder="Digite a senha" required
                        class="form-control">
                </div>
            </div>

            <?php if ($login_erro): ?>
            <div class="col-12 mt-2">
                <div class="alert alert-danger py-2" role="alert">
                    <i class="bi bi-exclamation-circle me-1"></i>
                    <?php echo htmlspecialchars($login_erro); ?>
                </div>
            </div>
            <?php endif; ?>

            <div class="col-12 mt-4 button-container">
                <button type="submit" class="btn btn-light" name="btnGravar">Efetuar Login</button>
            </div>
        </form>
    </main>

    <footer>
        <?php require_once "_parts/_footer.php"; ?>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
