<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"> 
    <link rel="stylesheet" href="CSS/layoutGer.css">
    <title>Adicionar/Editar Foto do Produto</title>
</head>

<body>
    <header>
        <?php require_once "_parts/_menu.php"; ?>
    </header>
    <main class="container">
        <?php
        // Ajuste o autoloader para sua pasta 'Classes' se necessário.
        spl_autoload_register(function ($class) {
            require_once "classes/{$class}.class.php";
        });

        $idProduto = null;
        $foto = null;
        $produto = new Produto(); 

        // Lógica de Edição: Recebe idFoto do POST/GET
        if (filter_has_var(INPUT_POST, 'btnEditar') || filter_has_var(INPUT_GET, 'idFoto')):
            $f = new FotoProduto();
            $idFoto = intval(filter_input(INPUT_POST, 'idFoto') ?? filter_input(INPUT_GET, 'idFoto'));
            $foto = $f->search('id_foto', $idFoto);
            $idProduto = $foto->id_produto;
        
        // Lógica de Novo Cadastro: Recebe idProduto do GET
        elseif (filter_has_var(INPUT_GET, 'idProduto')):
           $idProduto = filter_input(INPUT_GET, 'idProduto', FILTER_VALIDATE_INT);
        endif;

        // Busca o nome do Produto para exibir no título
        $dadosProduto = $produto->search('id_produto', $idProduto); 
        ?>

        <div class="titutlo mt-3">
            <h3><?php echo empty($foto) ? 'Adicionar Nova Foto' : 'Editar Foto'; ?> para: <?php echo $dadosProduto->nome_produto ?? 'Produto Desconhecido'; ?></h3>
        </div>
        
        <form method="post" action="dbFotoProduto.php" class="row g-3 mt-3" enctype="multipart/form-data">
            
            <input type="hidden" name="idProduto" value="<?php echo $idProduto ?? null; ?>">
            <input type="hidden" name="idFoto" value="<?php echo $foto->id_foto ?? null; ?>">
            <input type="hidden" name="fotoAntiga" value="<?php echo $foto->nome_arquivo ?? null; ?>">
            
            <div class="col-md-6 mt-3">
                <label for="legenda" class="form-label">Legenda</label>
                <input type="text" name="legenda" id="legenda" placeholder="Digite a legenda da foto" required class="form-control" value="<?php echo $foto->legenda ?? null; ?>">
            </div>
            
            <div class="col-md-6 mt-3">
                <label for="textoAlt" class="form-label">Texto alternativo</label>
                <input type="text" name="textoAlt" id="textoAlt" placeholder="Descreva a foto para acessibilidade"
                    required class="form-control" value="<?php echo $foto->texto_alternativo ?? null; ?>">
            </div>
            
           <div class="col-12 mt-4 text-center">
                <label for="foto" class="form-label d-block mb-3">Selecione a Foto</label>
                <label for="foto" class="custom-file-upload">
                    <i class="bi bi-folder-fill"></i> Escolher Arquivo
                </label>
                <input type="file" name="foto" id="foto" class="input-file-hidden" accept=".png, .jpg, .jpeg" 
                       <?php echo empty($foto->id_foto) ? 'required' : null ?>>
                
                <div id="file-name" class="file-name-display">
                    <?php 
                        // Exibe o nome do arquivo atual (se houver) ou um placeholder
                        echo !empty($foto->nome_arquivo) ? htmlspecialchars($foto->nome_arquivo) : 'Nenhum arquivo selecionado.'; 
                    ?>
                </div>
<div class="col-12 mt-4 mb-3">
 <button type="submit" name="btnGravar" class="btn btn-info-custom me-3">
 <i class="bi bi-save"></i> 

                    <?php 
                        // Alterna o texto: Cadastrar Foto ou Gravar Alterações
                        echo empty($foto->id_foto) ? 'Cadastrar' : 'Gravar'; 
                    ?>
</button>

<a href="listagemFotos.php?idProduto=<?php echo $idProduto; ?>" class="btn btn-info-custom">
<i class="bi bi-x-circle"></i> Cancelar
 </a>
 </div>
 </form>
            </div>
        </form>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('foto').addEventListener('change', function() {
            var fileName = this.files[0] ? this.files[0].name : 'Nenhum arquivo selecionado.';
            document.getElementById('file-name').textContent = fileName;
        });
    </script>
    <footer>
        <?php require_once("_parts/_footer.php"); ?>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>