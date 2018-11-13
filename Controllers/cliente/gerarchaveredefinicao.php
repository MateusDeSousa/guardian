<?php
session_start();
include_once '../../Config/config.php';
include_once '../../Models/cliente/funcaocliente.php';
$conn = new conectar();

$email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);

//$chave = $conn->cadastrar($name, $lastName, $userName, $cnh, $emailAddress, $password);

$chave = $conn->gerarchave($email);

if ($chave) {
    echo '<a href="http://localhost/guardian/Views/cliente/criarnovasenhacliente.php?chave='.$chave.'"><p align="center">http://localhost/guardian/Views/cliente/criarnovasenhacliente.php?chave='.$chave.'</p></a>';
} else {
    echo '<h1>Erro usuario não encontrado</h1>';
}

?>