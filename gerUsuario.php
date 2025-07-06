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
    <main class="container">
        <h3>Cadastro de Usuarios</h3>
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
                <input type="text" class="form-control" id="inputNome" name="usuario
                "value="<?php print $Usuario->nome ?? null;?>">
            </div>

            <div class="mb-3 col-md-6">
                <label for="inputEmail3" class="form-label">Email</label>
                <input type="email" class="form-control" id="inputEmail3" name="email"
                value="<?php print $Usuario->email ?? null;?>">
            </div>

            <div class="mb-3 col-md-6">
                <label for="inputSenha" class="form-label">Senha</label>
                <input type="password" class="form-control" id="inputSenha" name="senha"
                value="<?php print $Usuario->senha ?? null;?>">
            </div>

            <div class="mb-3 col-md-6">
                <label for="papel" class="form-label">Papel na empresa</label>
                <select id="papel" name="papel" class="form-select" required>
                    <option value="">Selecione</option>
                    <option value="Administrador" <?= (isset($Usuario->papel) && $Usuario->papel == 'Administrador') ? 'selected' : '' ?>>Administrador</option>
                    <option value="Gerente"<?= (isset($Usuario->papel) && $Usuario->papel == 'Gerente') ? 'selected' : '' ?>>Gerente</option>
                    <option value="Técnico"<?= (isset($Usuario->papel) && $Usuario->papel == 'Técnico') ? 'selected' : '' ?>>Técnico</option>
                    <option value="Financeiro"<?= (isset($Usuario->papel) && $Usuario->papel == 'Financeiro') ? 'selected' : '' ?>>Financeiro</option>
                    <option value="Recursos Humanos"<?= (isset($Usuario->papel) && $Usuario->papel == 'Recursos Humanos') ? 'selected' : '' ?>>Recursos Humanos</option>
                </select>
            </div>

            <div class="col-12 mt-3">
                <button type="submit" class="btn btn-dark" name="btnGravar">Cadastrar</button>
            </div>
        </form>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>