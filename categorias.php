<?php

function formatar_descricao_md($text)
{
    if (empty($text)) {
        return '';
    }

    $safe_text = htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
    $lines = explode("\n", $safe_text);
    $html_output = [];
    $in_list = false;

    foreach ($lines as $line) {
        $trimmed_line = trim($line);

        if (preg_match('/^[\*\-] (.+)/', $trimmed_line, $matches)) {
            $item_content = trim($matches[1]);

            if (!$in_list) {
                $html_output[] = '<ul>';
                $in_list = true;
            }
            $html_output[] = '<li>' . $item_content . '</li>';
        } else {

            if ($in_list) {
                $html_output[] = '</ul>';
                $in_list = false;
            }

            if (!empty($trimmed_line)) {
                $html_output[] = '<p>' . nl2br($trimmed_line) . '</p>';
            }
        }
    }

    if ($in_list) {
        $html_output[] = '</ul>';
    }

    return implode("\n", $html_output);
}


spl_autoload_register(function ($class) {
    require_once "classes/{$class}.class.php";
});

$id_categoria = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$c = new Categoria();
$p = new Produto();

try {
    $fp = new FotoProduto();
} catch (Exception $e) {
    $fp = null;
}

$categoria = null;
$produtos = [];
$tituloPagina = "Produtos";
$mensagemErro = '';

if ($id_categoria) {
    $categoria = $c->search('id_categoria', $id_categoria);

    if ($categoria) {
        $tituloPagina = $categoria->nome_categoria;
        $produtos = $p->getByCategoriaId($id_categoria);

        if (empty($produtos)) {
            $mensagemErro = 'Nenhum produto cadastrado nesta categoria.';
        }
    } else {
        $mensagemErro = 'A categoria solicitada não foi encontrada.';
    }
} else {
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
    <link rel="stylesheet" href="CSS/layoutCategorias.css" />

    <title><?php echo htmlspecialchars($tituloPagina); ?> | Sua Loja</title>
</head>

<body>
    <header>
        <?php require_once "_parts/_menuCategoria.php"; ?>
    </header>

    <div class="content-wrapper">
        <main class="container">

            <div class="search-container">
                <input type="text" class="search-input" placeholder="Digite o nome do produto" />
                <span class="search-icon">
                    <i class="bi bi-search"></i>
                </span>
                <span class="clear-icon" style="display: none;">
                    <i class="bi bi-x-circle-fill"></i>
                </span>
            </div>

            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-4 mt-3">

                <?php if ($mensagemErro): ?>
                    <div class="col-12 text-center my-5">
                        <p class="h4 text-secondary"><?php echo $mensagemErro; ?></p>
                    </div>
                <?php else: ?>
                    <?php foreach ($produtos as $Produto): ?>
                        <?php
                        $imagePath = 'images/placeholder.png';

                        if (isset($Produto->id_produto) && $fp) {
                            try {
                                $primeiraFoto = $fp->getFirstPhotoPathByProductId($Produto->id_produto);

                                if ($primeiraFoto) {
                                    $imagePath = 'images/' . $primeiraFoto;
                                }
                            } catch (Exception $e) {
                                error_log("Erro ao buscar primeira foto: " . $e->getMessage());
                            }
                        }
                        $precoFormatado = 'R$ ' . number_format($Produto->preco ?? 0, 2, ',', '.');
                        $html_description = formatar_descricao_md($Produto->descricao ?? 'Descrição não disponível.');
                        $descricao_encoded = htmlspecialchars(json_encode($html_description), ENT_QUOTES, 'UTF-8');
                        $nome_produto = htmlspecialchars($Produto->nome_produto);
                        ?>

                        <div class="col product-col">
                            <div class="card h-100">
                                <img src="<?php echo htmlspecialchars($imagePath); ?>" class="card-img-top"
                                    alt="Imagem de <?php echo $nome_produto; ?>"
                                    onerror="this.onerror=null;this.src='images/placeholder.png';">
                                <div class="card-body text-center">
                                    <p class="name"><?php echo $nome_produto; ?></p>
                                    <p class="price">R$ <?php echo number_format($Produto->preco ?? 0, 2, ',', '.'); ?></p>

                                    <button class="btn btn-info-custom w-100 btn-view-details" data-bs-toggle="modal"
                                        data-bs-target="#productDetailModal" data-name="<?php echo $nome_produto; ?>"
                                        data-description='<?php echo $descricao_encoded; ?>'
                                        data-price="<?php echo $precoFormatado; ?>" type="button">Ver Detalhes</button>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>

                <div class="col-12 text-center my-5 no-results-message" style="display: none;">
                    <p class="h4 text-secondary"></p>
                </div>

            </div>

        </main>
    </div>

    <div class="modal fade" id="productDetailModal" tabindex="-1" aria-labelledby="productDetailModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="productDetailModalLabel">Detalhes do Produto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h4 id="modalProductName" class="mb-3"></h4>
                    <div id="modalProductDescription"></div>
                    <p class="text-end fw-bold" id="modalProductPrice"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        const searchInput = document.querySelector('.search-input');
        const clearIcon = document.querySelector('.clear-icon');
        const productCols = document.querySelectorAll('.product-col');
        const noResultsMessage = document.querySelector('.no-results-message');

        const filterProducts = (searchTerm) => {
            const term = searchTerm.toLowerCase().trim();
            let foundProducts = false;

            productCols.forEach(col => {
                const nameElement = col.querySelector('.name');
                if (nameElement) {
                    const name = nameElement.textContent.toLowerCase();

                    if (name.includes(term)) {
                        col.style.display = 'block';
                        foundProducts = true;
                    } else {
                        col.style.display = 'none';
                    }
                }
            });

            if (term.length > 0 && !foundProducts) {
                noResultsMessage.style.display = 'block';
                noResultsMessage.querySelector('p').innerHTML = `Nenhum resultado encontrado para "${term}".`;
            } else if (noResultsMessage) {
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
            filterProducts('');
        });

        const productDetailModal = document.getElementById('productDetailModal');

        productDetailModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget
            const name = button.getAttribute('data-name')
            const formattedHtml = JSON.parse(button.getAttribute('data-description'));
            const price = button.getAttribute('data-price')
            const modalTitle = productDetailModal.querySelector('.modal-title');
            const modalProductName = productDetailModal.querySelector('#modalProductName');
            const modalProductDescription = productDetailModal.querySelector('#modalProductDescription');
            const modalProductPrice = productDetailModal.querySelector('#modalProductPrice');

            modalTitle.textContent = `Detalhes de ${name}`;
            modalProductName.textContent = name;
            modalProductDescription.innerHTML = formattedHtml;
            modalProductPrice.textContent = price;
        })
    </script>

    <footer>
        <?php require_once "_parts/_footer.php"; ?>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>