<?php
    include('../../Config/config.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../Assets/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../Assets/css/dashboard.css">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    <script src="js/chart.min.js"></script>
    <title>Guardian - Dashboard</title>
</head>

<body>
    <div class="nav-side-menu">
        <div class="brand">
            <img src="../../Assets/img/logo_bg_none.png" width="150rem" alt="logo">
        </div>
        <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>

        <div class="menu-list">
            <ul id="menu-content" class="menu-content collapse out">
                <li>
                    <a href="#">
                        <i class="fa fa-gift fa-lg"></i> Carros Alugados
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-user fa-lg"></i> Usuários
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <main>
        <div class="rent-header">
            <h2>Carros <span style="color: #d19b3d;">Alugados</span></h2>
            <form action="#" method="POST">
                <span>Filtrar por Código</span>
                <input type="text" name="rent_id" class="code-input" id="id_locacao">
                <input type="submit" class="btn btn-custom" value="Filtrar">
            </form>
        </div>
        <div id="card-wrapper">

            <?php
                if(isset($_POST['rent_id'])){
                    $sql = "SELECT * FROM tb_locacao WHERE id = ".$_POST['rent_id'];
                } else {
                    $sql = "SELECT * FROM tb_locacao";    
                }
                
                $res_rented_cars = mysqli_query($CON, $sql);

                while ($row = $res_rented_cars->fetch_assoc()) {
                    //$row['percentual_full'];
                    echo '<div class="card-carro">';
                    echo '<h3>ID: </h3> <p>'.$row['id'].'</p>';
                    echo '<h3>Marca: </h3> <p>'.ucwords($row['car_brand']).'</p>';
                    echo '<h3>Modelo: </h3> <p>'.ucwords($row['car_model']).'</p>';
                    echo '<h3>Cliente: </h3> <p>'.ucwords($row['client_name']).'</p>';
                    echo '<h3>Valor: </h3> <p>R$ '.$row['value'].'</p>';
                    echo '<div class="icons">';
                    echo '<a href=""><i class="glyphicon glyphicon-ok"></i> Confirmar</a>';
                    echo '</div></div>';
                }

            ?>
        </div>
    </main>
</body>

</html>