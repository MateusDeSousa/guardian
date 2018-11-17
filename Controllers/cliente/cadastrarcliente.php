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
unset($_SESSION['infoCadastro']);

$funcao = $conn->cadastrar($name, $lastName, $userName, $cnh, $emailAddress, $passwordMD5);

if (!empty($_SESSION['infoCadastro'])) {

    $_SESSION['msn'] = '<p style="color: green">Seu cadastro foi realizado com sucesso</p>';
    header('location:../../index.php');
    
}else{
    $_SESSION['msg'] = $_SESSION['erroCadastro'];
    header('location:../../indexCadastro.php'); // se o array não estiver vazio (banco encontrou registro), redireciona pra index
}

?>
