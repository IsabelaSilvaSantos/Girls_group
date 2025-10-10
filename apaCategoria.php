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
    <link rel="stylesheet" href="CSS/layoutApa.css">
    <title>Categorias</title>
</head>

<body>
    <header>
        <?php require_once "_parts/_menuAdmin.php"; ?>
    </header>

    <main class="container mt-5">
        <div class="mt-3">
            <h3>Categorias</h3>
        </div>
        <div class="mt-3 mb-4">
            <a href="gerCategoria.php" class="btn btn-outline-primary">Nova Categoria</a>
        </div>
        <table class="table">
            <thead class="table-secondary">
                <tr>
                    <th>#ID</th>
                    <th>Categorias</th>
                    <th class="text-center">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                spl_autoload_register(function ($class) {
                    require_once "classes/{$class}.class.php";
                });

                $c = new Categoria();
                $categorias = $c->all();

                if (!is_array($categorias)) {
                    $categorias = [];
                }

                foreach ($categorias as $Categoria):
                    ?>
                    <tr>
                        <td><?php echo $Categoria->id_categoria ?></td>
                        <td><?php echo $Categoria->nome_categoria ?></td>

                        <td class="d-flex gap-2 justify-content-center">

                            <form action="<?php echo htmlspecialchars("gerCategoria.php") ?>" method="post">
                                <input type="hidden" name="id_categoria" value="<?php echo $Categoria->id_categoria ?>">
                                <button name="btnEditar" class="btn-action-sm-custom" type="submit"
                                    onclick="return confirm('Tem certeza que deseja editar esta categoria?');">
                                    <i class="bi bi-pencil-square text-rosa-escuro"></i>
                                </button>
                            </form>

                            <form action="<?php echo htmlspecialchars("dbCategoria.php") ?>" method="post">
                                <input type="hidden" name="id_categoria" value="<?php echo $Categoria->id_categoria ?>">
                                <button name="btnDeletar" class="btn-action-sm-custom" type="submit"
                                    onclick="return confirm('Tem certeza que deseja deletar esta categoria?');">
                                    <i class="bi bi-trash text-rosa-escuro"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </main>

    <footer>
        <?php require_once "_parts/_footer.php" ?>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js">
    </script>
</body>

</html>