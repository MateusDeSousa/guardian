<?php
session_start();
include_once '../../config/config.php';
include_once '../../classes/funcaocliente.php';
$conn = new conectar();

$email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);

//$chave = $conn->cadastrar($name, $lastName, $userName, $cnh, $emailAddress, $password);

$chave = $conn->gerarchave($email);

if ($chave) {
    echo '<a href="http://localhost/guardian/criarnovasenha.php?chave='.$chave.'"><p align="center">http://localhost/guardian/criarnovasenha.php?chave='.$chave.'</p></a>';
} else {
    echo '<h1>Erro usuario não encontrado</h1>';
}

?>