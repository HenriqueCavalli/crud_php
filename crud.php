<?php

    $nome = '';
    $telefone = '';
    $email = '';
    $atualizar = false;
    $id = 0;

    $mysqli = new mysqli('localhost', 'root', 'root', 'php_banco') or die(mysqli_error($mysqli));
    
    if (isset($_POST['adicionar'])){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];

        $mysqli->query("INSERT INTO clientes (nome, email, telefone) VALUES ('$nome', '$email', '$telefone')") or die($mysqli->error);

        header("location: index.php");
    }

    if (isset($_GET['delete'])){
        $id = $_GET['delete'];

        $mysqli->query("DELETE FROM clientes WHERE id=$id") or die($mysqli->error);

        header("location: index.php");
    }
    
    if (isset($_GET['edit'])){
        $id = $_GET['edit'];
        $atualizar = true;
        $result = $mysqli->query("SELECT * FROM clientes WHERE id=$id") or die($mysqli->error);
        $row = $result->fetch_array();
        $nome = $row['nome'];
        $telefone = $row['telefone'];
        $email = $row['email'];

    }
    
    if (isset($_POST['atualizar'])){
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];

        $mysqli->query("UPDATE clientes SET nome='$nome', email='$email', telefone='$telefone' WHERE id=$id") or die ($mysqli->error);
    
        header("location: index.php");
    }
?>