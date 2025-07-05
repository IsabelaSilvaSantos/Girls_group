<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/layoutLogin.css">
    <title>Tela de Login</title>
</head>
<body>
    
    <main class="container mt-5">
        <h3>Login</h3>

    
        <form action="validarLogin.php" method="post">
            <div class="mb-3 col-md-10">
                <label for="inputnome" class="form-label">Usuário</label>
                <input type="text" name="nome" id="nome" placeholder="Digite o usuário"required
                    class="form-control">
            </div>

            <div class="mb-3 col-md-10">
                <label for="inputSenha" class="form-label">Senha</label>
                 <input type="password" name="Senha" id="Senha" placeholder="Digite a senha"required
                    class="form-control">
            </div>

            <div class="col-12 mt-3">
                <button type="submit" class="btn btn-dark" name="btnGravar">Efetuar Login</button>
            </div>
        </form>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>