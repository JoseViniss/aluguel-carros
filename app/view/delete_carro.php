<?php
    require_once '../../config/conexao.php';
    require_once '../../app/controller/CarroController.php';

    $controller = new CarroController($pdo);
    $controller->delete($_GET['id']);
    header("Location: ../../index.php");
?>