<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="CSS/layoutIsa.css">
    
    <title>Cadastro de Clintes</title>
</head>
<body>
    <header>
        <?php require_once "_parts/_menuAdmin.php"; ?>
    </header>
    <main class="container">
        <h3 class="text-center">Cadastro de Clientes</h3>
        <?php
spl_autoload_register(function ($class){
    require_once "classes/{$class}.class.php";
});

if (filter_has_var(INPUT_POST, "id")):
    $edtCliente = new Cliente(); // Corrigido aqui
    $id = intval(filter_input(INPUT_POST, "id"));
    $Cliente = $edtCliente->search("id", $id);
endif;
?>

    <form action="dbCliente.php" method="post" class="row g-4 mt-3">
    <input type="hidden" value="<?php echo $Cliente->id ?? null;?>" name="id">
        
       <div class="row g-4"> <div class="col-md-6">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" name="nome" id="nome" placeholder="Digite seu nome" required 
                class="form-control" value="<?php print $Cliente->nome ?? null;?>">
            </div>
            <div class="col-md-6">
                <label for="telefone" class="form-label">Telefone</label>
                <input type="text" name="telefone" id="telefone" placeholder="Digite seu telefone" required
                    class="form-control" value="<?php print $Cliente->telefone ?? null;?>">
            </div>
        </div>

        <div class="row g-4 mt-4"> <div class="col-md-6">
                <label for="email" class="form-label">E-mail</label>
                <input type="text" name="email" id="email" placeholder="Digite seu e-mail" required
                    class="form-control" value="<?php print $Cliente->email ?? null;?>">
            </div>
            <div class="col-md-6">
                <label for="senha" class="form-label">Senha</label>
                <input type="password" name="senha" id="senha" placeholder="Digite sua senha" required 
                class="form-control" value="<?php print $Cliente->senha ?? null;?>">
            </div>
        </div>

        <div class="col-12 mt-4">
            <button type="submit" class="btn btn-dark" name="btnGravar">Enviar</button>
        </div>
    </form>
</main>
    <footer>
    <?php require_once "_parts/_footer.php" ?>
  </footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>

</html>