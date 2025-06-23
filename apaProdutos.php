<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/baseAdmin.css">
    <title>Produtos</title>
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
            <a href="gerProduto.php" class="btn btn-outline-secondary">Novo Produto</a>
        </div>
         <a href="">ㅤ</a>
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

                $p = new Produto();
                $produtos = $p->findAll(); 

                foreach ($produtos as $produto):
                ?>
                    <tr>
                        <td><?php echo $produto['id']; ?></td>
                        <td><?php echo $produto['nome']; ?></td>
                        <td class="d-flex justify-content-center gap-1">
                            <form action="gerProduto.php" method="post" class="d-flex">
                                <input type="hidden" name="idProduto" value="<?php echo $produto['id']; ?>">
                                <button name="btnEditar" class="btn btn-outline-primary btn-sm" type="submit"
                                    onclick="return confirm('Tem certeza que deseja editar esse Produto?');">
                                    <i class="bi bi-pencil-square"></i> 
                                </button>
                            </form>
                            <form action="dbProduto.php" method="post" class="d-flex">
                                <input type="hidden" name="idProduto" value="<?php echo $produto['id']; ?>">
                                <button name="btnDeletar" class="btn btn-outline-danger btn-sm" type="submit"
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>