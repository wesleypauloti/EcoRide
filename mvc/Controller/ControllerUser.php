<?php

include_once '../Models/Crud.php';
include_once '../Models/Validation.php';

$userController = new ControllerUser();

class ControllerUser{
    private $crud;
    private $validation;

    public function __construct(){
        $this->crud = new Crud();
        $this->validation = new Validation();
    }

    public function addUser(){
        $nome = $this->crud->escape_string($_POST['nome']);
        $email = $this->crud->escape_string($_POST['email']);
        $telefone= $this->crud->escape_string($_POST['telefone']);
        $senha= $this->crud->escape_string($_POST['senha']);

        $msg = $this->validation->check_empty($_POST, array('nome', 'email', 'telefone', 'senha'));
        if ($msg == null){
            $result = $this->crud->execute("INSERT INTO cadastrosusuarios(nome, email, telefone, senha) VALUES('$nome', '$email', '$telefone', '$senha')");
            if ($result){
                echo "";
            }
        else {
            echo "Houve um erro ao tentar alugar!<a href='../View/add-users.php'>Voltar</a>";
        }
        
        }
        
    }

    public function addCars($idUsuario){
        $marca = $_POST['marca'];
        $modelo = $_POST['carro'];
        $dataRetirada = $_POST['data-retirada'];
        $valorTotal = $_POST['valorTotal'];
        $qtdDias = $_POST['dias'];

        $opcoesMarcas = [
            "marca1" => "Toyota",
            "marca2" => "Ford",
            "marca3" => "Honda",
            "marca4" => "Chevrolet",
            "marca5" => "Volkswagen",
            "marca6" => "Nissan"
            ];

        $marca = $opcoesMarcas[$_POST['marca']];
        
        $dataFormatada = date('Y-m-d', strtotime($dataRetirada));

        $query = "INSERT INTO alugueis (idUsuario, marca, modelo, dataLocacao, valorTotal, qtdDias) VALUES ('$idUsuario', '$marca', '$modelo', '$dataFormatada', '$valorTotal', '$qtdDias')";
        
        $crud = new Crud();
        $result = $crud->execute($query);

        if ($result) {
            echo "Aluguel confirmado com sucesso!";
        } else {
            echo '<script>alert("Erro ao salvar os dados no banco de dados.");</script>';
        }
    }

    public function viewUsers(){
        $query = "SELECT * FROM cadastrosusuarios ORDER BY id";
        $result = $this->crud->getData($query);
        return $result;
    }

    public function deleteCar($id){
        $query = "DELETE FROM alugueis WHERE id = $id";
        $result = $this->crud->delete($query);
        if ($result){
            
            echo'<script>window.alert("Registro excluído com sucesso!")</script>;';
            header("Location: ../View/view-cars.php");
        }
    }

    public function updateCar($idAluguel){

        if (isset($_SESSION['usuario'])) {
            $usuario = $_SESSION['usuario'];
            $idUsuario = $usuario['id'];
        }
        $idAluguel = $_GET['id'];
        $marca = $_POST['marca'];

        $opcoesMarcas = [
            "marca1" => "Toyota",
            "marca2" => "Ford",
            "marca3" => "Honda",
            "marca4" => "Chevrolet",
            "marca5" => "Volkswagen",
            "marca6" => "Nissan"
            ];

        $marca = $opcoesMarcas[$_POST['marca']];

        $marca = $this->crud->escape_string($marca);
        $modelo = $this->crud->escape_string($_POST['carro']);
        $dataRetirada= $this->crud->escape_string($_POST['data-retirada']);
        $valorTotal= $this->crud->escape_string($_POST['valorTotal']);
        $qtdDias= $this->crud->escape_string($_POST['dias']);

        $query = "UPDATE alugueis SET idUsuario='$idUsuario', marca='$marca', modelo='$modelo', dataLocacao='$dataRetirada', valorTotal='$valorTotal', qtdDias='$qtdDias' WHERE id='$idAluguel'";

        $result = $this->crud->execute($query);
        
        if ($result){
            echo '<script>';
            echo 'window.alert("Reserva atualizada com sucesso!");';
            echo 'window.location.href = "../View/view-cars.php";';
            echo '</script>';
        }
    }

    public function getUserById($id){
        $id = $this->crud->escape_string($id);

        $query = "SELECT * FROM cadastrosusuarios WHERE id=$id";
        $result = $this->crud->getData($query);

        if(!empty($result)){
            return $result[0];
        }
        else {
            return null;
        }
    }
    public function getIdAluguel($id){
        $id = $this->crud->escape_string($id);

        $query = "SELECT * FROM alugueis WHERE id=$id";
        $result = $this->crud->getData($query);

        if(!empty($result)){
            return $result[0];
        }
        else {
            return null;
        }
    }
}
?>