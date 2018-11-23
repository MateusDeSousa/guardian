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
                    <a href="listar_usuarios.php">
                        <i class="fa fa-user fa-lg"></i> Usuários
                    </a>
                </li>
                <li>
                    <a href="../carro/cadastrar_carro.php">
                        <i class="fa fa-user fa-lg"></i> Cadastrar Carro
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <main>
    <?php
        echo $_GET['x'];

        $sql = "UPDATE tb_locacao SET status = 'concluida' WHERE id = {$_GET['x']}"; //rent_date = [value-11], return_date = [value-12]
        
        $res_update = mysqli_query($CON, $sql);

        echo $sql;
        var_dump($res_update);

    ?>
    </main>
</body>

</html>