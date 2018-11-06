<?php
    session_start();
    include_once '../../Config/config.php';
    include_once '../../Models/cliente/funcaocliente.php';
    $conn = new conectar();

    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);

    $executar = $conn->excluir($username);
    
?>