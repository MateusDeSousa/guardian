<?php
    session_start();
    include_once '../../config/config.php';
    include_once '../../classes/funcaocliente.php';
    $conn = new conectar();
    
    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
    $lastname = filter_input(INPUT_POST, "lastname", FILTER_SANITIZE_STRING);
    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
    $cnh = filter_input(INPUT_POST, "cnh", FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    $password = md5(filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING));

    $executar = $conn->editar($name, $lastname, $username, $cnh, $email, $password);
    
?>