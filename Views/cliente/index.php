<?php
  session_start();
  // Checa se já está logado para mover para pagina de login
  if (!isset($_SESSION['usuario'])) {
    header('location: ../../index.php');
    exit();
}
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
				<form class="navbar-form navbar-left" action="#" method="GET">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Filtrar por Modelo">
						</div>
					<input type="submit" class="btn btn-default" value="Pesquisar">
				</form>
			  <li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" style="color:#f1f1f1 !important;" aria-haspopup="true" aria-expanded="false">CRUD CLIENTE <span class="caret"></span></a>
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
		<h2 class="text-center">Carros Disponíveis</h2>
		<div class="row">
			<div class="card">
				<div class="card-img">
					<img src="../../Assets/img/placeholder-car.png" alt="car">
				</div>
				<div class="card-text">
					<h3>Ford Ka</h3>
					<p><b>Modelo:</b></p>
					<p><b>Ano:</b> <?php echo $valor ?></p>
					<p><b>Quantidade de Lugares:</b></p>
					<p><b>Quantidade de Portas:</b></p>
					<p><b>Possui Ar Condicionado:</b></p>
					<!--<img src="img/icon-user.png" alt="icon-user" width="30rem"> <b>|</b> <p style="display:inline-block; font-size: 2rem;"><b>5</b></p>-->
					<div class="botoes">
						<a href="../carro/form_aluguel.html" class="btn btn-login btn-success">Alugar Carro</a>
						<!--<a href="#" class="btn btn-cadastro">Cancelar</a>-->
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="card">
				<div class="card-img">
					<img src="../../Assets/img/placeholder-car.png" alt="car">
				</div>
				<div class="card-text">
					<h3>Ford Ka</h3>
					<p><b>Modelo:</b></p>
					<p><b>Ano:</b> <?php echo $valor ?></p>
					<p><b>Quantidade de Lugares:</b></p>
					<p><b>Quantidade de Portas:</b></p>
					<p><b>Possui Ar Condicionado:</b></p>
					<!--<img src="img/icon-user.png" alt="icon-user" width="30rem"> <b>|</b> <p style="display:inline-block; font-size: 2rem;"><b>5</b></p>-->
					<div class="botoes">
						<a href="../carro/form_aluguel.html" class="btn btn-login btn-success">Alugar Carro</a>
						<!--<a href="#" class="btn btn-cadastro">Cancelar</a>-->
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="card">
				<div class="card-img">
					<img src="../../Assets/img/placeholder-car.png" alt="car">
				</div>
				<div class="card-text">
					<h3>Ford Ka</h3>
					<p><b>Modelo:</b></p>
					<p><b>Ano:</b> <?php echo $valor ?></p>
					<p><b>Quantidade de Lugares:</b></p>
					<p><b>Quantidade de Portas:</b></p>
					<p><b>Possui Ar Condicionado:</b></p>
					<!--<img src="img/icon-user.png" alt="icon-user" width="30rem"> <b>|</b> <p style="display:inline-block; font-size: 2rem;"><b>5</b></p>-->
					<div class="botoes">
						<a href="../carro/form_aluguel.html" class="btn btn-login btn-success">Alugar Carro</a>
						<!--<a href="#" class="btn btn-cadastro">Cancelar</a>-->
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="card">
				<div class="card-img">
					<img src="../../Assets/img/placeholder-car.png" alt="car">
				</div>
				<div class="card-text">
					<h3>Ford Ka</h3>
					<p><b>Modelo:</b></p>
					<p><b>Ano:</b> <?php echo $valor ?></p>
					<p><b>Quantidade de Lugares:</b></p>
					<p><b>Quantidade de Portas:</b></p>
					<p><b>Possui Ar Condicionado:</b></p>
					<!--<img src="img/icon-user.png" alt="icon-user" width="30rem"> <b>|</b> <p style="display:inline-block; font-size: 2rem;"><b>5</b></p>-->
					<div class="botoes">
						<a href="../carro/form_aluguel.html" class="btn btn-login btn-success">Alugar Carro</a>
						<!--<a href="#" class="btn btn-cadastro">Cancelar</a>-->
					</div>
				</div>
			</div>
		</div>
	</main>
	<script src="../../Assets/js/jquery-3.3.1.min.js"></script>
	<script src="../../Assets/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
</body>
</html>