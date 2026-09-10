<?php
require_once "verifica_admin.php";
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
        <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="CSS/layoutGer.css">
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
            require_once "Classes/{$class}.class.php";
        });

        $Usuario = new Usuario();

        if (filter_has_var(INPUT_POST, "id_usuario")):
            $id_usuario = intval(filter_input(INPUT_POST, "id_usuario"));
            $usuarioEncontrado = $Usuario->search("id_usuario", $id_usuario);

            if ($usuarioEncontrado) {
                $Usuario->setid_usuario($usuarioEncontrado->id_usuario);
                $Usuario->setnome($usuarioEncontrado->nome_usuario);
                $Usuario->setemail($usuarioEncontrado->email);
                $Usuario->setpapel($usuarioEncontrado->papel);
            }
        endif;
        ?>

        <form action="dbUsuario.php" method="post" class="row g-3 mt-1">

            <input type="hidden" name="id_usuario" value="<?= $Usuario->getid_usuario() ?? ''; ?>">
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="nome_usuario" class="form-label">Nome</label>
                    <input type="text" name="nome_usuario" id="nome_usuario" placeholder="Digite seu nome" required
                        class="form-control" value="<?= $Usuario->getnome() ?? ''; ?>">
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" placeholder="Digite seu e-mail" required
                        class="form-control" value="<?= $Usuario->getemail() ?? ''; ?>">
                </div>
            </div>

            <div class="row g-4 mt-1">
                <div class="col-md-6">
                    <label for="senha" class="form-label">Senha</label>
                    <input type="password" name="senha" id="senha"
                        placeholder="<?= $Usuario->getid_usuario() ? 'Deixe em branco para manter a atual' : 'Digite sua senha'; ?>"
                        class="form-control"
                        <?= $Usuario->getid_usuario() ? '' : 'required'; ?>>
                </div>

                <div class="col-md-6">
                    <label for="papel" class="form-label">Papel na empresa</label>
                    <select id="papel" name="papel" class="form-select" required>
                        <option value="">Selecione</option>
                        <option value="Admin"       <?= ($Usuario->getpapel() ?? '') == 'Admin'       ? 'selected' : '' ?>>Admin</option>
                        <option value="Colaborador" <?= ($Usuario->getpapel() ?? '') == 'Colaborador' ? 'selected' : '' ?>>Colaborador</option>
                    </select>
                </div>
            </div>

            <div class="col-12 mt-4">
                <button type="submit" class="btn btn-light" name="btnGravar">
                    <?= $Usuario->getid_usuario() ? 'Salvar Alterações' : 'Cadastrar'; ?>
                </button>
            </div>
        </form>
    </main>

    <footer>
        <?php require_once "_parts/_footer.php"; ?>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
