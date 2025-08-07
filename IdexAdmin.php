<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="images/LOgoMenu.png" type="image/x-icon" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" />
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="CSS/LayoutIndexAdmin.css" />
  <title>Nome da empresa - frase curta</title>
</head>

<body>
  <header>
        <?php require_once "_parts/_menu.php"; ?>
    </header>
  
    <div class="empresa">
      <h1 class="text-center">Nome da Empresa</h1>
      <p class="text-center">Frase curta e explicativa sobre a empresa</p>
    </div>

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

<main>
  <section id="sobre" class="bloco">
    <h2 class="text-center">Sobre Nós</h2>
    <div class="msn">
      <img src="images/sobrenos.png" alt="Imagem do sobre nós" />
      <div>
        <p>Texto Texto Texto Texto Texto</p>
        <p>Texto Texto Texto Texto Texto</p>
        <p>Texto Texto Texto Texto Texto</p>
        <p>Texto Texto Texto Texto Texto</p>
      </div>
    </div>
  </section>

  <section id="produtos" class="bloco">
    <h2 class="text-center">Produtos</h2>
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

  <section id="estrutura" class="bloco">
    <h2 class="text-center">Nossa Estrutura</h2>
    <div class="msn">
      <img src="images/estruturas.png" alt="Imagem de estruturas" />
      <div>
        <p>Texto Texto Texto Texto Texto</p>
        <p>Texto Texto Texto Texto Texto</p>
        <p>Texto Texto Texto Texto Texto</p>
        <p>Texto Texto Texto Texto Texto</p>
      </div>
    </div>
  </section>

  <section id="contato" class="bloco">
    <h2 class="text-center">Contato e Redes Sociais</h2>
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
    </section>

  </main>

  <footer>
    <?php require_once "_parts/_footer.php" ?>
  </footer>

  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>