<?php
require_once "verifica_usuario.php";

spl_autoload_register(function ($class) {
    require_once "classes/{$class}.class.php";
});


$p = new Produto();
$produtos = $p->all();


if (!is_array($produtos)) {
    $produtos = [];
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
        <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="layoutCategoria.css">

    <title>Catálogo de Produtos</title>
</head>

<body style="background-color: var(--fundo-principal);">
    
    <?php include '_parts/_menu.php'; ?>

    <main class="container mx-auto p-5">
        <h2 class="titulo-manuscrito">Nossos Produtos</h2>

        <div class="product-grid">

            <?php if (!empty($produtos)): ?>
                <?php foreach ($produtos as $produto): ?>

                    <?php
                        $imagem_url = $produto->imagem ?? null;
                        $nome       = $produto->nome_produto ?? "Sem nome";
                        $preco      = $produto->preco ?? 0;
                        $id         = $produto->id_produto;
                    ?>

                    <div class="product-card">

                        <div class="product-image-container">
                            <?php if (!empty($imagem_url)): ?>
                                <img src="<?= htmlspecialchars($imagem_url) ?>" 
                                     alt="<?= htmlspecialchars($nome) ?>"
                                     loading="lazy">
                            <?php else: ?>
                                <div class="sem-foto">Imagem Indisponível</div>
                            <?php endif; ?>
                        </div>

                        <div class="product-info">
                            <h5><?= htmlspecialchars($nome) ?></h5>
                            <p>R$ <?= number_format($preco, 2, ',', '.') ?></p>
                        </div>

                        <a href="detalhe_produto.php?id=<?= $id ?>" class="detail-button">
                            Ver Detalhes
                        </a>

                    </div>

                <?php endforeach; ?>
            
            <?php else: ?>
                <p>Nenhum produto cadastrado.</p>
            <?php endif; ?>

        </div>
    </main>

    <footer>
        <?php require_once "_parts/_footer.php"; ?>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

