<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/baseAdmin.css">
    <title>Raças</title>
</head>

<body>
    <header>
        <?php require_once "_parts/_menu.php"; ?>
    </header>
    <main class="container mt-3">
        <div class="mt-3">
            <h3>Produtos</h3>
        </div>
        <div class="mt-3">
            <a href="gerProduto.php" class="btn btn-success">Novo Produto</a>
        </div>
        <table class="table">
            <thead class="table-secondary">
                <tr>
                    <th>#</th>
                    <th>Produto</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                spl_autoload_register(function ($class) {
                    require_once "classes/{$class}.class.php";
                });

                $r = new Produtos();
                $produtos = $p->all();
                foreach ($produtos as $produtos):
                    ?>
                    <tr>
                        <td><?php echo $produtos->id_produtos; ?></td>
                        <td><?php echo $produtos->nome; ?></td>
                        <td class="d-flex justify-content-center gap-1">
                            <form action="<?php echo htmlspecialchars("gerProduto.php") ?>" method="post" class="d-flex">
                                <input type="hidden" name="idProduto" value="<?php echo $produtos->id_produtos ?>">
                                <button name="btnEditar" class="btn btn-primarybtn-sm" type="submit"
                                    onclick="return confirm('Tem certeza que deseja editar esse Produto?');">
                                    <i class="bi bi-pencil-square"></i>
                                </button>
                            </form>
                            <form action="<?php echo htmlspecialchars("dbProduto.php") ?>" method="post" class="d-flex">
                                <input type="hidden" name="idProduto" value="<?php echo $produto->id_produto ?>">
                                <button name="btnDeletar" class="btn btn-danger btn-sm" type="submit"
                                    onclick="return confirm('Tem certeza que deseja deletar esse Produto?');">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
    <footer>
        <?php require_once "_parts/_footer.php"; ?>
    </footer>
    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js">
    </script>
</body>

</html>