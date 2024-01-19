<?php
session_start();

$nomeUsuario = "Visitante";
$idUsuario;

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
        <link rel="stylesheet" href="../../Estilos/style_processar_cadastro.css">
        <link rel="stylesheet" href="../../Estilos/HeaderFooter.css">
        <link rel="stylesheet" href="../../Estilos/consulta.css">
        <link rel="stylesheet" href="../../Estilos/carros.css">
        <title>Lista de Aluguéis</title>
    </head>
    <body style="padding: 30px">
    <header style="margin-left: -30px; margin-top: -40px">
        <h1>Suas Reservas</h1>
    </header>
    <?php

    include_once '../Models/Crud.php';
    $crud = new Crud();

    if (isset($_SESSION['usuario'])) {

        // Consulta SQL para verificar se há registros na tabela alugueis para este usuário
        $query = "SELECT * FROM alugueis WHERE idUsuario = '$idUsuario'";
        $resultAlugueis = $crud->getData($query);

        if ($resultAlugueis && count($resultAlugueis) > 0) {
            // Se há registros, imprima os dados do aluguel
            echo "<table style='margin-top: 100px'>";
            echo "<tr>
            <th>IdAluguel</th>
            <th>NomeCliente</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Data de Retirada</th>
            <th>Valor Total</th>
            <th>Quantidade de Dias</th>
            <th class='acoes'>Ações</th>
            </tr>";
            foreach ($resultAlugueis as $aluguel) {
                echo "<tr>";
                echo "<td>" . $aluguel['id'] . "</td>";
                echo "<td>" . $usuario['nome'] . "</td>";
                echo "<td>" . $aluguel['marca'] . "</td>";
                echo "<td>" . $aluguel['modelo'] . "</td>";
                echo "<td>" . date('d/m/Y', strtotime($aluguel['dataLocacao'])) . "</td>";
                echo "<td>" . $aluguel['valorTotal'] . "</td>";
                echo "<td style='width: 5vw'>" . $aluguel['qtdDias'] . "</td>";

                echo "<td><a href=\"delete-car.php?id={$aluguel['id']}\" onCLick=\"return confirm('Tem certeza que deseja Cancelar esta Reserva?')\">
                <img src='../../Imagens/remover.png' alt='Deletar' title='Deletar registro'></a> ";
                echo '<a href="edit-cars.php?id=' . $aluguel['id'] . '"><img src="../../Imagens/atualizar.png" alt="Atualizar" title="Atualizar registro"></a> ';
                echo '<a href="add-cars.php"><img src="../../Imagens/inserir.png" alt="Inserir" title="Inserir registro"></a></td>';
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<h1 style='text-align: center; margin-top: 200px;'>Você não tem reservas atualmente.</h1>";

        }
    }           
    ?>
    <script>
        function confirmarExclusao(id) {
            if (confirm('Tem certeza que deseja cancelar esta reserva?')) {
                window.location.href = 'delete-car.php';
            }
        }
    </script>
    <a class='btn-voltar' href="add-cars.php" style="margin-bottom: 50px; width: 15vw; margin-left: 40vw">Voltar</a>
    <footer style="margin-left: -30px; margin-bottom: 0px;">
        <p>&copy; 2023 EcoRide Locação de Carros Elétricos</p>
    </footer>
    </body>
</html>