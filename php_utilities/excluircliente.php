<?php
    session_start();
    include_once '../config/config.php';

    $userName = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);

    $query = "DELETE FROM tb_cliente WHERE username = {$username}";
    $resposta = mysqli_query($conex, $query);;
    header('Location: ../views/index.html');
?>