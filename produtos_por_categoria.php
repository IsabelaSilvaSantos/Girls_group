<?php

spl_autoload_register(function ($class) {
    require_once "Classes/{$class}.class.php";
});

$idCategoria = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$idCategoria || $idCategoria <= 0) {
    die("ID de Categoria inválido ou não fornecido.");
}

$c = new Categoria();
$p = new Produto();
$categoria = $c->search('id_categoria', (int) $idCategoria);

if (!$categoria) {
    die("Categoria não encontrada.");
}

$tituloCategoria   = $categoria->nome_categoria;
$produtos          = $p->getByCategoriaId((int) $idCategoria);
$diretorio_imagens = 'images/';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
        <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($tituloCategoria); ?> | Girls Group</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/layoutCategorias.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <header>
        <?php require_once "_parts/_menu.php"; ?>
    </header>

    <main class="container">
        <h2 class="text-center mb-4 categoria-titulo">
            Nossos Deliciosos <?php echo htmlspecialchars($tituloCategoria); ?>
        </h2>

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">

            <?php if (!empty($produtos)): ?>
                <?php foreach ($produtos as $produto): ?>

                    <div class="col">
                        <div class="card h-100 shadow produto-card">

                            <div class="product-image-container produto-card-img-container">
                                <?php
                                $url_imagem = !empty($produto->nome_imagem_principal)
                                    ? $diretorio_imagens . $produto->nome_imagem_principal
                                    : 'https://placehold.co/400x200/de9ca4/ffeae9?text=Sem+Foto';
                                ?>
                                <img src="<?php echo htmlspecialchars($url_imagem); ?>" class="card-img-top produto-card-img"
                                    alt="<?php echo htmlspecialchars($produto->nome_produto); ?>"
                                    onerror="this.src='https://placehold.co/400x200/de9ca4/ffeae9?text=Sem+Foto'">
                            </div>

                            <div class="card-body">
                                <h5 class="card-title produto-card-titulo">
                                    <?php echo htmlspecialchars($produto->nome_produto); ?>
                                </h5>

                                <p class="card-text text-muted produto-card-desc">
                                    <?php echo htmlspecialchars($produto->descricao ?? 'Sem descrição.'); ?>
                                </p>

                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <span class="fw-bold fs-5 produto-card-preco">
                                        R$ <?php echo number_format($produto->preco, 2, ',', '.'); ?>
                                    </span>

                                    <button type="button" class="btn btn-sm btn-ver-detalhes"
                                        data-bs-toggle="modal" data-bs-target="#detalhesModal"
                                        data-nome="<?php echo htmlspecialchars($produto->nome_produto); ?>"
                                        data-preco="R$ <?php echo number_format($produto->preco, 2, ',', '.'); ?>"
                                        data-desc="<?php echo htmlspecialchars($produto->descricao ?? 'Nenhuma descrição fornecida.'); ?>"
                                        data-unidmed="<?php echo htmlspecialchars($produto->unidade_medida ?? ''); ?>"
                                        data-img="<?php echo htmlspecialchars($url_imagem); ?>">
                                        Ver Detalhes
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12">
                    <p class="text-center texto-sem-produto">Nenhum produto cadastrado para a
                        categoria "<?php echo htmlspecialchars($tituloCategoria); ?>" ainda.</p>
                </div>
            <?php endif; ?>

        </div>
    </main>

    <div class="modal fade" id="detalhesModal" tabindex="-1" aria-labelledby="detalhesModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content modal-produto">

                <div class="modal-header">
                    <h5 class="modal-title modal-produto-titulo" id="detalhesModalLabel">Detalhes do Produto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="text-center mb-3">
                        <img id="modal-img" class="img-fluid rounded shadow-sm mb-3 modal-produto-img" alt="Imagem do Produto">
                        <h4 id="modal-nome" class="modal-produto-nome"></h4>
                        <p id="modal-preco" class="fw-bold fs-5"></p>
                    </div>
                    <hr class="modal-produto-hr">
                    <p><strong>Descrição:</strong> <span id="modal-desc"></span></p>
                    <p><strong>Unidade de Medida:</strong> <span id="modal-unidmed"></span></p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>

            </div>
        </div>
    </div>

    <footer>
        <?php require_once "_parts/_footer.php"; ?>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
    <script src="JS/modal.js"></script>
</body>

</html>
