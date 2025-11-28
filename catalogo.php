<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="index.css"> 
    <link rel="stylesheet" href="layoutCategoria.css">
     <title>Catálogo de Produtos</title>
    <
</head>
<body style="background-color: var(--fundo-principal);">
    
    <?php include '_parts/_menu.php'; ?> 

    <main class="container mx-auto p-5">
        <h2 class="titulo-manuscrito">Nossos Produtos</h2>
        
        
        <div class="product-grid">
        
            <?php foreach ($produtos as $produto): ?> 
            
            <?php
            
            
            foreach ($produtos as $produto): 
                $imagem_url = $produto['gerProduto.php'] ?: 
                $alt_text = $produto['gerProduto.php'];
            ?>
            
            <div class="product-card">
                <div class="product-image-container">
                    <?php if ($produto['gerProduto.php']): ?>
                        <img src="<?php echo htmlspecialchars($imagem_url); ?>" 
                             alt="<?php echo htmlspecialchars($alt_text); ?>" 
                             loading="lazy">
                    <?php else: ?>
                        <div class="sem-foto">Imagem Indisponível</div>
                    <?php endif; ?>
                </div>

                <div class="product-info">
                    <h5><?php echo htmlspecialchars($produto['gerProduto.php']); ?></h5>
                    <p>R$ <?php echo number_format($produto['gerProduto.php'], 2, ',', '.'); ?></p>
                </div>
                
                
                <a href="detalhe_produto.php?id=<?php echo $produto['id_produto']; ?>" class="detail-button">
                    Ver Detalhes
                </a>
            </div>
            
            <?php endforeach; ?>
        
        </div>
    </main>

    <footer>
        <?php require_once "_parts/_footer.php"; ?>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>