<nav class="navbar navbar-expand-lg sticky-top" style="background-color: #de9ca4;">
  <div class="container-fluid d-flex align-items-center justify-content-between">
    <a class="navbar-brand" href="IdexAdmin.php">
      <img src="images/Logo.png" alt="Logo da empresa" style="width: 100px; height: auto;" />
    </a>

    <div class="d-flex align-items-center gap-3">

      <div class="nav-item dropdown" data-bs-display="static">
        <a class="nav-link dropdown-toggle text-white fw-semibold icon-no-focus p-0" href="#"
          id="navbarDropdownUserIcon" role="button" data-bs-toggle="dropdown" aria-expanded="false"
          title="Opções de Conta">
          <i class="bi bi-person-circle fs-4"></i>
        </a>
        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-custom" aria-labelledby="navbarDropdownUserIcon">
          <li><a class="dropdown-item" href="alterar_email.php"><i class="bi bi-envelope-fill me-2"></i>Alterar
              E-mail</a></li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li><a class="dropdown-item" href="alterar_senha.php"><i class="bi bi-key-fill me-2"></i>Alterar Senha</a>
          </li>
        </ul>
      </div>

      <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Alternar navegação">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav gap-4 me-auto align-items-lg-center">
        <li class="nav-item"><a class="nav-link text-white fw-semibold" href="cadastroFotoProduto.php">Categorias</a>
        </li>
        <li class="nav-item"><a class="nav-link text-white fw-semibold" href="apaCliente.php">Clientes</a></li>
        <li class="nav-item"><a class="nav-link text-white fw-semibold" href="apaEmpresa.php">Empresa</a></li>
        <li class="nav-item"><a class="nav-link text-white fw-semibold" href="">Página Inicial</a></li>
        <li class="nav-item"><a class="nav-link text-white fw-semibold" href="apaProdutos.php">Produto</a></li>
        <li class="nav-item"><a class="nav-link text-white fw-semibold" href="apaUsuario.php">Usuário</a></li>
        <li class="nav-item dropdown ms-auto d-none d-lg-block">
          <a class="nav-link dropdown-toggle text-white fw-semibold icon-no-focus me-4" href="#"
            id="navbarDropdownUserIconDesktop" role="button" data-bs-toggle="dropdown" aria-expanded="false"
            title="Opções de Conta">
            <i class="bi bi-person-circle fs-4"></i>
          </a>
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-custom"
            aria-labelledby="navbarDropdownUserIconDesktop">
            <li><a class="dropdown-item" href="altEmail.php"><i class="bi bi-envelope-fill me-2"></i>Alterar E-mail</a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="altSenha.php"><i class="bi bi-key-fill me-2"></i>Alterar Senha</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="navbar-backdrop"></div>