<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="CSS/layout.css">
    <title>Cadastro da Empresa</title>
</head>

<body>

    <header>
        <?php require_once "_parts/_menuAdmin.php"; ?>
    </header>
    <main class="container">
        <h3 class="text-center">Cadastro da Empresa</h3>
        <?php
        spl_autoload_register(function ($class) {
            require_once "classes/{$class}.class.php";
        });
        if (filter_has_var(INPUT_POST, "id")):
            $edtEmpresa = new Empresa();
            $id = intval(filter_input(INPUT_POST, "id"));
            $Empresa = $edtEmpresa->search("id", $id);

        endif;
        ?>

        <form action="dbEmpresa.php" method="post" class="row g3 mt-3">
            <input type="hidden" value="<?php echo $Empresa->id ?? null; ?>" name="id">
            <div class="row g-4">
                <div class="col-md-6">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" name="nome" id="nome" placeholder="Digite o nome da empresa" required
                        class="form-control" value="<?php print $Empresa->nome ?? null; ?>">
                </div>
                <div class="col-md-6">
                    <label for="telefone" class="form-label">Telefone</label>
                    <input type="text" name="telefone" id="telefone" placeholder="Digite o telefone da empresa" required
                        class="form-control" value="<?php print $Empresa->telefone ?? null; ?>">
                </div>
            </div>

            <div class="row g-4 mt-4">
                <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" name="email" id="email" placeholder="Digite o email da empresa" required
                        class="form-control" value="<?php print $Empresa->email ?? null; ?>">
                </div>
                <div class="col-md-6">
                    <label for="nomeFantasia" class="form-label">Nome Fantasia</label>
                    <input type="text" name="nomeFantasia" id="nomeFantasia"
                        placeholder="Digite o nome fantasia da empresa" required class="form-control"
                        value="<?php print $Empresa->nomeFantasia ?? null; ?>">
                </div>
            </div>

            <div class="row g-4 mt-4">
                <div class="col-md-6">
                    <label for="endereco" class="form-label">Endereço</label>
                    <input type="text" name="endereco" id="endereco" placeholder="Digite o endereço da empresa" required
                        class="form-control" value="<?php print $Empresa->endereco ?? null; ?>">
                </div>
                <div class="col-md-6">
                    <label for="cnpj" class="form-label">CNPJ</label>
                    <input type="text" name="cnpj" id="cnpj" placeholder="Digite o CNPJ da empresa" required
                        class="form-control" value="<?php print $Empresa->cnpj ?? null; ?>">
                </div>
            </div>

            <div class="row g-4 mt-4">
                <div class="col-md-6">
                    <label for="razaoSocial" class="form-label">Razão Social</label>
                    <input type="text" name="razaoSocial" id="razaoSocial"
                        placeholder="Digite a razão social da empresa" required class="form-control"
                        value="<?php print $Empresa->razaoSocial ?? null; ?>">
                </div>
                <div class="col-md-6">
                    <label for="principalAtividade" class="form-label">Principal Atividade</label>
                    <input type="text" name="principalAtividade" id="principalAtividade"
                        placeholder="Digite a principal atividade da empresa" required class="form-control"
                        value="<?php print $Empresa->principalAtividade ?? null; ?>">
                </div>
            </div>

            <div class="row g-4 mt-4">
                <div class="col-md-6">
                    <label for="historia" class="form-label">História da Empresa</label>
                    <input type="text" name="historia" id="historia" placeholder="Digite a historia da empresa" required
                        class="form-control" value="<?php print $Empresa->historia ?? null; ?>">
                </div>
                <div class="col-md-6">
                    <label for="apresentacao" class="form-label">Apresentação da Empresa</label>
                    <input type="text" name="apresentacao" id="apresentacao"
                        placeholder="Digite a apresentação da empresa" required class="form-control"
                        value="<?php print $Empresa->apresentacao ?? null; ?>">
                </div>
            </div>

            <div class="col-12 mt-4">
                <button type="submit" class="btn btn-light" name="btnGravar">Enviar</button>
            </div>
        </form>
    </main>
    <footer>
        <?php require_once "_parts/_footer.php" ?>
    </footer>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>

</html>