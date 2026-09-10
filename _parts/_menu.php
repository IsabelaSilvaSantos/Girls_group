<?php
spl_autoload_register(function ($class) {
  require_once __DIR__ . "/../Classes/{$class}.class.php";
});
$_catObj = new Categoria();
$_cats = $_catObj->all();
?>
<nav class="navbar navbar-expand-lg sticky-top" style="background-color: #de9ca4; z-index: 1030;">
  <div class="container-fluid">

    <a class="navbar-brand" href="index.php">
      <img src="images/Logo.png" alt="Logo da empresa" style="width: 100px; height: auto;" />
    </a>

    <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu"
      aria-controls="navbarMenu" aria-expanded="false" aria-label="Alternar navegação">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarMenu">
      <ul class="navbar-nav gap-4 me-auto">

        <li class="nav-item">
          <a class="nav-link text-white fw-semibold" href="index.php">Início</a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white fw-semibold" href="index.php#sobre-nos">Sobre</a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white fw-semibold" href="index.php#produtos">Produtos</a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white fw-semibold" href="index.php#empresa">Estrutura</a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white fw-semibold" href="categorias.php">Categorias</a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white fw-semibold" href="gerLogin.php">Entrar</a>
        </li>

      </ul>
    </div>
  </div>
</nav>

<div class="navbar-backdrop"></div>