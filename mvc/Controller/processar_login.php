<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Estilos/style_processar_cadastro.css">
    <title>Processamento de Cadastro</title>
</head>

<body>
    <div class="container">

        <?php

        include_once '../Models/Crud.php';
        $crud = new Crud();

        if (isset($_POST['email']) && isset($_POST['senha'])) {
            $email = strtolower($_POST['email']);
            $senha = $_POST['senha'];

            // Consulta SQL para buscar informações do usuário com base no email
            $query = "SELECT * FROM cadastrosusuarios WHERE email = '$email'";
            $result = $crud->getData($query);

            // Verifica se encontrou algum usuário com o email fornecido
            if ($result && count($result) > 0) {
                $usuario = $result[0];  // Assume que o email é único e pega o primeiro resultado

                // Verifica se a senha fornecida corresponde à senha armazenada no banco de dados
                if ($senha == $usuario['senha']) {
                    // As credenciais são válidas, faça o que for necessário (por exemplo, redirecionar)
                    $nome = $usuario['nome'];
                    $idUsuario = $usuario['id'];
                    session_start();
                    $_SESSION['usuario'] = $usuario;
                    echo '<script>window.alert("Bem-vindo, ' . $nome . '!");';

                    echo 'window.location.href = "../View/add-cars.php";</script>';

                    date_default_timezone_set('America/Sao_Paulo');

                    $logUsuario = "logUsuario.txt";
                    $dataHora = date("d/m/Y H:i:s"); // Formatando a data e hora
                    $logEntry = "Usuário: $nome - Data/Hora do Login: $dataHora\n";

                    file_put_contents($logUsuario, $logEntry, FILE_APPEND);

                    exit;

                } else {
                    // Senha incorreta
                    echo '<script> window.alert("Senha incorreta");';
                    echo 'window.location.href = "../View/login.php";</script>';
                }
            } else {
                // Email não encontrado
                echo '<script> window.alert("Email não cadastrado");';
                echo 'window.location.href = "../View/login.php";</script>';
            }
        }
        ?>

        <a href="../View/login.php">Voltar à página de login</a>
    </div>
</body>

</html>