<?php
    include_once '../../Config/config.php';
    include_once '../../Models/carro/funcaocarro.php';
    $conn = new conectar();

    $car_brand = strtolower($_POST['car_brand']);
    $car_model = strtolower($_POST['car_model']);
    $year = $_POST['year'];
    $seat_qtd = $_POST['seat_qtd'];
    $door_qtd = $_POST['door_qtd'];
    $air_cond = $_POST['air_cond'];
    $abs = $_POST['abs'];
    $sound = $_POST['sound'];
    $status = $_POST['status'];
    $chassis = $_POST['chassis'];
    $board = $_POST['board'];
    $price = $_POST['price'];
    
    //Chama a função para cadastrar no banco
    $cadastrar = $conn->cadastrar($car_brand, $car_model, $year, $seat_qtd, $air_cond, $abs, $sound, $door_qtd, $status, $chassis, $price);

/*
    if($cadastrar) {
        header('location:../../Views/funcionario/dashboard.html');
        exit();
    } else {
        echo 'Ocorreu um erro ao cadastrar o carro. Tente novamente.';
        echo '<meta HTTP-EQUIV="Refresh" CONTENT="3;URL=../../Views/carro/cadastrar_carro.html">';
    }
*/
?>