<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/baseAdmin.css">
    <title>Empresa</title>
</head>

<body> 
    <header>
        <?php require_once "_parts/_menuAdmin.php"; ?>
    </header>

    <main class="container mt-3">
        <div class="mt-3">
            <h3>Empresa</h3>
        </div>
        <div class="mt-3">
            <a href="gerEmpresa.php" class="btn btn-outline-secondary">Nova Empresa</a>
        </div>
        <table class="table">
            <thead class="table-secondary">
                <tr>
                    <th>#</th>
                    <th>Empresa</th>
                    <th class="text-center">Ações</th>
                </tr>
            </thead>
            <body>
                <?php
                spl_autoload_register(function ($class) {
                    require_once "classes/{$class}.class.php";
                });

                $p = new Empresa();
                $empresa = $p->all();
                foreach ($empresa as $Empresa):
                    ?>
                    <tr>
                        <td><?php echo $Empresa->id?></td>
                        <td><?php echo $Empresa->nome?></td>
                        
                        <td class="d-flex gap-1 justify-content-center">
                            <form action="<?php echo htmlspecialchars("gerEmpresa.php") ?>" method="post" class="d-flex">
                                <input type="hidden" name="id" value="<?php echo $Empresa->id ?>">
                                <button name="btnEditar" class="btn btn-outline-primary btn-sm" type="submit"
                                    onclick="return confirm('Tem certeza que deseja editar essa empresa?');"><i
                                    class="bi bi-pencil-square"></i>
                                </button>
                            </form>

                            <form action="<?php echo htmlspecialchars("dbEmpresa.php") ?>" method="post" class="d-flex">
                                <input type="hidden" name="id" value="<?php echo $Empresa->id ?>">
                                <button name="btnDeletar" class="btn btn-outline-danger btn-sm" type="submit"
                                    onclick="return confirm('Tem certeza que deseja deletar essa empresa?');"><i
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