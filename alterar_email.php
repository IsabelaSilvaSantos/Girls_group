<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="CSS/layoutGer.css"> 
    <title>Alterar E-mail</title>
</head>

<body>
    <header>
        <?php require_once "_parts/_menuAdmin.php"; ?>
    </header>

     <main class="container mt-5">

        <h3 class="text-center">Alterar E-mail</h3>

        <form action="dbUsuario.php" method="post" class="row g3 mt-5">
            
            <div class="row g-3 mb-4"> 
                <div class="col-md-6">
                    <label for="nome" class="form-label">Usuário</label>
                    <input type="text" name="nome" id="nome" placeholder="Digite seu nome de usuário"
                        class="form-control">
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label">Novo E-mail</label>
                    <input type="email" name="email" id="email" placeholder="Digite o novo e-mail"
                        class="form-control">
                </div>
            </div>

            <div class="row g-4 mt-1 mb-5">
                <div class="col-md-6">
                    <label for="senha" class="form-label">Senha</label>
                    <input type="password" name="senha" id="senha" placeholder="Digite sua senha"
                        class="form-control">
                </div>
            </div>

            <div class="col-12 mt-4">
                <button type="submit" class="btn btn-custom-pink" name="btnAltEmail">Alterar</button>
            </div>
        </form>
    </main>


    <footer>
        <?php require_once "_parts/_footer.php"; ?>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>