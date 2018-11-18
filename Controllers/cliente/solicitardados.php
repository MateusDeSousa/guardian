<?php
    session_start();
    include_once '../../Config/config.php';
    include_once '../../Models/cliente/funcaocliente.php';
    $conn = new conectar();
    
    $user = $conn->solicitarDados($_SESSION['usuario']);
    
    $_SESSION['nome'] = $user["name"];
    $_SESSION['sobrenome'] = $user["lastname"];
    $_SESSION['cnh'] = $user["cnh"];
    $_SESSION['email'] = $user["email"];
    header('location:../../Views/cliente/editarcliente.php');
?>