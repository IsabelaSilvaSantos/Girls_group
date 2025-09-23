<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="CSS/layoutCategorias.css" />
</head>

<body>
    <header>
        <?php require_once "_parts/_menu.php"; ?>
    </header>

    <div class="content-wrapper">
        <main class="container my-4">
            <div class="search-container">
                <input type="text" class="search-input" placeholder="Digite o nome do produto" />
                <span class="search-icon">
                    <i class="bi bi-search"></i>
                </span>
                <span class="clear-icon">
                    <i class="bi bi-x-circle-fill"></i>
                </span>
            </div>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
                <div class="col">
                    <div class="card h-100">
                        <img src="images/bolo1.png" class="card-img-top" alt="Torta de legumes">
                        <div class="card-body text-center">
                            <p class="name">Torta de legumes</p>
                            <button class="btn btn-info-custom w-100" type="button">Informações</button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        const searchInput = document.querySelector('.search-input');
        const clearIcon = document.querySelector('.clear-icon');

        searchInput.addEventListener('input', () => {
            if (searchInput.value.length > 0) {
                clearIcon.style.display = 'block';
            } else {
                clearIcon.style.display = 'none';
            }
        });

        clearIcon.addEventListener('click', () => {
            searchInput.value = '';
            clearIcon.style.display = 'none';
            searchInput.focus(); 
        });
    </script>

    <footer>
        <?php require_once "_parts/_footer.php"; ?>
    </footer>
</body>

</html>