<?php
    session_start();
    include_once '../../Config/config.php';
    include_once '../../Models/cliente/funcaocliente.php';
    $conn = new conectar();

    $executar = $conn->excluir($_SESSION['usuario']);

    if($_SESSION['infoDelete']){
        $_SESSION['loggedin'] = false;
        unset($_SESSION['loggedin']);
        unset($_SESSION['currentkey']);
        unset($_SESSION['usuario']);
        $_SESSION['msn'] = '<p style="color: blue">Conta deletata</p>';
        header('location:../../index.php');
        
    }
    
?>