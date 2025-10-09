<?php

spl_autoload_register(function ($class) {
    require_once "classes/{$class}.class.php";
});

$Usuario = new Usuario();

// --- Lógica para ADICIONAR ou ALTERAR (btnGravar) ---
if (filter_has_var(INPUT_POST, "btnGravar")):
    // Definição dos dados do formulário
    $Usuario->setnome(filter_input(INPUT_POST, "nome_usuario", FILTER_SANITIZE_STRING));
    $Usuario->setemail(filter_input(INPUT_POST, "email", FILTER_SANITIZE_STRING));
    // A senha deve ser criptografada (assumindo que o `set` fará isso ou que o `add`/`update` gerenciará se for um campo opcional)
    $Usuario->setsenha(filter_input(INPUT_POST, "senha", FILTER_SANITIZE_STRING)); 
    $Usuario->setpapel(filter_input(INPUT_POST, "papel", FILTER_SANITIZE_STRING));
    $id_usuario = filter_input(INPUT_POST, 'id_usuario');


    if (empty($id_usuario)):
        // Adicionar novo usuário
        if ($Usuario->add()) {
            echo "<script>window.alert('Cadastrado com sucesso.');window.location.href='apaUsuario.php';</script>";
        } else {
            echo "<script>window.alert('Erro ao cadastrar.');window.open(document.referrer,'_self');</script>";
        }
    else:
        // Alterar usuário existente
        if ($Usuario->update('id_usuario', $id_usuario)) {
            echo "<script> window.alert('Usuário alterado com sucesso.');window.location.href='apaUsuario.php'; </script>";
        } else {
            echo "<script> window.alert('Erro ao alterar o usuário.');window.open(document.referrer, '_self'); </script>";
        }

    endif;

// --- Lógica para DELETAR (btnDeletar) ---
elseif (filter_has_var(INPUT_POST, "btnDeletar")):
    $id_usuario = intval(filter_input(INPUT_POST, "id_usuario"));
    if ($Usuario->delete("id_usuario", $id_usuario)) {
        header("location:apaUsuario.php");
    } else {
        echo "<script>window.alert('Erro ao Excluir');window.open(document.referrer,'_self');</script>";
    }

// --- Lógica para ALTERAR SENHA (btnAltSenha) ---
elseif (filter_has_var(INPUT_POST, 'btnAltSenha')):
    // Garante que a sessão está iniciada para acessar dados do usuário logado
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    
    // 1. Define o nome do usuário a partir da sessão para identificação
    if (isset($_SESSION['user_name'])) {
        $Usuario->setnome($_SESSION['user_name']); 
    } else {
        // Se não houver nome na sessão, não é possível prosseguir
        echo "<script>window.alert('Erro: Usuário não identificado na sessão.'); window.location.href='apaUsuario.php';</script>";
        exit;
    }
    
    $senhaNova = filter_input(INPUT_POST, 'senha'); // Nova senha
    $confirmaNova = filter_input(INPUT_POST,'confirma'); // Confirmação da nova senha
    
    // 2. Verifica se a nova senha e a confirmação são iguais
    if($senhaNova != $confirmaNova){
        echo  
        "<script>
            window.alert('Senha e Confirmação diferentes.'); 
            window.open(document.referrer,'_self');
        </script>";
    } else {
        // Define a nova senha no objeto Usuario (para ser usada pelo método alterarSenha)
        $Usuario->setsenha($senhaNova);
        $senhaAtual = filter_input(INPUT_POST, 'senhaAtual'); // Senha atual (para validação)
        
        // 3. Chama o método de alteração, passando a senha atual para verificação
        if($Usuario->alterarSenha($senhaAtual)){
            echo "<script>
                window.alert('Senha alterada com sucesso.'); 
                window.location.href='apaUsuario.php';
            </script>";
        } else {
            // Se a alteração falhar (provavelmente senha atual incorreta)
            echo "<script>
                window.alert('Erro ao alterar a senha. Verifique a senha atual.'); 
                window.open(document.referrer,'_self');
            </script>";
        }
    }

// --- Lógica para ALTERAR E-MAIL (btnAltEmail) ---
elseif (filter_has_var(INPUT_POST, 'btnAltEmail')):
    // Assume que 'nome' e 'senha' são usados para reautenticação antes de atualizar o e-mail
    $Usuario->setnome(filter_input(INPUT_POST, 'nome'));
    $Usuario->setsenha(filter_input(INPUT_POST, 'senha'));
    $Usuario->setemail(filter_input(INPUT_POST, 'email'));
    
    $resultado = $Usuario->atualiza_email(); // Assume o método 'atualiza_email'
    
    if ($resultado === true) {
        echo "<script>
            window.alert('E-mail alterado com sucesso.'); 
            window.location.href='apaUsuario.php';
        </script>";
    } else {
        // $resultado pode ser uma mensagem de erro retornada pelo método
        echo "<script>
            window.alert('{$resultado}'); 
            window.open(document.referrer,'_self');
        </script>";
    }
endif;
