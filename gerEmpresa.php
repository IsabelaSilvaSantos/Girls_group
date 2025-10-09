<?php
require_once "verifica_usuario.php";
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="CSS/layoutGer.css">
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

        $Empresa = new Empresa();

        if (filter_has_var(INPUT_POST, "id_empresa")):
            $id_empresa = intval(filter_input(INPUT_POST, "id_empresa"));
            $empresaEncontrada = $Empresa->search("id_empresa", $id_empresa);

            if ($empresaEncontrada) {
                $Empresa->setid_empresa($empresaEncontrada->id_empresa);
                $Empresa->setNome($empresaEncontrada->nome_empresa);
                $Empresa->setEndereco($empresaEncontrada->endereco);
                $Empresa->setEmail($empresaEncontrada->email);
                $Empresa->setTelefone($empresaEncontrada->telefone);
                $Empresa->setNomeFantasia($empresaEncontrada->nome_fantasia);
                $Empresa->setRazaoSocial($empresaEncontrada->razao_social);
                $Empresa->setCnpj($empresaEncontrada->cnpj);
                $Empresa->setprincipalAtividade($empresaEncontrada->principal_atividade);
                $Empresa->sethistoria($empresaEncontrada->historia);
                $Empresa->setapresentacao($empresaEncontrada->apresentacao);
            }
        endif;
        ?>

        <form action="dbEmpresa.php" method="post" class="row g-3 mt-1">
            <input type="hidden" value="<?php echo $Empresa->getid_empresa() ?? null; ?>" name="id_empresa">
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="nome_empresa" class="form-label">Nome</label>
                    <input type="text" name="nome_empresa" id="nome_empresa" placeholder="Digite o nome da empresa"
                        required class="form-control" value="<?= $Empresa->getNome() ?? '' ?>">
                </div>
                <div class="col-md-6">
                    <label for="telefone" class="form-label">Telefone</label>
                    <input type="text" name="telefone" id="telefone" placeholder="Digite o telefone da empresa" required
                        class="form-control" value="<?= $Empresa->getTelefone() ?? '' ?>">
                </div>
            </div>

            <div class="row g-4 mt-1">
                <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" placeholder="Digite o email da empresa" required
                        class="form-control" value="<?= $Empresa->getEmail() ?? '' ?>">
                </div>
                <div class="col-md-6">
                    <label for="nome_fantasia" class="form-label">Nome Fantasia</label>
                    <input type="text" name="nome_fantasia" id="nome_fantasia"
                        placeholder="Digite o nome fantasia da empresa" required class="form-control"
                        value="<?= $Empresa->getNome_fantasia() ?? '' ?>">
                </div>
            </div>

            <div class="row g-4 mt-1">
                <div class="col-md-6">
                    <label for="endereco" class="form-label">Endereço</label>
                    <input type="text" name="endereco" id="endereco" placeholder="Digite o endereço da empresa" required
                        class="form-control" value="<?= $Empresa->getEndereco() ?? '' ?>">
                </div>
                <div class="col-md-6">
                    <label for="cnpj" class="form-label">CNPJ</label>
                    <input type="text" name="cnpj" id="cnpj" placeholder="Digite o CNPJ da empresa" required
                        class="form-control" value="<?= $Empresa->getCnpj() ?? '' ?>">
                </div>
            </div>

            <div class="row g-4 mt-1">
                <div class="col-md-6">
                    <label for="razao_social" class="form-label">Razão Social</label>
                    <input type="text" name="razao_social" id="razao_social"
                        placeholder="Digite a razão social da empresa" required class="form-control"
                        value="<?= $Empresa->getRazao_social() ?? '' ?>">
                </div>
                <div class="col-md-6">
                    <label for="principal_atividade" class="form-label">Principal Atividade</label>
                    <input type="text" name="principal_atividade" id="principal_atividade"
                        placeholder="Digite a principal atividade da empresa" required class="form-control"
                        value="<?= $Empresa->getprincipal_atividade() ?? '' ?>">
                </div>
            </div>

            <div class="row g-4 mt-1">
                <div class="col-md-6">
                    <label for="historia" class="form-label">História da Empresa</label>
                    <input type="text" name="historia" id="historia" placeholder="Digite a história da empresa" required
                        class="form-control" value="<?= $Empresa->gethistoria() ?? '' ?>">
                </div>
                <div class="col-md-6">
                    <label for="apresentacao" class="form-label">Apresentação da Empresa</label>
                    <input type="text" name="apresentacao" id="apresentacao"
                        placeholder="Digite a apresentação da empresa" required class="form-control"
                        value="<?= $Empresa->getapresentacao() ?? '' ?>">
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