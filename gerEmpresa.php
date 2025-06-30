<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/layoutkami.css">
    <title>Cadastro da Empresa</title>
    </head>
    <body>
        <header>
        <?php require_once "_parts/_menu.php"; ?>
    </header>

    
    <main class="container">
    
    
    <h3>Cadastro da Empresa</h3>

        <form action="dbEmpresa.php" method="post" class="row g3 mt-3">
            <div class="col-md-6 mt-3">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" placeholder="Digite o nome da empresa" required
                    class="form-control">
                  </div>

                <div class="col-md-6 mt-3">
                    <label for="telefone">Telefone</label>
                    <input type="text" name="telefone" id="telefone" placeholder="Digite o telefone da empresa"required
                    class="form-control">
            </div>
            <div class="col-md-6 mt-3">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" placeholder="Digite o email da empresa"required
                    class="form-control">
               </div>
               <div class="col-md-6 mt-3">
                    <label for="nomeFantasia">Nome Fantasia</label>
                    <input type="text" name="nomeFantasia" id="nomeFantasia" placeholder="Digite o nome fantasia da empresa"required
                    class="form-control">
                   </div>
                   
                   
                   <div class="col-md-6 mt-3">
                    <label for="endereco">Endereço</label>
                    <input type="text" name="endereco" id="endereco" placeholder="Digite o endereço da empresa"required
                    class="form-control">
                   </div>
                   
                   <div class="col-md-6  mt-3">
                    <label for="cnpj">CNPJ</label>
                    <input type="text" name="cnpj" id="cnpj" placeholder="Digite o CNPJ da empresa"required
                    class="form-control">
                   </div>

                   <div class="col-md-6 mt-3">
                    <label for="rasaoSocial">Razão Social</label>
                    <input type="text" name="razaoSocial" id="razaoSocial" placeholder="Digite a razão social da empresa"required
                    class="form-control">
                   </div>

                   <div class="col-md-6 mt-3">
                    <label for="principalAtividade">Principal Atividade</label>
                    <input type="text" name="principalAtividade" id="principalAtividade" placeholder="Digite a principal atividade da empresa"required
                    class="form-control">
                    </div>

                    <div class="col-md-6 mt-3">
                    <label for="hitoria">História da Empresa</label>
                    <input type="text" name="hitoria" id="hitoria" placeholder="Digite a hitoria da empresa"required
                    class="form-control">
                    </div>
                    
                    <div class="col-md-6 mt-3">
                    <label for="apresentacao">Apresentação da Empresa</label>
                    <input type="text" name="apresentacao" id="apresentacao" placeholder="Digite a apresentação da empresa"required
                    class="form-control">
                    </div>
                    
                     <div class= "cool-12 mt-3"> 
                        <button type="submit" class="btn btn-dark" name="button" >Cadastrar</button>

               </div>
        </form>
        </main>

    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</html>