<?php
include_once '../../config/config.php';
include_once '../../classes/funcaofuncionario.php';
$conn = new conectar();

$email = $_POST['email'];
$password1 = $_POST['password1'];
$password2 = $_POST['password2'];
$chave = $_POST['chave'];
//$chave = preg_replace('','',$chave);
if ($password1 == $password2) {
    $passwordMD5 = md5($password1);
    $validar = $conn->validarchave($email, $chave);

    if ($validar) {
       $setarsenha = $conn->novasenha($passwordMD5, $validar); 
    } else {
        echo 'Erro: usuario não encontrado';
    }
    
} else {
    # code...
}

 // md5 do password pra comparar no banco



?>