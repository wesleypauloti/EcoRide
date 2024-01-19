<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Estilos/style.css">
    <title>Login</title>
</head>
<body>
    <header>
        <h1>Faça o Login</h1>
    </header>
    <main>
        <form action="../Controller/processar_login.php" method="post">
            <h2>Login</h2>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required>
            <input type="submit" value="Entrar">
        </form>
        <a href="add-users.php">Não tem uma conta? Cadastre-se</a>
        <p><a href="recuperar_senha.php">Esqueceu a senha?</a></p>
        <input type="button" value="Voltar" class="btn-voltar" onclick="window.location.href='home.php';">
    </main>
    <footer>
        <p>&copy; 2023 EcoRide Locação de Carros Elétricos</p>
    </footer>
</body>
</html>
