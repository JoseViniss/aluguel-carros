<?php

    require_once '../../../config/conexao.php';
    require_once '../../../app/controller/CarroController.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $controller = new CarroController($pdo);
        $controller->create($_POST['nome'], $_POST['modelo'], $_POST['ano'], $_POST['cor'], $_POST['preco'], $_POST['marca']);
        header("Location: ../../../index.php");
    }

?>

<h1>Criar Carro</h1>
<form method="POST">

    <p>
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required>
    </p>

    <p>
        <label for="modelo">Modelo:</label>
        <input type="text" name="modelo" required>
    </p>

    <p>
        <label for="ano">Ano:</label>
        <input type="number" name="ano" required>
    </p>

    <p>
        <label for="cor">Cor:</label>
        <input type="text" name="cor" required>
    </p>

    <p>
        <label for="preco">Preço do aluguel (Dia):</label>
        <input type="number" name="preco"  step="0.010" required>
    </p>

    <p>
        <label for="marca">Marca:</label>
        <input type="text" name="marca" required>
    </p>

    <button type="submit">Salvar</button>
</form>