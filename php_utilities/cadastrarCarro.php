<?php
    include_once '../config/config.php';

    $car_brand = strtolower($_POST['car_brand']);
    $car_model = strtolower($_POST['car_model']);
    $year = strtolower($_POST['year']);
    $seats_qtd = strtolower($_POST['seats_qtd']);
    $door_qtd = strtolower($_POST['door_qtd']);
    $air_cond;

    if(!isset($_POST['air_cond_true'])){
        if(!isset($_POST['air_cond_false'])){
            echo 'Informe se o carro tem ou não, ar condicionado e tente novamente.';
            echo '<meta HTTP-EQUIV="Refresh" CONTENT="3;URL=../views/cadastrar_carro.html">';
            exit();
        }
    }

    if(isset($_POST['air_cond_true'])){
        $air_cond = 'yes';
    } elseif (isset($_POST['air_cond_false'])){
        $air_cond = 'no';
    }

    $sql = "INSERT INTO tb_veiculo(car_brand, car_model, year, seats_qtd, air_cond, door_qtd, status)";
    $sql .= "VALUES ('{$car_brand}', '{$car_model}', '{$year}', '{$seats_qtd}', '{$air_cond}', '{$door_qtd}', 'disponivel')";

    $query = mysqli_query($conex, $sql);
    
    var_dump($query);

    if(!var_dump($query)) {
        header('location:../views/index.html');
        exit();
    } else {
        echo 'Ocorreu um erro ao cadastrar o carro. Tente novamente.';
        echo '<meta HTTP-EQUIV="Refresh" CONTENT="3;URL=../views/cadastrar_carro.html">';
    }

?>