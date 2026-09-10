<?php
spl_autoload_register(function ($class) {
    require_once __DIR__ . "/../Classes/{$class}.class.php";
});
$_catObj = new Categoria();
$_cats   = $_catObj->all();
?>
<nav class="navbar navbar-expand-lg sticky-top" style="background-color: #de9ca4;">
  <div class="container-fluid">

    <a class="navbar-brand" href="index.php">
      <img src="images/Logo.png" alt="Logo da empresa" style="width: 100px; height: auto;" />
    </a>

    <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCat"
      aria-controls="navbarCat" aria-expanded="false" aria-label="Alternar navegação">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarCat">
      <ul class="navbar-nav gap-4">

        <?php if (!empty($_cats)): ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white fw-semibold" href="#" role="button"
            data-bs-toggle="dropdown" aria-expanded="false">
            Categorias
          </a>
          <ul class="dropdown-menu">
            <?php foreach ($_cats as $_cat): ?>
              <li>
                <a class="dropdown-item"
                   href="categorias.php?id=<?php echo (int)$_cat->id_categoria; ?>">
                  <?php echo htmlspecialchars($_cat->nome_categoria); ?>
                </a>
              </li>
            <?php endforeach; ?>
          </ul>
        </li>
        <?php endif; ?>

      </ul>
    </div>
  </div>
</nav>

<div class="navbar-backdrop"></div>
