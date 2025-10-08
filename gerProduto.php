<?php
// Bloco PHP de inicialização no topo
spl_autoload_register(function ($class) {
    // Certifique-se de que o caminho 'classes/' está correto
    require_once "classes/{$class}.class.php";
});

// Inicialização de variáveis
$Produto = null;
$id_produto = null;

// Instancia a classe Categoria e busca todos os registros
$c = new Categoria();
$categorias = $c->all();
if (!is_array($categorias)) {
    $categorias = []; // Garante que seja um array vazio se não houver categorias
}

// 1. Lógica de Edição: Carrega o produto se um ID for enviado para edição
if (filter_has_var(INPUT_POST, "btnEditar")):
    $edtProduto = new Produto();
    $id_produto = intval(filter_input(INPUT_POST, "id_produto"));
    // Assume que o método search retorna um objeto ou null
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
            
            <!-- NOVO AGRUPAMENTO 1: Nome do Produto e Categoria -->
            <div class="row g-3">
                
                <!-- CAMPO 1: Nome do Produto -->
                <div class="col-md-6">
                    <label for="nome_produto" class="form-label">Nome</label>
                    <input type="text" name="nome_produto" id="nome_produto" placeholder="Digite o nome do produto" required
                        class="form-control" value="<?php print $Produto->nome_produto ?? null; ?>">
                </div>

                <!-- CAMPO 2: Seleção de Categoria (CORRIGIDO ALINHAMENTO) -->
                <div class="col-md-6">
                    <label for="id_categoria" class="form-label">Categoria</label>
                    <select name="id_categoria" id="id_categoria" class="form-control select-rosa-claro" required>
                        <option value="">Selecione a Categoria</option>
                        <?php if (empty($categorias)): ?>
                            <!-- MENSAGEM DE DIAGNÓSTICO -->
                            <option value="" disabled style="color: red;">ATENÇÃO: A tabela 'categoria' está vazia!</option>
                            <!-- FIM DA MENSAGEM DE DIAGNÓSTICO -->
                        <?php else: ?>
                            <?php foreach ($categorias as $cat): ?>
                                <?php
                                    // Verifica se o produto está sendo editado e se a categoria atual deve ser selecionada
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

            <!-- NOVO AGRUPAMENTO 2: Descrição e Unidade de Medida -->
            <div class="row g-3 mt-3">
                <!-- CAMPO 3: Descrição -->
                <div class="col-md-6">
                    <label for="descricao" class="form-label">Descrição</label>
                    <input type="text" name="descricao" id="descricao" placeholder="Digite a descrição do produto"
                        required class="form-control" value="<?php print $Produto->descricao ?? null; ?>">
                </div>
                
                <!-- CAMPO 5: Unidade de Medida -->
                <div class="col-md-6">
                    <label for="unidade_medida" class="form-label">Unidade de Medida</label>
                    <input type="text" name="unidade_medida" id="unidade_medida"
                        placeholder="Digite a unidade de medida" required class="form-control"
                        value="<?php print $Produto->unidade_medida ?? null; ?>">
                </div>
            </div>

            <!-- NOVO AGRUPAMENTO 3: Preço -->
            <div class="row g-3 mt-3">
                <!-- CAMPO 4: Preço -->
                <div class="col-md-6">
                    <label for="preco" class="form-label">Preço</label>
                    <input type="text" name="preco" id="preco" placeholder="Digite o preço do produto" required
                        class="form-control" value="<?php print $Produto->preco ?? null; ?>">
                </div>
                <!-- Coluna vazia para alinhar o preço à esquerda -->
                <div class="col-md-6"></div> 
            </div>

            <div class="col-12 mt-4">
                <!-- Botão usa a classe btn-light -->
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
