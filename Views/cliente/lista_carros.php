<?php
  session_start();
  // Checa se já está logado para mover para pagina de login
  if (!isset($_SESSION['usuario'])) {
    header('location: ../../index.php');
    exit();
  }
  include('../../Config/config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../Assets/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../Assets/css/main.css">
	<title>Guardian - Home</title>
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
		  <!-- Brand and toggle get grouped for better mobile display -->
		  <div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			  <span class="sr-only">Toggle navigation</span>
			  <span class="icon-bar"></span>
			  <span class="icon-bar"></span>
			  <span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#"><img src="../../Assets/img/logo_bg_none.png" id="logo" alt=""></a>
		  </div>
	  
		  <!-- Collect the nav links, forms, and other content for toggling -->
			<ul class="nav navbar-nav navbar-right">
				<form class="navbar-form navbar-left" action="" method="POST">
						<div class="form-group">
							<input type="text" class="form-control" name="model" placeholder="Filtrar por Modelo">
						</div>
					<input type="submit" class="btn btn-default" value="Pesquisar">
				</form>
			  <li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" style="color:#f1f1f1 !important;" aria-haspopup="true" aria-expanded="false">Minha Conta <span class="caret"></span></a>
				<ul class="dropdown-menu">
				  <li><a href="../../Controllers/cliente/solicitardados.php"><i class="glyphicon glyphicon-pencil"></i> Alterar</a></li>
				  <li><a href="../../Controllers/cliente/excluircliente.php"><i class="glyphicon glyphicon-trash"></i> Excluir Conta</a></li>
				  <!--<li><a href="#">Something else here</a></li>-->
				  <li role="separator" class="divider"></li>
				  <li><a href="../../Controllers/cliente/logout.php"><i class="glyphicon glyphicon-off"></i> Logout</a></li>
				</ul>
			  </li>
			</ul>
		  </div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	  </nav>

	<main class="container">
		<h2 class="text-center">Carros <span style="color: #d19b3d;">Disponíveis</span></h2>

		<?php
			$rent_date = $_POST['rent_date']; //2018-11-28
			$return_date = $_POST['return_date']; //2018-11-29

			if (isset($_POST['model'])) {
				$sql = "SELECT * FROM tb_veiculo WHERE car_model = '{$_POST['model']}' AND return_date BETWEEN date('{$rent_date}') AND date('{$return_date}') ";
			} else {
				$sql = "SELECT * FROM tb_veiculo WHERE return_date BETWEEN date('{$rent_date}') AND date('{$return_date}')";
			}

			$res_vehicles = mysqli_query($CON, $sql);

			function gambiarra($palavra){
				if ($palavra == 'nao') {
					return "Não";
				} else {
					return "Sim";
				}
			}


			while ($row = $res_vehicles->fetch_assoc()) {
                echo '<div class="row"> <div class="card"> <div class="card-img"> <img src="../../Assets/img/placeholder-car.png" alt="car"> </div>';

                echo '<div class="card-text"> <h3>'.ucwords($row['car_model']).'</h3>';
                echo '<p><b>Marca:</b>&nbsp;'.ucwords($row['car_brand']).'</p>';
                echo '<p><b>Ano:</b>&nbsp;'.$row['year'].'</p>';
                echo '<p><b>Quantidade de Lugares:</b>&nbsp;'.$row['seats_qtd'].'</p>';
                echo '<p><b>Quantidade de Portas:</b>&nbsp;'.$row['door_qtd'].'</p>';
                echo '<p><b>Possui Ar Condicionado:</b>&nbsp;'.gambiarra($row['air_cond']).'</p>';
                echo '<p><b>Possui Freio ABS:</b>&nbsp;'.gambiarra($row['abs']).'</p>';
                echo '<p><b>Possui Som Automotivo:</b>&nbsp;'.gambiarra($row['sound']).'</p>';
                echo '<p><b>VALOR DA DIÁRIA </b>R$:'.$row['value'].'</p>';

                /**   -----------------------------------------------------------------
                 *   | ESSA LINHA DE BAIXO VAI LINKAR PRA OUTRO LUGAAAAAAAAAAAAAAAAAR |
                 *   -----------------------------------------------------------------
                 */
								$x = $row['id'];
                echo '<div class="botoes"> <a href="efetuar_locacao.php?x='.$x.'" class="btn btn-login btn-success">Alugar Carro</a>';
                echo '</div></div></div></div>';
            }

		?>

	</main>
	<script src="../../Assets/js/jquery-3.3.1.min.js"></script>
	<script src="../../Assets/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
</body>
</html>