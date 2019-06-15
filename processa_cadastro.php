<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "cadastro";

    $connect = mysqli_connect($servername, $username, $password);

    if (!$connect) {
        echo "Falha na conexão com o banco de dados";
    }

    $sql = "CREATE DATABASE IF NOT EXISTS ".$database;

    if (mysqli_query($connect, $sql)) {
        //echo "Banco de dados criado com sucesso.";
    } else {
        echo "Falha na criação do banco de dados.";
    }

    $selectdb = mysqli_select_db($connect, $database);


    $sql = "CREATE TABLE IF NOT EXISTS usuario (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
        nome VARCHAR(40) NOT NULL ,
        nasc DATE NOT NULL,
        sexo VARCHAR(9) NOT NULL,
        endereco VARCHAR(50) NOT NULL,
        numero INT(4) UNSIGNED NOT NULL,
        email VARCHAR(40) NOT NULL,
        senha VARCHAR(20) NOT NULL
        );";

    if (mysqli_query($connect, $sql)) {
        //echo "Tabela Criada com sucesso.";
    } else {
        echo "Falha na criação da tabela.";
    }

    $sql = "SELECT * FROM usuario where email = '{$_POST['login']}'";
    $result = mysqli_query($connect, $sql);
    
    if(!mysqli_num_rows($result)>0)
        header("Location: ./cadastro.html");
    else {
        $sql = "INSERT INTO usuario (nome, nasc, sexo, endereco, numero, email, senha)
        VALUES ('".$_POST['nome']."','".$_POST['nasc']."','".$_POST['sexo']."','".$_POST['endereco']."','".$_POST['numero']."','".$_POST['email']."','".$_POST['senha']."');";

        if (mysqli_query($connect, $sql)) {
            echo "Conta criada com sucesso.<br/>";
            echo "<a href='./index.html'>Voltar para página de login.</a><br/>";
            echo "<a href='./cadastro.html'>Criar outra conta.</a><br/>";
        } else {
            echo "Falha na criação da conta.";
        }
    }

?>