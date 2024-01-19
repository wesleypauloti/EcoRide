<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../../Estilos/HeaderFooter.css">
    <link rel="stylesheet" href="../../Estilos/index.css">

    <title>Locação de Carros Elétricos - Login</title>
</head>

<?php
include_once '../Controller/ControllerUser.php';
include_once '../Models/Crud.php';

$userController = new ControllerUser();
$crud = new Crud();
?>

<header>
    <h1>Seja Bem Vindo!</h1>
</header>
<div class="main">
    <h1>EcoRide</h1>
    <p>Locação de Carros Elétricos</p>
    <button class="entrar" onclick="window.location.href='login.php';">
    Entrar
    <img src="../../Imagens/conecte-se.png" alt="Entrar">
</button>
</div>
<footer>
    <p>&copy; 2023 EcoRide Locação de Carros Elétricos</p>
</footer>
</body>

</html>