<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/baseAdmin.css">
    <title>Cadastro de Usuário</title>

</head>

<body>

    <main class="container">

        <h3>Cadastro do usuário</h3>

        <form>
            <div class="col-md-12">
                <label for="inputNome" class="col-sm-12 col-form-label">Nome</label>
                <div class="col-sm-6">
                    <input type="nome" class="form-control" id="inputNome">
                </div>

                <div class="col-md-12">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-6">
                        <input type="email" class="form-control" id="inputEmail3">
                    </div>


                    <div class="col-md-3">
                        <label for="inputSenha" class="col-sm-2 col-form-label">Senha</label>
                        <div class="col-sm-10"> 
                            <input type="senha" class="form-control" id="inputSenha">
                        </div>

                        <div class="cool-12 mt-3">
                            <label for="papel">Papel na empresa</label>
                            
                            <select id="papel" name="papel" required>
                                <option value="">Selecione</option>
                                <option value="admin">Administrador</option>
                                <option value="gerente">Gerente</option>
                                <option value="tecnico">Técnico</option>
                                <option value="financeiro">Financeiro</option>
                                <option value="rh">Recursos Humanos</option>
                            </select>
                            </div>

                            <div class="cool-12 mt-3">
                            <button type="submit" class="btn btn-dark">Cadastrar</button>
                            </div>
                            
                     

        </form>



    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>