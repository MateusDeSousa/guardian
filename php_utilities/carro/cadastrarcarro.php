<?php
session_start();
include_once '../../config/config.php';
include_once '../../classes/funcaocliente.php';
$conn = new conectar();

$marca = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
$modelo = filter_input(INPUT_POST, "lastname", FILTER_SANITIZE_STRING);
$ano = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
$qtdlugares = filter_input(INPUT_POST, "cnh", FILTER_SANITIZE_STRING);
$ac = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
$abs = md5(filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING));
$som = md5(filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING));
$portas = md5(filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING));
$status = md5(filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING));
$chassi = md5(filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING));
$diaria = md5(filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING));

$funcao = $conn->cadastrar($marca, $modelo, $ano, $qtdlugares, $ac, $abs, $som, $portas, $status, $chassi, $diaria);




?>
