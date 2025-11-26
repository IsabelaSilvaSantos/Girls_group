<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="CSS/layoutCategorias.css">
    <title>Fotos do Produto</title>
</head>

<body>
    <header>
        <?php require_once "_parts/_menuAdmin.php"; ?>
    </header>
    <div class="content-wrapper">
        <main class="container">
            <?php
            spl_autoload_register(function ($class) {
                require_once "classes/{$class}.class.php";
            });

            $idProduto = filter_input(INPUT_GET, 'idProduto', FILTER_VALIDATE_INT);
            $foto = new FotoProduto();
            $produto = new Produto();

            $dadosProduto = $produto->search('id_produto', $idProduto);
            $fotosProduto = $foto->fotosProduto($idProduto);
            ?>

            <div class="d-flex justify-content-between align-items-center mt-4">
                <h3>Fotos do Produto: <?php echo $dadosProduto->nome_produto ?? 'N/A'; ?></h3>

                <a href="cadastroFotoProduto.php?idProduto=<?php echo $idProduto; ?>" class="btn btn-info-custom">
                    <i class="bi bi-plus-circle"></i> Adicionar Nova Foto
                </a>
            </div>
            <hr>

            <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php if (!empty($fotosProduto)): ?>
                    <?php foreach ($fotosProduto as $f): ?>
                        <div class="col">
                            <div class="card h-100">

                                <img src="images/<?php echo htmlspecialchars($f->nome_arquivo); ?>" class="card-img-top"
                                    alt="<?php echo htmlspecialchars($f->texto_alternativo); ?>">

                                <div class="card-body">
                                    <p class="card-text small">Legenda: <?php echo htmlspecialchars($f->legenda); ?></p>
                                </div>
                                <div class="card-footer d-flex justify-content-between">

                                    <form action="cadastroFotoProduto.php" method="post" class="d-inline-block">
                                        <input type="hidden" name="idFoto" value="<?php echo $f->id_foto; ?>">
                                        <button type="submit" name="btnEditar" class="btn btn-sm btn-info-custom">
                                            <i class="bi bi-pencil-square"></i> Editar
                                        </button>
                                    </form>

                                    <form action="dbFotoProduto.php" method="post"
                                        onsubmit="return confirm('Tem certeza que deseja DELETAR esta foto?');"
                                        class="d-inline-block">
                                        <input type="hidden" name="idFoto" value="<?php echo $f->id_foto; ?>">
                                        <button type="submit" name="btnDeletar" class="btn btn-sm btn-info-custom">
                                            <i class="bi bi-trash"></i> Deletar
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="col-12">
                        <div class="alert alert-warning text-center" role="alert">
                            Nenhuma foto cadastrada para este produto.
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <div class="mt-4 mb-5">
                <a href="apaProdutos.php" class="btn btn-info-custom"><i class="bi bi-arrow-left"></i> Voltar para Produtos</a>
            </div>
    </div>
    </main>
    </div>

    <footer>
        <?php require_once("_parts/_footer.php"); ?>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>