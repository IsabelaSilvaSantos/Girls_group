<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/layout.css">
    <link rel="shortcut icon" href="images/Logo.png" type="image/x-icon">
    <title>Nome da empresa - frase curta</title>
</head>

<body>


    <header>
        <h1>Nome da Empresa</h1>
        <p> Frase curta e explicativa sobre a empresa</p>
    </header>

    <nav>
        <a href="#sobre">Sobre</a>
        <a href="#historia">História</a>
        <a href="#estrutura">Nossa Estrutura</a>
        <a href="#produtos">Produtos</a>
        <a href="#contato">Contato</a>
    </nav>

    <main>

    <div id="carouselExampleFade" class="carousel slide carousel-fade">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="images/imagemum.png" class="d-block w-100" alt="imagem um">
                </div>
                <div class="carousel-item">
                    <img src="images/imagemdois.png" class="d-block w-100" alt="imagem dois">
                </div>
                <div class="carousel-item">
                    <img src="images/imagemtres.png" class="d-block w-100" alt="imagem tres">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <div class="dest">
            Frase central 
        </div>

        <section id="sobre">
            <div class="container">
                <div class="texto">
                    <h2>Sobre Nós</h2>
                    <p>Fale sobre a empresa, seus principios...</p>
                </div>
            </div>
        </section>

        <section id="historia">
            <div class="container">
                <div class="texto">
                    <h2>Nossa História</h2>
                    <p>Fale sobre a sua historia...</p>
                </div>
            </div>
        </section>


        <section id="estrutura">
            <div class="container">
                <div class="texto">
                    <h2>Nossa estrutura</h2>
                    <p>Fale onde a empresa opera e sua estrutura para a produção, seus endereços... </p>
                </div>
            </div>
        </section>

        <section id="produtos">
            <div class="container">
                <div class="texto">
                    <h2>Produtos</h2>
                    <ul>
                        <li>Produtos</li>
                        <li>Proutos</li>
                        <li>Produtos</li>
                        <li>Produtos</li>
                </div>
            </div>
        </section>

        <section id="contato">
            <div class="container">
                <div class="texto">
                    <h2>Contato e Redes Sociais</h2>
                    <p>Email: contato@empresa.com</p>
                    <p>Telefone: (99) 9999-9999</p>
                    <p>Istagram: empresa_empresa</p>
                    <p>TikTok: empresa_empresa</p>
                </div>
            </div>
        </section>


    </main>
    <footer>
        <p>&copy;2025 Nome da empresa- Todos os direitos reservados</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js">
    </script>
</body>

</html>