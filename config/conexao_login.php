<?php

    $usuario = 'root';
    $senha = '2024';
    $database = 'aluguel_carros';
    $host = 'localhost';

    $mysqli = new mysqli($host, $usuario, $senha, $database);

    if($mysqli->error){
        die("Falha na conexao com o banco: " . $mysqli->error);
    }