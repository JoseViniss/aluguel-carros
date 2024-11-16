<?php
    require_once '../../config/conexao.php';
    require_once '../../app/controller/AluguelController.php';

    $controller = new AluguelController($pdo);
    $controller->delete($_GET['id']);
    header("Location: ../../index.php");
?>