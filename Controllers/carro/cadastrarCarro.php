<?php
    include_once '../../Config/config.php';
    include_once '../../Models/carro/funcaocarro.php';
    $conn = new conectar();

    $car_brand = strtolower($_POST['car_brand']);//ok
    $car_model = strtolower($_POST['car_model']);//ok
    $year = $_POST['year'];//ok
    $seat_qtd = $_POST['seat_qtd'];//ok
    $door_qtd = $_POST['door_qtd'];//ok
    $chassis = $_POST['chassi'];//FALTA
    $board = $_POST['board'];//FALTA
    $price = $_POST['price'];//ok
    $status = $_POST['status'];//ok
    isset($_POST['sound']) ? $sound = 'sim' : $sound = 'nao';//ok
    isset($_POST['abs']) ? $abs = 'sim' : $abs = 'nao';//ok
    isset($_POST['air_cond']) ? $air_cond = 'sim' : $air_cond = 'nao';//ok
    
    //Chama a função para cadastrar no banco
    //$cadastrar = $conn->cadastrar($car_brand, $car_model, $year, $seat_qtd, $air_cond, $abs, $sound, $door_qtd, $status, $chassis, $price);
    
    $hoje = date("Y-m-d H:i:s");

    $sql = "INSERT INTO tb_veiculo (`car_brand`, `car_model`, `year`, `seats_qtd`, `air_cond`, `abs`, `sound`, `door_qtd`, `status`, `value`, `chassi`, `board`, `return_date`) ";
    $sql .= "VALUES ('{$car_brand}', '{$car_model}', {$year}, {$seat_qtd}, '{$air_cond}', '{$abs}', '{$sound}', {$door_qtd}, '{$status}', {$price}, '{$chassis}', '{$board}', '{$hoje}')";

    //$deu_certo =date("Y-m-d H:i:s");
    
    try {
        $deu_certo = mysqli_query($CON, $sql);
        
        if($deu_certo){
            echo 'Carro cadastrado com sucesso! Redirecionando...';
            echo '<meta HTTP-EQUIV="Refresh" CONTENT="3;URL=../../Views/funcionario/dashboard.php">';
        } else {
            echo 'Ocorreu um erro ao cadastrar o carro. Tente novamente.';
            echo '<meta HTTP-EQUIV="Refresh" CONTENT="3;URL=../../Views/carro/cadastrar_carro.php">';
        }
    } catch (Exception $err) {
        echo $err->getMessage();
    }

    


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