<?php

    require_once '../../../config/conexao.php';
    require_once '../../../app/controller/AluguelController.php';

    $controller = new AluguelController($pdo);
    $aluguel = $controller->readOne($_GET['id']);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $controller->update($aluguel['idAluguel'], $_POST['data_fim'], $_POST['preco'], $_POST['pagamento']);
        header("Location: ../../../index.php");
    }
?>

<h1>Editar dados do aluguel</h1>
<form method="POST">

    <p>
        <label for="data_fim">Data da entrega:</label>
        <input type="date" name="data_fim" min="2024-11-16" required>
    </p>

    <p>
        <label for="forma_pagamento">Forma de pagamento:</label>
        <select name="forma_pagamento" id="forma_pagamento">
            <option value="PIX">Pix</option>
            <option value="CREDITO">Cartão de crédito</option>
            <option value="DÉBITO">Cartão de débito</option>
            <option value="BOLETO">Boleto bancário</option>
        </select>
    </p>

    <p>
        <label for="preco">Preço total:</label>
        <input type="number" name="preco" required>
    </p>

    <button type="submit">Salvar</button>
</form>
