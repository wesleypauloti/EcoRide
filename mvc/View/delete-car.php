<?php 

include_once '../Controller/ControllerUser.php';
include_once '../Models/Crud.php';
$crud = new Crud();


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $userController = new ControllerUser();    
    
    $userController->deleteCar($id);
    exit;
}
?>
