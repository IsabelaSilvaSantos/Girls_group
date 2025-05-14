<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/baseAdmin.css">
    <title>Document</title>
</head>
<body>
    <main class="container">
<form action="dbCliente.php" method="post" class="row g3 mt-3">
    <div class="col-md-6">
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" class="form-control">
</div>
<div class="col-md-6">
    <label for="telefone">Telefone</label>
    <input type="text" telefone="telefone" class="form-control">
</div>
<div class="col-md-6">
    <label for="email">E-mail</label>
    <input type="text" telefone="email" class="form-control">
</div>
<div class="col-md-3">
    <label for="senha">Senha</label>
    <input type="text" senha="senha" class="form-control">
</div>
<div class="col-12">
    <button type="submit" name="btnGravar"
    id="btnGravar" class="btn
    btn-outline-primary">Gravar</button>
</div>
</form>
</main>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</html>