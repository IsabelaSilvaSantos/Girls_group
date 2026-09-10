<?php
require_once "verifica_usuario.php";

spl_autoload_register(function ($class) {
    require_once "Classes/{$class}.class.php";
});

$nomeUsuario = htmlspecialchars($_SESSION['nome_usuario'] ?? 'Administrador');
$papel = $_SESSION['papel'] ?? '';
$isAdmin = ($papel === 'Admin');

try {
    $db = Database::getInstance()->getConnection();

    $totalProdutos   = $db->query("SELECT COUNT(*) FROM produto")->fetchColumn();
    $totalCategorias = $db->query("SELECT COUNT(*) FROM categoria")->fetchColumn();
    $totalUsuarios   = $db->query("SELECT COUNT(*) FROM usuario")->fetchColumn();
    $totalEmpresas   = $db->query("SELECT COUNT(*) FROM empresa")->fetchColumn();
    $totalFotos      = $db->query("SELECT COUNT(*) FROM foto_produto")->fetchColumn();

    $ultimosProdutos = $db->query(
        "SELECT p.nome_produto, c.nome_categoria, p.preco
         FROM produto p
         LEFT JOIN categoria c ON c.id_categoria = p.id_categoria
         ORDER BY p.id_produto DESC LIMIT 5"
    )->fetchAll(PDO::FETCH_OBJ);

} catch (Exception $e) {
    $totalProdutos = $totalCategorias = $totalUsuarios = $totalEmpresas = $totalFotos = '—';
    $ultimosProdutos = [];
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="images/Logo.png" type="image/x-icon" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="CSS/LayoutIndexAdmin.css" />
    <title>Painel de Controle | Girls Group</title>
</head>

<body>
    <header>
        <?php require_once "_parts/_menuAdmin.php"; ?>
    </header>

    <div class="container my-4 my-md-5">

        <?php if (isset($_GET['acesso']) && $_GET['acesso'] === 'negado'): ?>
        <div class="alert alert-warning text-center mb-4" role="alert">
            <i class="bi bi-shield-lock-fill me-2"></i>
            <strong>Acesso restrito.</strong> Apenas administradores podem acessar essa página.
        </div>
        <?php endif; ?>

        <div class="mb-4 text-center">
            <h1 class="fw-bold fs-3 fs-md-1">
                <i class="bi bi-house-gear-fill me-2" class="stat-icon-produtos"></i> Painel de Controle
            </h1>
            <p class="text-muted">Bem-vindo(a), <strong><?= $nomeUsuario; ?></strong>! Veja o resumo do sistema abaixo.</p>
        </div>

        <p class="section-title">Resumo geral</p>
        <div class="row g-3 mb-5">

            <div class="col-6 col-md-4 col-lg-2-4">
                <div class="card stat-card stat-card-produtos shadow-sm p-3 text-center h-100">
                    <i class="bi bi-box-seam-fill fs-3 mb-2 stat-icon-produtos"></i>
                    <div class="stat-number stat-num-produtos"><?= $totalProdutos ?></div>
                    <div class="text-muted small mt-1">Produtos</div>
                </div>
            </div>

            <div class="col-6 col-md-4 col-lg-2-4">
                <div class="card stat-card stat-card-categorias shadow-sm p-3 text-center h-100">
                    <i class="bi bi-tags-fill fs-3 mb-2 stat-icon-categorias"></i>
                    <div class="stat-number stat-num-categorias"><?= $totalCategorias ?></div>
                    <div class="text-muted small mt-1">Categorias</div>
                </div>
            </div>

            <div class="col-6 col-md-4 col-lg-2-4">
                <div class="card stat-card stat-card-usuarios shadow-sm p-3 text-center h-100">
                    <i class="bi bi-people-fill fs-3 mb-2 stat-icon-usuarios"></i>
                    <div class="stat-number stat-num-usuarios"><?= $totalUsuarios ?></div>
                    <div class="text-muted small mt-1">Usuários</div>
                </div>
            </div>

            <div class="col-6 col-md-4 col-lg-2-4">
                <div class="card stat-card stat-card-empresas shadow-sm p-3 text-center h-100">
                    <i class="bi bi-building-fill fs-3 mb-2 stat-icon-empresas"></i>
                    <div class="stat-number stat-num-empresas"><?= $totalEmpresas ?></div>
                    <div class="text-muted small mt-1">Empresas</div>
                </div>
            </div>

            <div class="col-6 col-md-4 col-lg-2-4">
                <div class="card stat-card stat-card-fotos shadow-sm p-3 text-center h-100">
                    <i class="bi bi-images fs-3 mb-2 stat-icon-fotos"></i>
                    <div class="stat-number stat-num-fotos"><?= $totalFotos ?></div>
                    <div class="text-muted small mt-1">Fotos</div>
                </div>
            </div>

        </div>

        <!-- Acesso rápido -->
        <p class="section-title">Acesso rápido</p>
        <div class="row g-4 justify-content-center mb-5">

            <div class="col-12 col-sm-6 col-lg-3">
                <a href="apaCategoria.php" class="text-decoration-none">
                    <div class="card h-100 border-0 shadow-sm text-center p-4 admin-card">
                        <div class="mb-3"><i class="bi bi-tags-fill fs-1 icon-categorias"></i></div>
                        <h5 class="fw-semibold">Categorias</h5>
                        <p class="text-muted small mb-0">Gerenciar categorias de produtos</p>
                    </div>
                </a>
            </div>

            <div class="col-12 col-sm-6 col-lg-3">
                <a href="apaProdutos.php" class="text-decoration-none">
                    <div class="card h-100 border-0 shadow-sm text-center p-4 admin-card">
                        <div class="mb-3"><i class="bi bi-box-seam-fill fs-1 icon-produtos"></i></div>
                        <h5 class="fw-semibold">Produtos</h5>
                        <p class="text-muted small mb-0">Cadastrar e editar produtos</p>
                    </div>
                </a>
            </div>

            <div class="col-12 col-sm-6 col-lg-3">
                <a href="apaEmpresa.php" class="text-decoration-none">
                    <div class="card h-100 border-0 shadow-sm text-center p-4 admin-card">
                        <div class="mb-3"><i class="bi bi-building-fill fs-1 icon-empresas"></i></div>
                        <h5 class="fw-semibold">Empresa</h5>
                        <p class="text-muted small mb-0">Dados e informações da empresa</p>
                    </div>
                </a>
            </div>

            <?php if ($isAdmin): ?>
            <div class="col-12 col-sm-6 col-lg-3">
                <a href="apaUsuario.php" class="text-decoration-none">
                    <div class="card h-100 border-0 shadow-sm text-center p-4 admin-card">
                        <div class="mb-3"><i class="bi bi-people-fill fs-1 icon-usuarios"></i></div>
                        <h5 class="fw-semibold">Usuários</h5>
                        <p class="text-muted small mb-0">Gerenciar usuários do sistema</p>
                    </div>
                </a>
            </div>
            <?php endif; ?>
        </div>

        <?php if (!empty($ultimosProdutos)): ?>
        <p class="section-title">Últimos produtos cadastrados</p>
        <div class="card border-0 shadow-sm mb-5">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="thead-rosa">
                        <tr>
                            <th class="ps-3">Produto</th>
                            <th>Categoria</th>
                            <th class="text-end pe-3">Preço</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($ultimosProdutos as $p): ?>
                        <tr>
                            <td class="ps-3"><?= htmlspecialchars($p->nome_produto) ?></td>
                            <td><?= htmlspecialchars($p->nome_categoria ?? '—') ?></td>
                            <td class="text-end pe-3">R$ <?= number_format($p->preco, 2, ',', '.') ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php endif; ?>

        <div class="row g-3 justify-content-center">
            <div class="col-12 col-sm-6 col-lg-4">
                <a href="index.php" class="btn w-100 btn-pagina-inicial">
                    <i class="bi bi-house-door-fill me-2"></i>Ver Página Inicial
                </a>
            </div>
        </div>

    </div>

    <footer>
        <?php require_once "_parts/_footer.php"; ?>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
