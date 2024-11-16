<?php

include 'start/protect.php';

require_once 'config/conexao.php';
require_once 'app/controller/CarroController.php';
require_once 'app/models/Carro.php';


$controller = new CarroController($pdo);
$carros = $controller->read();

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
        <a href="app/view/admin/alugueis.php">Alugueis</a>
        <a href="app/view/admin/criar.php">Criar Carro</a>
        
        <h1>Administrador</h1>

        <ul>
            <?php foreach($carros as $carro): ?>
            <li>
                <?= $carro['nome'] ?>
                <?= $carro['modelo'] ?>
                <?= $carro['ano'] ?>
                <?= $carro['cor'] ?>
                <?= $carro['preco_diaria'] ?>
                <?= $carro['marca'] ?>
            </li>
            
            <a href="app/view/admin/editar.php?id=<?= $carro['idCarro'] ?>">Editar</a>
            <a href="app/view/delete_carro.php?id=<?= $carro['idCarro'] ?>">Deletar</a>


            <?php endforeach; ?>
        </ul>

    </body>
</html>
