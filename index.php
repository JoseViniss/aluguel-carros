<?php

    include 'config/conexao_login.php';

    session_start();

    if (isset($_SESSION['adm'])) {
        if ($_SESSION['adm'] == 1) {
            header("Location: home_admin.php");
        } else {
            header("Location: home.php");
        }
    } else {
        if (isset($_POST['nome_usuario']) || isset($_POST['senha'])) {
            if (strlen($_POST['nome_usuario']) == 0) {
                echo "Preencha seu usuário";
            } else if (strlen($_POST['senha']) == 0) {
                echo "Preencha sua senha";
            } else {
                $nome_usuario = $mysqli->real_escape_string($_POST['nome_usuario']);
                $senha = $mysqli->real_escape_string($_POST['senha']);
    
                $sql_code = "SELECT * FROM usuario WHERE nome_usuario='$nome_usuario' AND senha='$senha'";
                $sql_query = $mysqli->query($sql_code) or die($mysqli->error);
    
                $quantidade = $sql_query->num_rows;
    
                if ($quantidade == 1) {
                    $usuario = $sql_query->fetch_assoc();
    
                    if (!isset($_SESSION)) {
                        session_start();
                    }
    
                    $_SESSION['id'] = $usuario['idUsuario'];
                    $_SESSION['nome'] = $usuario['nome'];
                    $_SESSION['adm'] = $usuario['administrador'];
    
                    if ($_SESSION['adm'] == 1) {
                        header("Location: home_admin.php");
                    } else {
                        header("Location: home.php");
                    }
                } else {
                    echo "Usuário e/ou senha incorretos!";
                }
            }
        }
    
        $login = file_get_contents('app/login/cadastro.html');
        echo $login;
    }
    
