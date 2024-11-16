<?php

    include '../../../start/protect.php';

    require_once '../../../config/conexao.php';
    require_once '../../../app/controller/AluguelController.php';
    require_once '../../../app/controller/CarroController.php';

    $controller1 = new CarroController($pdo);
    $carro = $controller1->readOne($_GET['id']);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $data_inicio = new DateTime($_POST['data_inicio']);
        $data_fim = new DateTime($_POST['data_fim']);

        $dateInterval = $data_inicio->diff($data_fim);
        $preco_total = $dateInterval->days * $carro['preco_diaria'];

        $controller = new AluguelController($pdo);
        $controller->create($carro['idCarro'], $_SESSION['id'], $_POST['data_inicio'], $_POST['data_fim'], $preco_total, $_POST['forma_pagamento']);
        header("Location: ../../../index.php");
    }

?>

<h1>Aluguel do Veículo <?php echo $carro['marca']." ".$carro['nome']?></h1>
<form method="POST">

    <p>
        <label for="data_inicio">Data do aluguel:</label>
        <input type="date" name="data_inicio" min="2024-11-16" required>
    </p>

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

    <button type="submit">Salvar</button>
</form>
