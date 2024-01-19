<?php
session_start();

$nomeUsuario = "Visitante";
$idUsuario;

if (isset($_SESSION['usuario'])) {
    $usuario = $_SESSION['usuario'];
    $idUsuario = $usuario['id'];
    $nomeUsuario = $usuario['nome'];
}

include_once '../Controller/ControllerUser.php';
$userController = new ControllerUser();

if(isset($_POST['marca'])) {
    echo '<script>';
    echo 'window.alert("Reserva feita com sucesso!");';
    echo 'window.location.href = "../View/view-cars.php";</script>';
    $userController->addCars($idUsuario);

} else {
    echo 'Erro ao reservar um carro.<br><br>';
    echo '<a href="add-cars.php">Voltar</a>';
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../../Estilos/carros.css">
    <link rel="stylesheet" href="../../Estilos/HeaderFooter.css">

    <title>Escolha de Carro</title>
</head>

<body>
    <header>
        <h1>Carros Elétricos</h1>
    </header>
    <div class="main">
        <div class="container">
            <h1 style="text-align: center">Escolha seu carro
                <?php echo $nomeUsuario; ?>
            </h1>
            <form id="formAluguel" name="addCar" action="" style="margin-top: 10px; text-align: center" method="post">
                <label for="marca">Selecione a marca do carro:</label>
                <select name="marca" id="marca" name="marca" value="marca2">
                    <option value="marca1" data-valor="100">Toyota</option>
                    <option value="marca2" data-valor="120" selected>Ford</option>
                    <option value="marca3" data-valor="110">Honda</option>
                    <option value="marca4" data-valor="90">Chevrolet</option>
                    <option value="marca5" data-valor="130">Volkswagen</option>
                    <option value="marca6" data-valor="110">Nissan</option>
                </select>

                <label for="carro">Selecione o modelo do carro:</label>
                <select name="carro" id="carro">                    
                </select>
                
                <label for="data-retirada">Data de Retirada:</label>
                <input type="date" name="data-retirada" id="data-retirada" min="<?php echo date('Y-m-d'); ?>" required value="<?php echo date('Y-m-d'); ?>">
                <label for="dias">Quantos dias você deseja alugar o carro:</label>
                <input type="number" name="dias" id="dias" required value="1" min="1">
                <div id="resultado-preco"></div>
                <input type="hidden" name="nomeUsuario" id="nomeUsuario" value="<?php echo $nomeUsuario; ?>">
                <input type="hidden" name="valorTotal" id="valorTotal" value="">
                <input type="button" value="Calcular Preço" onclick="calcularPreco();">
                <input type="submit" value="Confirmar Aluguel" onclick="calcularPreco();">
                <input type="button" value="Voltar" class="btn-voltar" onclick="window.location.href='login.php';">
            </form>
        </div>
        <input type="button" value="Consultar suas Reservas" class="btnConsultar" onclick="window.location.href='view-cars.php';">
    </div>

    <script src="../../script.js"></script>
    <footer>
        <p>&copy; 2023 EcoRide Locação de Carros Elétricos</p>
    </footer>
</body>

</html>