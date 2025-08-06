<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/layoutAmanda.css">
    <title>Cadastro de Usuário</title>
</head>

<body>
    <header>
        <?php require_once "_parts/_menuAdmin.php"; ?>
    </header>

    <main class="container mt-5">

    <h3 class="text-center">Cadastro do usuário</h3>
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
        <form action="dbUsuario.php" method="post">
            <input type="hidden" value="<?php echo $Usuario->id ?? null; ?>" name="id">
            <div class="mb-3 col-md-6">
                <label for="inputNome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="inputNome" name="usuario">
            </div>

            <div class="mb-3 col-md-6">
                <label for="inputEmail3" class="form-label">Email</label>
                <input type="email" class="form-control" id="inputEmail3" name="email">
            </div>

            <div class="mb-3 col-md-6">
                <label for="inputSenha" class="form-label">Senha</label>
                <input type="password" class="form-control" id="inputSenha" name="senha">
            </div>

            <div class="mb-3 col-md-6">
                <label for="papel" class="form-label">Papel na empresa</label>
                <select id="papel" name="papel" class="form-select" required>
                    <option value="">Selecione</option>
                    <option value="Administrador">Administrador</option>
                    <option value="Gerente">Gerente</option>
                    <option value="Técnico">Técnico</option>
                    <option value="Financeiro">Financeiro</option>
                    <option value="Recursos Humanos">Recursos Humanos</option>
                </select>
            </div>

            <div class="col-12 mt-3">
                <button type="submit" class="btn btn-dark" name="btnGravar">Cadastrar</button>
            </div>
        </form>
    </main>

    <footer>
        <?php require_once "_parts/_footer.php"; ?>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>