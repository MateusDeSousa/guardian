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
                    <a href="dashboard.php">
                        <i class="fa fa-gift fa-lg"></i> Carros Alugados
                    </a>
                </li>
                <li>
                    <a href="#">
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
        <div class="rent-header">
            <h2>Todos os <span style="color: #d19b3d;">Usuários</span></h2>
            <form action="#" method="POST">
                <span>Filtrar por CNH</span>
                <input type="text" name="rent_id" class="code-input" id="id_locacao">
                <input type="submit" class="btn btn-custom" value="Filtrar">
            </form>
        </div>
        <div id="card-wrapper">
            <?php
                if(isset($_POST['rent_id'])){
                    $sql = "SELECT * FROM tb_cliente WHERE cnh = ".$_POST['rent_id'];
                    
                    if ($_POST['rent_id'] == '') { $sql = "SELECT * FROM tb_cliente"; }

                } else {
                    $sql = "SELECT * FROM tb_cliente";    
                }

                $res_users = mysqli_query($CON, $sql);

                function gamb($n){
                    if($n == 1){
                        return 'Sim';
                    } elseif ($n == 0) {
                        return 'Não';
                    }
                }
                
                // se encontrou registro
                if($res_users){
                    while ($row = $res_users->fetch_assoc()) {
                        echo '<div class="card-carro">';
                        echo '<h3>ID: </h3> <p>'.$row['id'].'</p>';
                        echo '<h3>Nome: </h3> <p>'.ucwords($row['name']).'</p>';
                        echo '<h3>Sobrenome: </h3> <p>'.ucwords($row['lastname']).'</p>';
                        echo '<h3>CNH: </h3> <p>'.$row['cnh'].'</p>';
                        echo '<h3>Email: </h3> <p>'.$row['email'].'</p>';
                        echo '<h3>Carro Alugado: </h3> <p>'.gamb($row['rented_car']).'</p>';
                        echo '<div class="icons">';
                        echo '<a href=""><i class="glyphicon glyphicon-ok"></i> Confirmar</a>';
                        echo '</div></div>';
                    }
                }
                
            ?>
        </div>
    </main>
</body>

</html>