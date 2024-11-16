
<?php

include '../../../start/protect.php';

require_once '../../../config/conexao.php';
require_once '../../../app/controller/AluguelController.php';
require_once '../../../app/models/Aluguel.php';

    $controller = new AluguelController($pdo);
    $alugueis = $controller->read();
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
        <a href="../../../start/logout.php">Sair</a>
        <a href="../../../index.php">Voltar</a>
        <h1>Lista de Alugueis</h1>

        <ul>
            <?php foreach($alugueis as $aluguel): ?>
            <li>
                <?= $aluguel['nomeCarro'] ?>
                <?= $aluguel['nomeUsuario'] ?>
                <?= $aluguel['data_aluguel'] ?>
                <?= $aluguel['data_entrega'] ?>
                <?= $aluguel['preco_total'] ?>
            </li>

            <a href="editar_aluguel.php?id=<?= $aluguel['idAluguel'] ?>">Editar</a>
            <a href="../delete_aluguel.php?id=<?= $aluguel['idAluguel'] ?>">Excluir</a>

            <?php endforeach; ?>
        </ul>

    </body>
</html>

