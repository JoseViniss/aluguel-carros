<?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=aluguel_carros', 'root', '2024');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro ao conectar ao banco de dados: " . $e->getMessage());
}
