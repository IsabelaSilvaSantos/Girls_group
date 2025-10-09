<?php
require_once "verifica_usuario.php";
?>

<?php

spl_autoload_register(function ($class) {
    require_once "classes/{$class}.class.php";
});

$Produto = null;
$id_produto = null;
$c = new Categoria();
$categorias = $c->all();
if (!is_array($categorias)) {
    $categorias = [];
}

if (filter_has_var(INPUT_POST, "btnEditar")):
    $edtProduto = new Produto();
    $id_produto = intval(filter_input(INPUT_POST, "id_produto"));
    $Produto = $edtProduto->search("id_produto", $id_produto);
endif;
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="CSS/layoutGer.css">
    <title>Cadastro de Produtos</title>

</head>

<body>
    <header>
        <?php require_once "_parts/_menuAdmin.php"; ?>
    </header>
    <main class="container">
        <h3 class="text-center">Cadastro de Produtos</h3>

        <form action="dbProduto.php" method="post" class="row g3 mt-1">

            <input type="hidden" value="<?php echo $Produto->id_produto ?? null; ?>" name="id_produto">
            <div class="row g-3">

                <div class="col-md-6">
                    <label for="nome_produto" class="form-label">Nome</label>
                    <input type="text" name="nome_produto" id="nome_produto" placeholder="Digite o nome do produto"
                        required class="form-control" value="<?php print $Produto->nome_produto ?? null; ?>">
                </div>

                <div class="col-md-6">
                    <label for="id_categoria" class="form-label">Categoria</label>
                    <select name="id_categoria" id="id_categoria" class="form-control select-rosa-claro" required>
                        <option value="">Selecione a Categoria</option>
                        <?php if (empty($categorias)): ?>
                            <option value="" disabled style="color: red;">ATENÇÃO: A tabela 'categoria' está vazia!</option>
                        <?php else: ?>
                            <?php foreach ($categorias as $cat): ?>
                                <?php
                                $selected = (!empty($Produto) && $Produto->id_categoria == $cat->id_categoria) ? 'selected' : '';
                                ?>
                                <option value="<?php echo $cat->id_categoria; ?>" <?php echo $selected; ?>>
                                    <?php echo $cat->nome_categoria; ?>
                                </option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>
            </div>

            <div class="row g-3 mt-3">
                <div class="col-md-6">
                    <label for="descricao" class="form-label">Descrição</label>
                    <textarea name="descricao" id="descricao" placeholder="Digite a descrição do produto." required
                        class="form-control" rows="4"><?php print $Produto->descricao ?? ''; ?></textarea>
                </div>

                <div class="col-md-6">
                    <label for="unidade_medida" class="form-label">Unidade de Medida</label>
                    <input type="text" name="unidade_medida" id="unidade_medida"
                        placeholder="Digite a unidade de medida" required class="form-control"
                        value="<?php print $Produto->unidade_medida ?? null; ?>">
                </div>
            </div>

            <div class="row g-3 mt-3">
                <div class="col-md-6">
                    <label for="preco" class="form-label">Preço</label>
                    <input type="text" name="preco" id="preco" placeholder="Digite o preço do produto" required
                        class="form-control" value="<?php print $Produto->preco ?? null; ?>">
                </div>
                <div class="col-md-6"></div>
            </div>

            <div class="col-12 mt-4">
                <button type="submit" class="btn btn-light" name="btnGravar">Enviar</button>
            </div>
        </form>
    </main>
    <footer>
        <?php require_once "_parts/_footer.php"; ?>
    </footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>

</html>