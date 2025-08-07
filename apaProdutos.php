<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="CSS/layoutProduto.css">
    <title>Produtos</title>
</head>

<body> 
    <header>
        <?php require_once "_parts/_menuAdmin.php"; ?>
    </header>

    <main class="container mt-5">
        <div class="mt-3">
            <h3>Produtos</h3>
        </div>
        <div class="mt-3 mb-4">
            <a href="gerProduto.php" class="btn btn-outline-secondary">Novo Produto</a>
        </div>
        <table class="table">
            <thead class="table-secondary">
                <tr>
                    <th>#</th>
                    <th>Produtos</th>
                    <th class="text-center">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                spl_autoload_register(function ($class) {
                    require_once "classes/{$class}.class.php";
                });

                $p = new Produto();
                $produto = $p->all();
                foreach ($produto as $Produto):
                    ?>
                    <tr>
                        <td><?php echo $Produto->id?></td>
                        <td><?php echo $Produto->nome?></td>
                        
                        <td class="d-flex gap-2 justify-content-center">
    <form action="<?php echo htmlspecialchars("gerProduto.php") ?>" method="post">
        <input type="hidden" name="id" value="<?php echo $Produto->id ?>">
        <button name="btnEditar" class="btn btn-outline-primary btn-sm" type="submit"
            onclick="return confirm('Tem certeza que deseja editar esse produto?');">
            <i class="bi bi-pencil-square"></i>
        </button>
    </form>

    <form action="<?php echo htmlspecialchars("dbProduto.php") ?>" method="post">
        <input type="hidden" name="id" value="<?php echo $Produto->id ?>">
        <button name="btnDeletar" class="btn btn-outline-danger btn-sm" type="submit"
            onclick="return confirm('Tem certeza que deseja deletar esse produto?');">
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
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js">
    </script>
</body>

</html>