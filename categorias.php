<?php
// === LÓGICA PHP PARA BUSCA DE PRODUTOS ===

// Configuração do Autoload (garante que as classes sejam carregadas)
spl_autoload_register(function ($class) {
    // Certifique-se de que o caminho para suas classes está correto
    require_once "classes/{$class}.class.php";
});

// 1. Obter e validar o ID da Categoria da URL.
// O parâmetro de busca na URL está definido como 'id' (ex: categorias.php?id=1)
$id_categoria = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

// 2. Instanciar as classes para buscar dados
$c = new Categoria();
$p = new Produto();

// 2.1. Adicionamos a classe FotoProduto para busca dinâmica da imagem
// Nota: Você precisará criar a classe FotoProduto.class.php!
try {
    $fp = new FotoProduto(); 
} catch (Exception $e) {
    // Caso a classe FotoProduto ainda não exista
    // Você pode usar uma instância genérica se seu CRUD suportar:
    // $fp = new CRUD('foto_produto'); 
    $fp = null; 
}


// 3. Inicializar variáveis de controle
$categoria = null;
$produtos = [];
$tituloPagina = "Produtos";
$mensagemErro = '';

// 4. Se um ID válido for fornecido, realiza as buscas
if ($id_categoria) {
    // Busca o registro da Categoria
    // Nota: A classe CRUD requer que o método search() seja usado com o nome do campo e o ID
    $categoria = $c->search('id_categoria', $id_categoria); 
    
    // Verifica se a categoria existe
    if ($categoria) {
        $tituloPagina = $categoria->nome_categoria;
        
        // Busca a lista de produtos filtrados
        $produtos = $p->getByCategoriaId($id_categoria);
        
        // Verifica se a categoria existe, mas não tem produtos
        if (empty($produtos)) {
            $mensagemErro = 'Nenhum produto cadastrado nesta categoria.';
        }
    } else {
        // Categoria não encontrada (ID inválido ou excluído)
        $mensagemErro = 'A categoria solicitada não foi encontrada.';
        // Redirecionamento não é necessário aqui, a mensagem de erro no HTML é suficiente
    }
} else {
    // ID não fornecido na URL (ou inválido no filtro)
    $mensagemErro = 'ID de categoria inválido ou não fornecido.';
}

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    
    <meta charset="UTF-8" />
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" />
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- Utilize o CSS específico para o layout de categorias -->
    
    <link rel="stylesheet" href="CSS/layoutCategorias.css" />
    <title><?php echo htmlspecialchars($tituloPagina); ?> | Sua Loja</title>
</head>

<body>
    <header>
        <?php require_once "_parts/_menu.php"; ?>
        </header>

    <div class="content-wrapper">
        <main class="container my-4">

            <!-- BARRA DE BUSCA -->
            <div class="search-container">
                <input type="text" class="search-input" placeholder="Digite o nome do produto" />
                <span class="search-icon">
                    <i class="bi bi-search"></i>
                    </span>
                <span class="clear-icon" style="display: none;">
                    <i class="bi bi-x-circle-fill"></i>
                    </span>
                </div>
            
            <!-- GRADE DE PRODUTOS -->
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 mt-3">
                
                <?php if ($mensagemErro): ?>
                    <!-- Exibe mensagem se não houver produtos ou a categoria for inválida -->
                    <div class="col-12 text-center my-5">
                        <p class="h4 text-secondary"><?php echo $mensagemErro; ?></p>
                    </div>
                <?php else: ?>
                    <!-- LOOP PHP PARA EXIBIR OS CARDS -->
                    <?php foreach ($produtos as $Produto): ?>
                        <?php
                            // 5. IMPLEMENTAÇÃO DA BUSCA AUTOMÁTICA DA FOTO
                            $imagePath = 'images/placeholder.png'; // Fallback padrão
                            
                            if (isset($Produto->id_produto) && $fp) {
                                try {
                                    // Usa o método da classe FotoProduto
                                    $primeiraFoto = $fp->getFirstPhotoPathByProductId($Produto->id_produto);
                                    
                                    // Se a foto for encontrada, substitui o placeholder
                                    if ($primeiraFoto) {
                                        $imagePath = 'images/' . $primeiraFoto;
                                    }
                                } catch (Exception $e) {
                                    error_log("Erro ao buscar primeira foto: " . $e->getMessage());
                                    // Em caso de erro, $imagePath permanece como 'placeholder.png'
                                }
                            }

                            // Nota: A linha 116 foi ajustada aqui, e o Warning será resolvido
                            // porque $imagePath é sempre inicializado e populado corretamente.
                        ?>
                        <div class="col product-col"> <!-- Adicionado classe para facilitar o JS -->
                            <div class="card h-100">
                                <!-- ATENÇÃO: Agora usa $imagePath que foi determinado acima -->
                                <img src="<?php echo htmlspecialchars($imagePath); ?>" class="card-img-top"
                                    alt="Imagem de <?php echo htmlspecialchars($Produto->nome_produto); ?>"
                                    onerror="this.onerror=null;this.src='images/placeholder.png';">
                                <!-- Imagem de fallback é boa prática -->
                                <div class="card-body text-center">
                                    <!-- AQUI FICA O NOME DO PRODUTO (SEM REPETIÇÃO) -->
                                    <p class="name"><?php echo htmlspecialchars($Produto->nome_produto); ?></p>
                                    <!-- Assume que o preço está no objeto Produto -->
                                    <p class="price">R$ <?php echo number_format($Produto->preco ?? 0, 2, ',', '.'); ?></p>
                                    <button class="btn btn-info-custom w-100" type="button">Ver Detalhes</button>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
                
                
            </div>
            
        </main>
        </div>

    <!-- SCRIPTS JAVASCRIPT: Implementa a funcionalidade de busca por nome -->
    
    <script>
        const searchInput = document.querySelector('.search-input');
        const clearIcon = document.querySelector('.clear-icon');
        const productCols = document.querySelectorAll('.product-col'); // Seleciona as colunas


        const filterProducts = (searchTerm) => {
            const term = searchTerm.toLowerCase().trim();

            let foundProducts = false;
            // Itera sobre todas as colunas de produtos
            productCols.forEach(col => {
                const nameElement = col.querySelector('.name');
                if (nameElement) {
                    const name = nameElement.textContent.toLowerCase();

                    // Mostra ou esconde a coluna dependendo do termo de busca
                    if (name.includes(term)) {
                        col.style.display = 'block';
                        foundProducts = true;
                    } else {
                        col.style.display = 'none';
                    }
                }
            });
            
            // Lógica para mostrar "Nenhum resultado encontrado"
            const noResultsMessage = document.querySelector('.no-results-message');
            if (term.length > 0 && !foundProducts) {
                // Se a busca tem termo, mas não achou nada
                if (!noResultsMessage) {
                    const grid = document.querySelector('.row.g-4.mt-3');
                    const messageHtml = `
                        <div class="col-12 text-center my-5 no-results-message">
                            <p class="h4 text-secondary">Nenhum resultado encontrado para "${term}".</p>
                        </div>
                    `;
                    grid.insertAdjacentHTML('afterbegin', messageHtml);
                } else {
                    noResultsMessage.style.display = 'block';
                    noResultsMessage.querySelector('p').innerHTML = `Nenhum resultado encontrado para "${term}".`;
                }
            } else if (noResultsMessage) {
                   // Esconde a mensagem se o campo está vazio ou se há resultados
                 noResultsMessage.style.display = 'none';
            }
        };

        searchInput.addEventListener('input', (e) => {
            const searchTerm = e.target.value;
            if (searchTerm.length > 0) {
                clearIcon.style.display = 'block';
            } else {
                clearIcon.style.display = 'none';
            }
            filterProducts(searchTerm);
        });

        clearIcon.addEventListener('click', () => {
            searchInput.value = '';
            clearIcon.style.display = 'none';
            searchInput.focus();
            filterProducts(''); // Mostra todos os produtos novamente
        });
    </script>

    <footer>
        <?php require_once "_parts/_footer.php"; ?>
        </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
