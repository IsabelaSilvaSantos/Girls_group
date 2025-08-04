<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/layoutProduto.css">
    <title>Cadastro de Produtos</title>
</head>

<body>
    <header>
        <?php require_once "_parts/_menuAdmin.php"; ?>
    </header>
    <main class="container">
        <h3>Cadastro de Produtos</h3>
        <?php
        spl_autoload_register(function ($class){
            require_once "classes/{$class}.class.php";
        });
        if(filter_has_var(INPUT_POST, "id")):
            $edtProduto = new Produto();
            $id = intval(filter_input(INPUT_POST, "id"));
            $Produto = $edtProduto->search("id", $id);
            
        endif;
        ?>

        <form action="dbProduto.php" method="post" class="row g3 mt-3">

            <input type="hidden" value="<?php echo $Produto->id ?? null; ?>" name="id">
            <div class="col-md-6 mt-3">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" placeholder="Digite seu nome" required class="form-control"
                value="<?php print $Produto->nome ?? null;?>">
            </div>
            <div class="col-md-5 mt-3">
                <label for="descricao">Descrição</label>
                <input type="text" name="descricao" id="descricao" placeholder="Digite a descricao do produto" required
                    class="form-control" value="<?php print $Produto->descricao ?? null;?>" >
            </div>
            <div class="col-md-6 mt-3">
                <label for="preco">Preço</label>
                <input type="text" name="preco" id="preco" placeholder="Digite o preço do produto" required
                    class="form-control" value="<?php print $Produto->preco ?? null;?>">
            </div>
            <div class="col-md-3 mt-3">
                <label for="unidadeMedida">Unidade de Medida</label>
                <input type="text" name="unidadeMedida" id="unidadeMedida" placeholder="Digite a unidade de medida" required
                 class="form-control" value="<?php print $Produto->unidadeMedida ?? null;?>">
            </div>
            <div class="col-12 mt-3">
                <button type="submit" class="btn btn-dark" name="btnGravar">Enviar</button>
            </div>
        </form>
    </main>
    <footer>
        <?php require_once "_parts/_footer.php"; ?>
    </footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>

</html>