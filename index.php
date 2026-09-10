<?php
spl_autoload_register(function ($class) {
    require_once "Classes/{$class}.class.php";
});

try {
    $prodObj = new Produto();
    $produtos_vitrine = $prodObj->getVitrine(6);
} catch (Exception $e) {
    $produtos_vitrine = [];
}

$slides = array_chunk($produtos_vitrine, 3);
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="images/Logo.png" type="image/x-icon" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="CSS/index.css" />
  <title>Girls Group</title>
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

  <section id="produtos">
    <h2 class="TextoManuscrito text-center">Produtos</h2>

    <?php if (!empty($slides)): ?>
    <div id="carouselProdutos" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000" data-bs-pause="false">
      <div class="carousel-inner">

        <?php foreach ($slides as $idx => $grupo): ?>
        <div class="carousel-item <?php echo $idx === 0 ? 'active' : ''; ?>">
          <div class="d-flex justify-content-center gap-3 flex-wrap">

            <?php foreach ($grupo as $prod):
              if (!empty($prod->nome_imagem_principal) && file_exists("images/" . $prod->nome_imagem_principal)) {
                  $img_src = "images/" . htmlspecialchars($prod->nome_imagem_principal);
              } else {
                  $img_src = "images/bolo.png";
              }
              $preco_fmt = !empty($prod->preco) ? "R$ " . number_format((float)$prod->preco, 2, ',', '.') : "";
            ?>
            <div class="card vitrine-card">
              <img src="<?php echo $img_src; ?>" class="card-img-top vitrine-card-img" alt="<?php echo htmlspecialchars($prod->nome_produto); ?>">
              <div class="card-body text-center">
                <h5 class="card-title"><?php echo htmlspecialchars($prod->nome_produto); ?></h5>
                <p class="card-text"><?php echo htmlspecialchars($prod->descricao); ?></p>
                <?php if ($preco_fmt): ?>
                <p class="fw-bold"><?php echo $preco_fmt; ?></p>
                <?php endif; ?>
                <a href="categorias.php?id=<?php echo (int)$prod->id_categoria; ?>" class="btn btn-rosa">Ver mais</a>
              </div>
            </div>
            <?php endforeach; ?>

          </div>
        </div>
        <?php endforeach; ?>

      </div>

      <?php if (count($slides) > 1): ?>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselProdutos" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselProdutos" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
      </button>
      <?php endif; ?>
    </div>

    <?php else: ?>
    <div class="d-flex justify-content-center gap-3 flex-wrap mb-4">
      <div class="card vitrine-card">
        <img src="images/bolo.png" class="card-img-top vitrine-card-img" alt="Bolo">
        <div class="card-body text-center">
          <h5 class="card-title">Bolos</h5>
          <p class="card-text">Bolos artesanais</p>
          <a href="categorias.php" class="btn btn-rosa">Ver mais</a>
        </div>
      </div>
      <div class="card vitrine-card">
        <img src="images/dunuts.png" class="card-img-top vitrine-card-img" alt="Dunuts">
        <div class="card-body text-center">
          <h5 class="card-title">Dunuts</h5>
          <p class="card-text">Dunuts de todos os sabores</p>
          <a href="categorias.php" class="btn btn-rosa">Ver mais</a>
        </div>
      </div>
      <div class="card vitrine-card">
        <img src="images/macarons.png" class="card-img-top vitrine-card-img" alt="Macarons">
        <div class="card-body text-center">
          <h5 class="card-title">Macarons</h5>
          <p class="card-text">Macarons gourmet</p>
          <a href="categorias.php" class="btn btn-rosa">Ver mais</a>
        </div>
      </div>
    </div>
    <?php endif; ?>
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
            Nossos produtos são feitos com ingredientes selecionados, sabores marcantes e o cuidado de quem ama
            produzir o melhor. Cada detalhe é pensado para entregar frescor, aroma e uma experiência deliciosa em
            cada pedaço. Do preparo à finalização, qualidade é o nosso principal ingrediente.
          </p>
        </div>
        <div class="col-12 col-lg-4 d-none d-lg-block"></div>
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
  </section>

  <div class="glace-bottom">
    <img src="images/glace escorrendo.png" alt="Glacê escorrendo">
  </div>

  <section id="sobre-nos">
    <h2 class="TextoManuscrito">Profissionais</h2>
    <div class="cards-equipe">

      <div class="card-equipe">
        <img src="images/Amanda.jpeg" alt="Foto da integrante Amanda" class="foto-perfil">
        <h2 class="TextoManuscrito">Amanda</h2>
        <p>Amanda ficou responsável pela implementação da página de Usuário, da listagem de usuários e da página de Login. Seu trabalho garantiu uma navegação segura, funcional e intuitiva para os usuários.</p>
      </div>

      <div class="card-equipe">
        <img src="images/Emanueli.jpeg" alt="Foto da integrante Emanuele" class="foto-perfil">
        <h2 class="TextoManuscrito">Emanuele</h2>
        <p>Emanueli ficou responsável pela implementação da página de catálogo, da página referente a produtos, da listagem de produtos, do cadastro de produtos, bem como da folha de estilo (CSS) aplicada a essas interfaces.</p>
      </div>

      <div class="card-equipe">
        <img src="images/Isabela.jpeg" alt="Foto da integrante Isabela" class="foto-perfil">
        <h2 class="TextoManuscrito">Isabela</h2>
        <p>Isabela ficou responsável pela implementação das interfaces relacionadas à página de categorias, página de cadastro de categorias, página de listagem de categorias, página de cadastro de fotos de produtos, página de listagem de fotos de produtos, página de produtos por categoria e pela folha de estilo (CSS) aplicada a essas telas.</p>
      </div>

      <div class="card-equipe">
        <img src="images/Kamilla.jpg" alt="Foto da integrante Kamilla" class="foto-perfil">
        <h2 class="TextoManuscrito">Kamilla</h2>
        <p>Kamilla ficou responsável pela implementação da página inicial (index) e do protótipo no Canva, da página de cadastro de empresas, da página de listagem de empresas, bem como da folha de estilo (CSS) aplicada à página inicial e às páginas relacionadas às empresas.</p>
      </div>

    </div>
  </section>

  <div class="foto-centro-container">
    <img src="images/foto em grupo.png" class="foto-centro" alt="Foto especial">
  </div>

  <section id="empresa">
    <section class="secao-nossa-empresa">
      <h2 class="TextoManuscrito">Nossa Empresa</h2>

      <div class="linha linha-superior">
        <div class="conteudo texto-esquerda">
          <p>Nossa história começou com um sonho doce: criar um espaço acolhedor, cheio de charme e feito para
            encantar. Aqui, cada detalhe foi pensado para receber nossos clientes com carinho e proporcionar uma
            experiência inesquecível desde o primeiro olhar.</p>
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
          <p>Por dentro, nossa confeitaria reúne sabor, dedicação e cuidado em cada receita. Trabalhamos com
            ingredientes selecionados e técnicas artesanais para garantir produtos frescos e irresistíveis todos os
            dias. Aqui, tudo é feito com amor.</p>
        </div>
      </div>
    </section>

    <div>
      <h2 class="TextoManuscrito">Localização</h2>
      <div class="mapa-container">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3909.999850372924!2d-61.38241022562322!3d-11.479935931604729!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x93c826519e7eca21%3A0x9c3ad57fa8cc996d!2sInstituto%20Federal%20de%20Rond%C3%B4nia%20-%20C%C3%A2mpus%20Cacoal!5e0!3m2!1spt-BR!2sbr!4v1756738790493!5m2!1spt-BR!2sbr"
          width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </div>
  </section>

  <footer>
    <?php require_once "_parts/_footer.php" ?>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
  <script>
  document.addEventListener('click', function(e) {
    if (e.target.classList.contains('navbar-backdrop')) {
      var collapse = document.querySelector('.navbar-collapse.show');
      if (collapse) bootstrap.Collapse.getInstance(collapse).hide();
    }
  });
  </script>
</body>

</html>
