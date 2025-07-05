<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/baseAdmin.css">
    <title>Clientes</title>
</head>

<body> 
    <header>
        <?php require_once "_parts/_menu.php"; ?>
    </header>
    <main class="container mt-3">
        <div class="mt-3">
            <h3>Clientes</h3>
        </div>
        <div class="mt-3">
            <a href="gerCliente.php" class="btn btn-outline-secondary">Novo Cliente</a>
        </div>
        <table class="table">
            <thead class="table-secondary">
                <tr>
                    <th>#</th>
                    <th>Clientes</th>
                    <th class="text-center">Ações</th>
                </tr>
            </thead>
            <body>
                <?php
                spl_autoload_register(function ($class) {
                    require_once "classes/{$class}.class.php";
                });

                $p = new Cliente();
                $Cliente = $p->all();
                foreach ($Cliente as $Cliente):
                    ?>
                    <tr>
                        <td><?php echo $Cliente->id?></td>
                        <td><?php echo $Cliente->nome?></td>
                        
                        <td class="d-flex gap-1 justify-content-center">
                            <form action="<?php echo htmlspecialchars("gerCliente.php") ?>" method="post" class="d-flex">
                                <input type="hidden" name="id" value="<?php echo $Cliente->id ?>">
                                <button name="btnEditar" class="btn btn-outline-primary btn-sm" type="submit"
                                    onclick="return confirm('Tem certeza que deseja editar esse Cliente?');"><i
                                    class="bi bi-pencil-square"></i>
                                </button>
                            </form>

                            <form action="<?php echo htmlspecialchars("dbCliente.php") ?>" method="post" class="d-flex">
                                <input type="hidden" name="id" value="<?php echo $Cliente->id ?>">
                                <button name="btnDeletar" class="btn btn-outline-danger btn-sm" type="submit"
                                    onclick="return confirm('Tem certeza que deseja deletar esse cliente?');"><i
                                    class="bi bi-trash"></i>
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