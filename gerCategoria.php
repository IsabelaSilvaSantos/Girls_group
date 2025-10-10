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

    <title>Cadastro/Edição de Categoria</title>
</head>

<body>
    <header>
        <?php require_once "_parts/_menuAdmin.php"; ?>
    </header>

    <main class="container">
        <h3 class="text-center">Cadastro de Categoria</h3>

        <?php
        spl_autoload_register(function ($class) {
            require_once "classes/{$class}.class.php";
        });

        $Categoria = new Categoria();

        if (filter_has_var(INPUT_POST, "id_categoria")):
            $id_categoria = intval(filter_input(INPUT_POST, "id_categoria"));
            $dadosCategoria = $Categoria->search("id_categoria", $id_categoria);

            if ($dadosCategoria) {
                $Categoria->setid_categoria($dadosCategoria->id_categoria);
                $Categoria->setNome_categoria($dadosCategoria->nome_categoria);
            }
        endif;
        ?>

        <form action="dbCategoria.php" method="post" class="row g-4 mt-1">

            <input type="hidden" value="<?php echo $Categoria->getid_categoria() ?? ''; ?>" name="id_categoria">

            <div class="row g-3 justify-content-center">
                <div class="col-md-6">
                    <label for="nome_categoria" class="form-label">Nome da Categoria</label>
                    <input type="text" name="nome_categoria" id="nome_categoria"
                        placeholder="Ex: Bolos, Tortas, Doces..." required class="form-control"
                        value="<?php echo $Categoria->getNome_categoria() ?? ''; ?>">
                </div>
            </div>

            <div class="col-12 mt-4 text-center">
                <button type="submit" class="btn btn-category-pink" name="btnGravar">
                    <?php echo $Categoria->getid_categoria() ? 'Alterar' : 'Cadastrar'; ?>
                </button>
            </div>
            </div>
        </form>
    </main>

    <footer>
        <?php require_once "_parts/_footer.php" ?>
    </footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>

</html>