<?php
session_start();
include_once '../config/config.php';
include_once 'funcaocliente.php';
$conn = new conectar();

$name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
$lastName = filter_input(INPUT_POST, "lastname", FILTER_SANITIZE_STRING);
$userName = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
$cnh = filter_input(INPUT_POST, "cnh", FILTER_SANITIZE_STRING);
$emailAddress = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
$password = md5(filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING));

$funcao = $conn->cadastrar($name, $lastName, $userName, $cnh, $emailAddress, $password);




?>
