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
			<a class="navbar-brand" href="lista_carros.php"><img src="../../Assets/img/logo_bg_none.png" id="logo" alt=""></a>
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
		<h2 class="text-center">Efetuar <span style="color: #d19b3d;">Locação</span></h2>
        
        <?php
            $id = $_GET['x'];
            $sql_carro = "SELECT * FROM tb_veiculo WHERE id = ".$id;

            $res_carro = mysqli_query($CON, $sql_carro);

            while ($row = $res_carro->fetch_assoc()) {
                /**
                 * DADOS QUE VEM DA TABELA DE CARRO
                 */
                $id_carro = $row['id'];
                $valor_diaria_carro = $row['value'];
                $marca_carro = $row['car_brand'];
                $modelo_carro = $row['car_model'];
                /**
                 * VALOR DEFAULT DE LOCAÇÃO
                */
                $status = 'pendente';
                /**
                 * DADOS RECEBIDOS POR SESSION
                 */
                $nome_cliente = 'joaozinho';
                $id_cliente = 2;
                $dia_aluguel = '2018-11-01';
                $dia_devolucao = '2018-11-04';
            }

            /**
             * VER COMO VAI TRATAR ISSO AQUI
             */
            $valor_total_locacao = $valor_diaria_carro * 3;

            $sql = "INSERT INTO tb_locacao (car_id, client_id, value, status, rent_date, return_date, car_brand, car_model, client_name)";
            $sql .= " VALUES ";
            $sql .= "({$id_carro},{$id_cliente},{$valor_total_locacao},'{$status}','{$dia_aluguel}','{$dia_devolucao}','{$marca_carro}','{$modelo_carro}','{$nome_cliente}')";

            $res_add_locacao = mysqli_query($CON, $sql);
            $sql = "SELECT * FROM tb_locacao WHERE car_id = {$id_carro}";
            $res_x = mysqli_query($CON, $sql);

            while ($row = $res_x->fetch_assoc()) {
              $usar_locacao = $row['id'];
            }

        
        ?>

            <div class="form-data">
              <h3>Locação Concluída com Sucesso!!</h3>
              <p>Por favor, guarde esse código.</p>
              <p>Você utilizará para a retirada do carro.</p>

              <h4>CÓDIGO:</h4>
              <h4 style="color: red"><?php echo $usar_locacao ?></h4>
            </div>

	</main>
	<script src="../../Assets/js/jquery-3.3.1.min.js"></script>
	<script src="../../Assets/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
</body>
</html>