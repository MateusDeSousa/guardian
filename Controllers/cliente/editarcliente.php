<?php
    session_start();
    include_once '../../Config/config.php';
    include_once '../../Models/cliente/funcaocliente.php';
    $conn = new conectar();
    
    

    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $username = $_SESSION['usuario'];
    $cnh = $_POST['cnh'];
    $email = $_POST['email'];
    
    if(empty($cnh)){
        $cnh = $_SESSION['cnh'];
        if (empty($email)) {
            $email = $_SESSION['email'];
        }
    }else{
        if (empty($email)) {
            $email = $_SESSION['email'];
        }
    }
    

    $executar = $conn->editar($username , $name, $lastname, $cnh, $email);
    

    if (!empty($executar)) {
        
        header('location:../../Views/cliente/index.php');
        
    }else{
        $_SESSION['msg'] = $_SESSION['AlterarUser'];
        header('location:../../Views/cliente/editarcliente.php'); // se o array não estiver vazio (banco encontrou registro), redireciona pra index
    }
?>