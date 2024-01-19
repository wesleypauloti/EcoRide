<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Estilos/style.css">
    <title>Recuperar Senha</title>
</head>

<?php
if (isset($_POST['email'])) {
    $email = $_POST['email'];
    
    // Verificar se o valor inserido é um e-mail válido
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo '<script>';
        echo 'window.alert("Enviaremos sua senha através de seu email");';
        echo 'window.location.href = "login.php";</script>';
    } else {
        echo '<script> window.alert("Email inválido");</script>';
    }
}
?>

<body>
    <header>
        <h1>Recuperar Senha</h1>
    </header>
    <main>
        <form action="" method="post">
            <h2>Esqueceu sua senha?</h2>
            <p>Informe seu endereço de e-mail para receber as instruções de recuperação de senha.</p>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <input type="submit" value="Enviar Email de Recuperação">
        </form>
        <a href="login.php">Voltar ao Login</a>
    </main>
    <footer>
        <p>&copy; 2023 EcoRide Locação de Carros Elétricos</p>
    </footer>
</body>

</html>