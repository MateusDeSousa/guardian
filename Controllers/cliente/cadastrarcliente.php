<?php
session_start();
include_once '../../Config/config.php';
include_once '../../Models/cliente/funcaocliente.php';
$conn = new conectar();

$name = $_POST['name'];
$userName = $_POST['username'];
$lastName = $_POST['lastname'];
$cnh = $_POST['cnh'];
$emailAddress = $_POST['email'];
$password = $_POST['password'];
$passwordMD5 = md5($password);


$funcao = $conn->cadastrar($name, $lastName, $userName, $cnh, $emailAddress, $passwordMD5);

if (!empty($_SESSION['infoCadastro'])) {

    $_SESSION['msg'] = "<p style='color: green'>Seu cadastro foi realizado com sucesso</p>";
    echo "<meta HTTP-EQUIV='Refresh' CONTENT='3;URL=../../Views/cliente/login_sucessoclient.html'>";
    echo '<h3>Cadastro efetuado com sucesso!!</h3><br>';
    echo '<p>Redirecionando para página principal...</p>';
    
}else{
    $_SESSION['msg'] = "<p style='color: red'>ops!! cadstro não realizado</p>";
    echo "<meta HTTP-EQUIV='Refresh' CONTENT='3;URL=../../index.php'>";
    echo '<h3>Ocorreu um erro no cadastro :(</h3><br>';
    echo '<p>Tente novamente...</p>';
    echo '<p>Redirecionando...</p>';
}

?>
