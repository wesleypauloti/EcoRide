<?php
session_start();

$nomeUsuario = "Visitante";
$idUsuario;
$idAluguel;

if (isset($_SESSION['usuario'])) {
    $usuario = $_SESSION['usuario'];
    $idUsuario = $usuario['id'];
    $nomeUsuario = $usuario['nome'];
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../../Estilos/carros.css">
    <link rel="stylesheet" href="../../Estilos/HeaderFooter.css">

    <title>Editar Alugueis</title>
</head>
<body style="padding: 1px">
    <header>
        <h1>Atualizar Reserva</h1>
    </header>
        <script>
            setaMarcaModelo();   
        </script>
    <?php
    include_once '../Controller/ControllerUser.php';
    $userController = new ControllerUser();
    
    if(isset($_GET['id'])){
        $idAluguel = $_GET['id'];

        if (isset($_POST['marca'])) {
            echo 'Ok';
            $userController->updateCar($idAluguel);
        }
    }
    ?>

<script src="../../script.js"></script>

<div class="main" style="margin: 1px">
        <div class="container" style="min-height: 90vh">
            <h1 style="text-align: center"><?php echo $nomeUsuario; ?></h1>
            <form name="form1" style="margin-top: 10px; text-align: center" method="post" id="formAluguel" action="">
                <label for="marca">Selecione a marca do carro:</label>
                <select name="marca" id="marca" name="marca" value="marca2">
                    <option value="marca1" data-valor="100">Toyota</option>
                    <option value="marca2" data-valor="120" selected>Ford</option>
                    <option value="marca3" data-valor="110">Honda</option>
                    <option value="marca4" data-valor="90">Chevrolet</option>
                    <option value="marca5" data-valor="130">Volkswagen</option>
                    <option value="marca6" data-valor="110">Nissan</option>
                </select>
                <?php
                ?>

                <label for="carro">Selecione o modelo do carro:</label>
                <select name="carro" id="carro"></select>
                
                <label for="data-retirada">Data de Retirada:</label>
                <input type="date" name="data-retirada" id="data-retirada" min="<?php echo date('Y-m-d'); ?>" required value="<?php echo date('Y-m-d'); ?>">
                <label for="dias">Quantos dias você deseja alugar o carro:</label>
                <input type="number" name="dias" id="dias" required value="1" min="1">

                <input type="hidden" name="id" value="<?php echo "id: $idAluguel"; ?>">

                <div id="resultado-preco"></div>
                    <input type="hidden" name="nomeUsuario" id="nomeUsuario" value="<?php echo $nomeUsuario; ?>">
                    <input type="hidden" name="valorTotal" id="valorTotal" value="">
                    <input type="button" value="Calcular Preço" onclick="calcularPreco();">
                    <input type="submit" class="update" name="Submit" value="Atualizar" onclick="atualizarRegistro()"/>
                    <input type="button" value="Voltar" class="btn-voltar" onclick="window.location.href='view-cars.php';">
                </div>
                <script>
                    function atualizarRegistro() {
                        calcularPreco();
                        window.location.href = '../Controller/processar_update_aluguel.php?id=' + <?php echo $_GET['id']; ?>;
                    }
                </script>
                
            </form>            
        </div>
    </div>    
    <footer>
        <p>&copy; 2023 EcoRide Locação de Carros Elétricos</p>
    </footer>
</body>
</html>