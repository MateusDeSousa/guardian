<?php
    include_once '../../Config/config.php';
    include_once '../../Models/carro/funcaocarro.php';
    $conn = new conectar();

    $executar = $conn->excluir($_SESSION['chassis']);

    if ($executar == false) {
        $_SESSION['msg'] = $executar;
    }else {
        $_SESSION['msg'] = '<p style="color: green">Carro retirado do sistema</p>';
    }
?>