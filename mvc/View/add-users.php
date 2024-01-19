<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../../Estilos/style.css">

    <title>Cadastro</title>
</head>

<body>
<?php

    include_once '../Controller/ControllerUser.php';
    $userController = new ControllerUser();

    if(isset($_POST['Submit'])){
        echo '<script>';
        echo 'window.alert("Cadastro realizado com sucesso!");';
        echo 'window.location.href = "login.php";';
        echo '</script>';
        $userController->addUser();
    }
    
    if(isset($_GET['id'])){
        $idAluguel = $_GET['id'];

        if (isset($_POST['marca'])) {
            $userController->updateCar($idAluguel);
        }
    }
    
?>
    <header>
        <h1>Cadastro</h1>
    </header>
    <main>
        <form method="post" name="addUser" action="">
            <h2>Cadastre-se para Alugar um Carro Elétrico</h2>
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="telefone">Telefone:</label>
            <input type="text" id="telefone" name="telefone" required>
            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required>
            <input type="submit" name="Submit" value="Cadastrar">
        </form>
        <a href="../../login.php" class="btn-voltar">Voltar</a>
    </main>
    <footer>
    <p>&copy; 2023 EcoRide Locação de Carros Elétricos</p>
    </footer>
</body>

</html>