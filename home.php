<?php

include 'start/protect.php';

require_once 'config/conexao.php';
require_once 'app/controller/CarroController.php';
require_once 'app/models/Carro.php';

    $controller = new CarroController($pdo);
    $carros = $controller->readAlugaveis();
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        Bem vindo, <?php echo $_SESSION['nome']; ?>!
        <a href="start/logout.php">Sair</a>
        <a href="app/view/cliente/alugueis.php">Meus alugueis</a>
        <h1>Cliente</h1>

        <ul>
            <?php foreach($carros as $carro): ?>
            <li>
                <a href="app/view/cliente/alugar.php?id=<?= $carro['idCarro'] ?>">
                    <?= $carro['nome'] ?>
                    <?= $carro['modelo'] ?>
                    <?= $carro['ano'] ?>
                    <?= $carro['cor'] ?>
                    <?= $carro['preco_diaria'] ?>
                    <?= $carro['marca'] ?>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>

    </body>
</html>

