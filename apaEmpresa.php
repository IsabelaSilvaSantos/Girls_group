<?php
require_once "verifica_usuario.php";
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <!--datable link css-->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="CSS/layoutApa.css">
    <title>Empresa</title>
</head>

<body>
    <header>
        <?php require_once "_parts/_menuAdmin.php"; ?>
    </header>

    <main class="container mt-5">
        <div class="mt-3">
            <h3>Empresa</h3>
        </div>
        <div class="mt-3 mb-4">
            <a href="gerEmpresa.php" class="btn btn-outline-primary">Nova Empresa</a>
        </div>
        <table class="table dataTable">
    <thead class="table-secondary">
        <tr>
            <th>#</th>
            <th>Empresa</th>
            <th class="text-center">Ações</th>
        </tr>
    </thead>
            <tbody>
                <?php
                spl_autoload_register(function ($class) {
                    require_once "classes/{$class}.class.php";
                });

                $P = new Empresa();
                $empresa = $P->all();
                foreach ($empresa as $Empresa):
                    ?>
                    <tr>
                        <td><?php echo $Empresa->id_empresa ?></td>
                        <td><?php echo $Empresa->nome_empresa ?></td>

                        <td class="d-flex gap-2 justify-content-center">
                            <form action="<?php echo htmlspecialchars("gerEmpresa.php") ?>" method="post">
                                <input type="hidden" name="id_empresa" value="<?php echo $Empresa->id_empresa ?>">
                                <button name="btnEditar" class="btn btn-outline-primary btn-sm" type="submit"
                                    onclick="return confirm('Tem certeza que deseja editar essa empresa?');">
                                    <i class="bi bi-pencil-square"></i>
                                </button>
                            </form>

                            <form action="<?php echo htmlspecialchars("dbEmpresa.php") ?>" method="post">
                                <input type="hidden" name="id_empresa" value="<?php echo $Empresa->id_empresa ?>">
                                <button name="btnDeletar" class="btn btn-outline-primary btn-sm" type="submit"
                                    onclick="return confirm('Tem certeza que deseja deletar essa empresa?');">
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
        <?php require_once "_parts/_footer.php" ?>
    </footer>
    <!-- Link JQuery deve ser primeiro-->
    <script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.js" type="text/javascript"></script>

    <!-- Link dataTable JS-->
    <script src="https://cdn.datatables.net/2.3.4/js/dataTables.min.js"></script>
    <!-- Link dataTable JS bootstrap5 -->
    <script src="https://cdn.datatables.net/2.3.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Link para o JS de configuração -->
    <script src="JS/paginacao.js"></script>
    
</body>

</html>