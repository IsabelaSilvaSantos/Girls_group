<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="images/LOgoMenu.png" type="image/x-icon" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="CSS/index.css" />
  <title>Nome da empresa - frase curta</title>
</head>

<body>
  <header>
    <?php require_once "_parts/_menu.php"; ?>
  </header>

  

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


    <h2 class="TextoManuscrito">Produtos</h2>
    <div class="product-grid">
  <div class="product-card">
    <img src="images/bolo.png" alt="Bolo branco com flores" class="product-image">
    <div class="product-info">
      <button class="buy-button">Informações</button>
    </div>
  </div>

  <div class="product-card">
    <img src="images/bolo.png" alt="Bolo rosa" class="product-image">
    <div class="product-info">
      <button class="buy-button">Informações</button>
    </div>
  </div>

  <div class="product-card">
    <img src="images/bolo.png" alt="Bolo claro com flores" class="product-image">
    <div class="product-info">
      <button class="buy-button">Informações</button>
    </div>
  </div>
</div>
        
      

    <main>
      <section id="sobre Nós" class="bloco">
        <h2 class="TextoManuscrito">Sobre Nós</h2>
        <div class="msn">
          <img src="images/Sobre.png" alt="Imagem do sobre nós" />
          <div>
            <p>Texto Texto Texto Texto Texto</p>
            <p>Texto Texto Texto Texto Texto</p>
            <p>Texto Texto Texto Texto Texto</p>
            <p>Texto Texto Texto Texto Texto</p>
          </div>
        </div>
      </section>

      <section id="Empresa" >
         <h2 class="TextoManuscrito">Nossa Empresa</h2>
        <div class="msnLateral">
          <img src="images/Empresa.png" alt="Imagem de produtos"/>
          <ul>
            <li>Produtos</li>
            <li>Proutos</li>
            <li>Produtos</li>
            <li>Produtos</li>
          </ul>
        </div>
      </section>

      <section id="Empresa" >
        <div class="msn">
          <img src="images/Empresa2.png" alt="Imagem de produtos"/>
          <ul>
            <li>Produtos</li>
            <li>Proutos</li>
            <li>Produtos</li>
            <li>Produtos</li>
          </ul>
        </div>
      </section>

      
        
      
        </div>
        <div> 
           <h2 class="TextoManuscrito">Localização</h2>
           <div style="text-align: center;">
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3909.999850372924!2d-61.38241022562322!3d-11.479935931604729!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x93c826519e7eca21%3A0x9c3ad57fa8cc996d!2sInstituto%20Federal%20de%20Rond%C3%B4nia%20-%20C%C3%A2mpus%20Cacoal!5e0!3m2!1spt-BR!2sbr!4v1756738790493!5m2!1spt-BR!2sbr" width="1000" height="400" style="border: 1px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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