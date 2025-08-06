<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="images/LOgoMenu.png" type="image/x-icon" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="CSS/baseSite.css" />
  <link rel="stylesheet" href="CSS/index.css" />
  <link rel="stylesheet" href="CSS/style.css" />
  <title>Nome da empresa - frase curta</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg nav-custom">
    <div class="container-fluid">
      <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <i class="bi bi-list fs-1"></i>
      </button>
      <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item"><a class="nav-link" href="#sobre">Sobre</a></li>
          <li class="nav-item"><a class="nav-link" href="#produtos">Produtos</a></li>
          <li class="nav-item"><a class="nav-link" href="#estrutura">Estrutura</a></li>
          <li class="nav-item"><a class="nav-link" href="#contato">Contato</a></li>
        </ul>
      </div>
    </div>
  </nav>
  
  <header>
    <img src="images/LOgoMenu.png" alt="Logo da empresa" />
    <div class="empresa">
      <h1>Nome da Empresa</h1>
      <p>Frase curta e explicativa sobre a empresa</p>
    </div>
  </header>

  <main>
    <div id="carouselExampleFade" class="carousel slide carousel-fade mb-4">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="images/imagemum.png" class="d-block w-100" alt="imagem um">
        </div>
        <div class="carousel-item">
          <img src="images/imagemdois.png" class="d-block w-100" alt="imagem dois">
        </div>
        <div class="carousel-item">
          <img src="images/imagemtres.png" class="d-block w-100" alt="imagem três">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Anterior</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Próximo</span>
      </button>
    </div>

    
    <div class="dest">
      Frase central
    </div>

    
    <section id="sobre">
      <h2>Sobre Nós</h2>
      <div class="msn">
        <img src="images/sobrenos.png" alt="Imagem do sobre nós" />
        <p>Fale sobre a empresa, seus princípios...</p>
      </div>
    </section>

    
    <section id="produtos">
      <h2>Produtos</h2>
      <div class="msn">
        <img src="images/atividades.png" alt="Imagem de produtos" />
        <ul>
          <li>Produtos</li>
          <li>Proutos</li>
          <li>Produtos</li>
          <li>Produtos</li>
        </ul>
      </div>
    </section>

    
    <section id="estrutura">
      <h2>Nossa Estrutura</h2>
      <div class="msn">
        <img src="images/estruturas.png" alt="Imagem de estruturas" />
        <p>Fale onde a empresa opera e sua estrutura para a produção, seus endereços...</p>
      </div>
    </section>


    <section id="contato">
      <h2>Contato e Redes Sociais</h2>
      <div class="msn">
        <img src="images/contato.png" alt="Imagem de contato" />
        <div>
          <p>Email: contato@empresa.com</p>
          <p>Telefone: (99) 9999-9999</p>
          <p>Instagram: empresa_empresa</p>
          <p>TikTok: empresa_empresa</p>
        </div>
      </div>
    </section>

  </main>

  <footer>
    <?php require_once "_parts/_footer.php" ?>
  </footer>

  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>