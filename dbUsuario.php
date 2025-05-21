<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
    $papel = $_POST['papel'];

    try {
        $pdo = new PDO("mysql:host=localhost;dbname=gilrs_group", "usuario", "senha");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO cadastro_usuario (usuario, email, senha, papel) VALUES (:usuario, :email, :senha, :papel)";
        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            ':usuario' => $usuario,
            ':email' => $email,
            ':senha' => $senha,
            ':papel' => $papel
        ]);

        echo "Usuário cadastrado com sucesso.";
    } catch (PDOException $e) {
        echo "Erro ao cadastrar usuário. " . $e->getMessage();
    }
}
?>