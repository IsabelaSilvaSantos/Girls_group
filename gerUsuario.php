<?php
require_once "verifica_usuario.php";
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
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
            require_once "classes/{$class}.class.php";
        });

        $Usuario = new Usuario();

        if (filter_has_var(INPUT_POST, "id_usuario")):
            $edtUsuario = new Usuario();
            $id_usuario = intval(filter_input(INPUT_POST, "id_usuario"));
            $usuarioEncontrado = $edtUsuario->search("id_usuario", $id_usuario);

            if ($usuarioEncontrado) {
                $Usuario->setid_usuario($usuarioEncontrado->id_usuario);
                $Usuario->setnome($usuarioEncontrado->nome_usuario);
                $Usuario->setemail($usuarioEncontrado->email);
                $Usuario->setpapel($usuarioEncontrado->papel);
            }

        endif;

        ?>
        <form action="dbUsuario.php" method="post" class="row g3 mt-1">

            <input type="hidden" name="id_usuario" value="<?= $Usuario->getid_usuario() ?? ''; ?>">
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="nome_usuario" class="form-label">Nome</label>
                    <input type="text" name="nome_usuario" id="nome_usuario" placeholder="Digite seu nome" required
                        class="form-control" value="<?= $Usuario->getnome() ?? ''; ?>">
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" name="email" id="email" placeholder="Digite seu e-mail" required
                        class="form-control" value="<?= $Usuario->getemail() ?? ''; ?>">
                </div>
            </div>

            <div class="row g-4 mt-1">
                <div class="col-md-6">
                    <label for="senha" class="form-label">Senha</label>
                    <input type="password" name="senha" id="senha" placeholder="Digite sua senha" class="form-control">
                </div>

                <div class="col-md-6">
                    <label for="papel" class="form-label">Papel na empresa</label>
                    <select id="papel" name="papel" class="form-select" required>
                        <option value="">Selecione</option>
                        <option value="Administrador" <?= ($Usuario->getpapel() ?? '') == 'Administrador' ? 'selected' : '' ?>>
                            Administrador</option>
                        <option value="Gerente" <?= ($Usuario->getpapel() ?? '') == 'Gerente' ? 'selected' : '' ?>>Gerente
                        </option>
                        <option value="Tecnico" <?= ($Usuario->getpapel() ?? '') == 'Tecnico' ? 'selected' : '' ?>>Técnico
                        </option>
                        <option value="Financeiro" <?= ($Usuario->getpapel() ?? '') == 'Financeiro' ? 'selected' : '' ?>>
                            Financeiro</option>
                        <option value="Recursos Humanos" <?= ($Usuario->getpapel() ?? '') == 'Recursos Humanos' ? 'selected' : '' ?>>Recursos Humanos</option>
                    </select>
                </div>
            </div>

            <div class="col-12 mt-4">
                <button type="submit" class="btn btn-light" name="btnGravar">Cadastrar</button>
            </div>
        </form>
    </main>

    <footer>
        <?php require_once "_parts/_footer.php"; ?>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>