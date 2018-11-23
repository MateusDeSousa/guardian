<?php
session_start();
include_once '../../Config/config.php';
include_once '../../Classes/funcaofuncionario.php';
$conn = new conectar();

$userName = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
$emailAddress = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
$password = md5(filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING));

$funcao = $conn->cadastrar($userName, $emailAddress, $password);


?>
