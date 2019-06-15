<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "cadastro";

    $connect = mysqli_connect($servername, $username, $password);

    $selectdb = mysqli_select_db($connect, $database);

    $sql = "SELECT * FROM usuario where email = '{$_POST['login']}' and senha = '{$_POST['senha']}'";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($result);

    if(!mysqli_num_rows($result))
        header("Location: ./index.html");

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Perfil</title>
        <link href="./index.css" type="text/css" rel="stylesheet"/>
    </head>
    <body>
        <div id="container">
            <div id="header">
                <h1>Perfil</h1>
            </div>
            <div id="info">
                <?php
                    if (!$connect) {
                        echo "Falha na conexão com o banco de dados";
                    }
                ?>
                <h2>Informações Pessoais</h2>
                <p>Nome: <?php echo $row['nome'];?></p>
                <p>Data de Nascimento: <?php echo $row['nasc'];?></p>
                <p>Sexo: <?php echo $row['sexo'];?></p>
                <h2>Endereço</h2>
                <p>Endereço: <?php echo $row['endereco'];?></p>
                <p>Número: <?php echo $row['numero'];?></p>
                <h2>Conta</h2>
                <p>Email: <?php echo $row['email'];?></p>
            </div>
            <div id="footer">
                <a href="index.html" id="sair">Sair</a>
            </div>
        </div>
    </body>
</html>