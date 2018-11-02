<?php
    session_start();
    include_once '../config/config.php';
    
    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
    $lastname = filter_input(INPUT_POST, "lastname", FILTER_SANITIZE_STRING);
    $password = md5(filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING));
    $cnh = filter_input(INPUT_POST, "cnh", FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    $query = "UPDATE tb_clientes SET name = '{$name}', lastname = '{$lastname}', email = '{$email}', cnh = {$cnh}, password = {$password} WHERE  username = {$username}";
    $resultado = mysqli_query($conex, $query);
    header('Location: ../views/index.html');
?>