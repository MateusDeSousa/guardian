<?php
session_start();
include_once '../config/config.php';

$name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
$lastName = filter_input(INPUT_POST, "lastname", FILTER_SANITIZE_STRING);
$userName = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
$cnh = filter_input(INPUT_POST, "cnh", FILTER_SANITIZE_STRING);
$emailAddress = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
$password = md5(filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING));



$newUser = "INSERT INTO tb_cliente(name, lastname, username, cnh, email, password) VALUES ('$name', '$lastName', '$userName', '$cnh', '$emailAddress', '$password')";
$resultado_usuario = mysqli_query($conex, $newUser);

if (mysqli_insert_id($conex)) {
    $_SESSION['msg'] = "<p style='color: green'>Seu cadastro foi realizado com sucesso</p>";
    echo "<meta HTTP-EQUIV='Refresh' CONTENT='3;URL=../views/index.html'>";
    echo '<h3>Cadastro efetuado com sucesso!!</h3><br>';
    echo '<p>Redirecionando para página principal...</p>';
} else {
    $_SESSION['msg'] = "<p style='color: red'>ops!! cadstro não realizado</p>";
    echo "<meta HTTP-EQUIV='Refresh' CONTENT='3;URL=../index.php'>";
    echo '<h3>Ocorreu um erro no cadastro :(</h3><br>';
    echo '<p>Tente novamente...</p>';
    echo '<p>Redirecionando...</p>';
}

?>
