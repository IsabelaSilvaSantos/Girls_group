<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="CSS/layout.css">
    <title>Tela de Login</title>
</head>

<body>
    <header>
        <?php require_once "_parts/_menuLogin.php"; ?>
    </header>

    <main class="container mt-5">
        <h3 class="text-center">Login</h3>
        <?php
        spl_autoload_register(function ($class) {
            require_once "classes/{$class}.class.php";
        });
        if (filter_has_var(INPUT_POST, "id")):
            $edtUsuario = new Usuario();
            $id = intval(filter_input(INPUT_POST, "id"));
            $Usuario = $edtUsuario->search("id", $id);

        endif;
        ?>

        <form action="validarLogin.php" method="post" class="row g-4 mt-2">
            <input type="hidden" value="<?php echo $Usuario->id ?? null; ?>" name="id">
            <div class="row g-4">
                <div class="col-md-6">
                    <label for="nome" class="form-label">Usuário</label>
                    <input type="text" name="nome" id="nome" placeholder="Digite o usuário" required
                        class="form-control" value="<?php print $Usuario->nome ?? null; ?>">
                </div>
                <div class="col-md-6">
                    <label for="senha" class="form-label">Senha</label>
                    <input type="password" name="senha" id="senha" placeholder="Digite a senha" required
                        class="form-control" value="<?php print $Usuario->senha ?? null; ?>">
                </div>
            </div>

            <div class="col-12 mt-4">
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