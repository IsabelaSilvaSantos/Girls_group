<?php
// ATENÇÃO: É FUNDAMENTAL INCLUIR AQUI AS CLASSES NECESSÁRIAS
// require_once 'CRUD.php'; 
// require_once 'Categoria.php'; 
// require_once 'Produto.php'; 

// 1. Obter o ID da categoria da URL (Método GET)
// Exemplo de URL: produtos_por_categoria.php?id=1
$idCategoria = $_GET['id'] ?? null;

// Verifica se o ID é válido e é um número
if (!is_numeric($idCategoria) || $idCategoria <= 0) {
    // Redireciona ou exibe erro se não houver ID válido
    die("ID de Categoria inválido ou não fornecido.");
}

// 2. Inicializar classes
// Assumindo que a classe Categoria é a que você acabou de confirmar:
$c = new Categoria(); 
$p = new Produto();

// Buscar o nome da categoria para o título da página
$categoria = $c->getCategoriaById((int)$idCategoria);

if (!$categoria) {
    die("Categoria não encontrada.");
}

$tituloCategoria = $categoria->nome_categoria;

// Buscar todos os produtos da categoria (Este método traz preco e imagem_principal)
$produtos = $p->getByCategoriaId((int)$idCategoria);

$diretorio_imagens = 'images/'; // Diretório onde suas imagens estão salvas
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($tituloCategoria); ?> | Girls Group</title>
    <!-- Links CSS e Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/layoutApa.css"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body style="background-color: var(--rosa-claro);">

<main class="container">
    <h2 class="text-center mb-4" style="color: var(--rosa-escuro-texto);">
        Nossos Deliciosos <?php echo htmlspecialchars($tituloCategoria); ?>
    </h2>
    
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        
        <?php if (!empty($produtos)): ?>
            <?php foreach ($produtos as $produto): ?>
                
                <!-- CARD DE PRODUTO INDIVIDUAL -->
                <div class="col">
                    <div class="card h-100 shadow" style="background-color: var(--rosa-medio); border-radius: 12px; border: none;">
                        
                        <!-- LÓGICA DE EXIBIÇÃO DA IMAGEM -->
                        <div class="product-image-container" style="height: 200px; overflow: hidden; border-radius: 12px 12px 0 0;">
                            <?php 
                            // Monta o caminho completo da imagem
                            $url_imagem = !empty($produto->imagem_principal) 
                                ? $diretorio_imagens . $produto->imagem_principal 
                                : 'https://placehold.co/400x200/de9ca4/ffeae9?text=Sem+Foto';
                            ?>
                            <img src="<?php echo htmlspecialchars($url_imagem); ?>" 
                                class="card-img-top" 
                                alt="<?php echo htmlspecialchars($produto->nome_produto); ?>" 
                                style="object-fit: cover; width: 100%; height: 100%;">
                        </div>

                        <div class="card-body">
                            <h5 class="card-title" style="color: var(--rosa-escuro-texto);">
                                <?php echo htmlspecialchars($produto->nome_produto); ?>
                            </h5>
                            <p class="card-text text-muted" style="color: var(--rosa-escuro-texto); font-size: 0.9em;">
                                <?php echo htmlspecialchars($produto->descricao ?? 'Sem descrição.'); ?>
                            </p>
                            
                            <!-- LÓGICA DE EXIBIÇÃO DO PREÇO -->
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <span class="fw-bold fs-5" style="color: var(--rosa-escuro-texto);">
                                    R$ <?php echo number_format($produto->preco, 2, ',', '.'); ?>
                                </span>
                                <a href="detalhesProduto.php?id=<?php echo $produto->id_produto; ?>" class="btn btn-sm" style="background-color: var(--borda-botao-rosa); color: var(--color-font-clara);">Ver Detalhes</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12">
                <p class="text-center" style="color: var(--rosa-escuro-texto);">Nenhum produto cadastrado para a categoria "<?php echo htmlspecialchars($tituloCategoria); ?>" ainda.</p>
            </div>
        <?php endif; ?>

    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
