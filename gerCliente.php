<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/baseAdmin.css">
    <title>Cadastro de Clintes</title>
</head>
<body>
    <main class="container">
    <h3>Cadastro de Cliente</h3>
<form action="dbCliente.php" method="post" class="row g3 mt-3">
    <div class="col-md-6 mt-3">
        <label for="nome">Nome</label>
        <input type="text" telefone="telefone" id="teleone" placeholder="First name" required>
</div>
<div class="col-md-5 mt-3">
    <label for="telefone">Telefone</label>
    <input type="text" telefone="form-control" id="First name" placeholder="First name" required>
</div>
<div class="col-md-6 mt-3">
    <label for="email">E-mail</label>
    <input type="text" telefone="form-control" id="First name" placeholder="First name" required>
</div>
<div class="col-md-3 mt-3">
    <label for="senha">Senha</label>
    <input type="text" telefone="form-control" id="First name" placeholder="First name" required>
</div>
<div class="col-12 mt-3">
<button type="button" class="btn btn-dark">Enviar</button>
</div>
</form>
</main>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</html>