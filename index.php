<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="images/LOgoMenu.png" type="image/x-icon" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="CSS/index.css" />
  <title>Girls Group</title>
</head>

<body>
  <header>
    <?php require_once "_parts/_menu.php"; ?>
  </header>

  <!-- Carrossel-->

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

    <div id="carouselProdutos" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000" data-bs-pause="false">
  <div class="carousel-inner">

   <section id= produtos>
    <!-- Produtos -->
    <h2 class="TextoManuscrito text-center">Produtos</h2>
    <div class="carousel-item active">
      <div class="d-flex justify-content-center gap-3">

        <!-- Card 1 -->
        <div class="card" style="width: 18rem;">
          <img src="images/Bolo 1.png" class="card-img-top" alt="Bolo de Morango">
          <div class="card-body text-center">
            <h5 class="card-title">Bolo</h5>
            <p class="card-text">Descrição...</p>
            <a href="#" class="btn btn-rosa">Informações</a>
          </div>
        </div>

        <!-- Card 2 -->
        <div class="card" style="width: 18rem;">
          <img src="" class="card-img-top" alt="Alface">
          <div class="card-body text-center">
            <h5 class="card-title">Alface</h5>
            <p class="card-text">Descrição...</p>
            <a href="#" class="btn btn-rosa">Informações</a>
          </div>
        </div>

        <!-- Card 3 -->
        <div class="card" style="width: 18rem;">
          <img src="" class="card-img-top" alt="Pitaya">
          <div class="card-body text-center">
            <h5 class="card-title">Pitaya</h5>
            <p class="card-text">Descrição...</p>
            <a href="#" class="btn btn-rosa">Informações</a>
          </div>
        </div>

      </div>
    </div>

    <!-- Produtos 2 -->
    <div class="carousel-item">
      <div class="d-flex justify-content-center gap-3">

        <!-- card 4 -->
        <div class="card" style="width: 18rem;">
          <img src="" class="card-img-top" alt="Maçã">
          <div class="card-body text-center">
            <h5 class="card-title">Maçã</h5>
            <p class="card-text">Descrição...</p>
            <a href="#" class="btn btn-rosa">Informações</a>
          </div>
        </div>

        <!-- card 5 -->
        <div class="card" style="width: 18rem;">
          <img src="" class="card-img-top" alt="Banana">
          <div class="card-body text-center">
            <h5 class="card-title">Banana</h5>
            <p class="card-text">Descrição...</p>
            <a href="#" class="btn btn-rosa">Informações</a>
          </div>
        </div>

        <!-- card 6 -->
        <div class="card" style="width: 18rem;">
          <img src="" class="card-img-top" alt="Laranja">
          <div class="card-body text-center">
            <h5 class="card-title">Laranja</h5>
            <p class="card-text">Descrição...</p>
            <a href="#" class="btn btn-rosa">Informações</a>
          </div>
        </div>

      </div>
    </div>

  </div>

  <!-- Controles -->
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselProdutos" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselProdutos" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>
</section>


<section class="qualidade-section-custom p-5 mb-5">
    <div class="container-fluid">
        <div class="row align-items-center mb-4">
            <div class="col-12 col-lg-6 text-start">
                <h1 class="titulo-qualidade-custom TextoManuscrito display-2">Qualidade</h1>
            </div>
            </div>

        <div class="row mb-5">
            <div class="col-12 col-lg-8">
                <p class="lead texto-qualidade-desc">
                    Nossos produtos são feitos com ingredientes selecionados, sabores marcantes e o cuidado de quem ama produzir o melhor. Cada detalhe é pensado para entregar frescor, aroma e uma experiência deliciosa em cada pedaço. Do preparo à finalização, qualidade é o nosso principal ingrediente.
                </p>
            </div>
            
            <div class="col-12 col-lg-4 d-none d-lg-block">
                </div>
        </div>

        <div class="row destaques-grid-custom pt-4">
            
            <div class="col-12 col-md-4 text-center pb-4">
                <h2 class="numero-destaque-custom">100%</h2>
                <p class="texto-destaque-custom">Maior cremosidade garantida: nossos recheios passam por um processo especial que deixa tudo mais macio e saboroso.</p>
            </div>
            
            <div class="col-12 col-md-4 text-center pb-4">
                <h2 class="numero-destaque-custom">100%</h2>
                <p class="texto-destaque-custom">Redução de açúcares artificiais, mantendo o sabor autêntico e equilibrado em cada fatia dos nossos bolos.</p>
            </div>
            
            <div class="col-12 col-md-4 text-center pb-4">
                <h2 class="numero-destaque-custom">100%</h2>
                <p class="texto-destaque-custom">Aumento na seleção de frutas frescas, escolhidas manualmente para garantir mais aroma, cor e qualidade.</p>
            </div>

        </div>

    </div>
    <img src="images/Bolo Qualidade.png" alt="Fatia de bolo com morangos" class="imagem-bolo-qualidade d-none d-md-block">
</div>
</section>

<div class="glace-bottom">
    <img src="images/glace escorrendo.png" alt="Glacê escorrendo">
</div>

    <!-- Sobre Nós -->
  <section id="sobre-nos">
    <h2 class="TextoManuscrito">Profissionais</h2>
    <div class="cards-equipe">

      <!--Amanda -->
      <div class="card-equipe">
        <img src="images/Amanda.jpeg" alt="Foto da integrante Amanda" class="foto-perfil">
        <h2 class="TextoManuscrito">Amanda</h2>
        <p>
         Texto, Texto, Texto, Texto, Texto, Texto, Texto, Texto, Texto, Texto, Texto, Texto, Texto, Texto, Texto, Texto
        </p>
      </div>

       <!--Emanuele -->
      <div class="card-equipe">
        <img src="images/Emanueli.jpeg" alt="Foto da integrante Emanuele" class="foto-perfil">
        <h2 class="TextoManuscrito">Emanuele</h2>
        <p>
           Texto, Texto, Texto, Texto, Texto, Texto, Texto, Texto, Texto, Texto, Texto, Texto, Texto, Texto, Texto, Texto
        </p>
      </div>

      <!-- Isabela -->
      <div class="card-equipe">
        <img src="Images/Isabela.jpeg" alt="Foto da integrante Isabela" class="foto-perfil">
        <h2 class="TextoManuscrito">Isabela</h2>
        <p>
          Texto, Texto, Texto, Texto, Texto, Texto, Texto, Texto, Texto, Texto, Texto, Texto, Texto, Texto, Texto, Texto
      </div>

      <!-- Kamilla-->
      <div class="card-equipe">
        <img src="images/Kamilla.jpg" alt="Foto da integrante Kamilla" class="foto-perfil">
       <h2 class="TextoManuscrito">Kamilla</h2>
        <p>
           Texto, Texto, Texto, Texto, Texto, Texto, Texto, Texto, Texto, Texto, Texto, Texto, Texto, Texto, Texto, Texto
        </p>
      </div>

    </div>
  </section>



  <div class="foto-centro-container">
    <img src="images/foto em grupo.png" class="foto-centro" alt="Foto especial">
</div>
<section id= empresa>
<section class="secao-nossa-empresa">
    <h2 class="TextoManuscrito">Nossa Empresa</h2>

    <div class="linha linha-superior">
        <div class="conteudo texto-esquerda">
            <p>Nossa história começou com um sonho doce: criar um espaço acolhedor, cheio de charme e feito para encantar. Aqui, cada detalhe foi pensado para receber nossos clientes com carinho e proporcionar uma experiência inesquecível desde o primeiro olhar.</p>

        </div>
        <div class="conteudo imagem-direita">
            <img src="images/Empresa 1.png" alt="Fachada da Confeitaria Girls Group">
        </div>
    </div>

    <div class="linha linha-inferior">
        <div class="conteudo imagem-esquerda">
            <img src="images/Empresa 2.png" alt="Interior da Confeitaria Girls Group">
        </div>
        <div class="conteudo texto-direita">
            <p>Por dentro, nossa confeitaria reúne sabor, dedicação e cuidado em cada receita. Trabalhamos com ingredientes selecionados e técnicas artesanais para garantir produtos frescos e irresistíveis todos os dias. Aqui, tudo é feito com amor.</p>
        </div>
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