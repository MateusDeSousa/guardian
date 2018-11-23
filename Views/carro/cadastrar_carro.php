<?php
  session_start();
?>
<!--<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Guardian - Cadastrar Carro</title>
    <link rel="stylesheet" href="../../Assets/css/style.css" type="text/css">
    <link rel="stylesheet" href="../../Assets/bootstrap-3.3.7-dist/css/bootstrap.min.css">

</head>
<body>
    <div class="login-page">
        <div class="form">
          <form class="login-form" method="POST" action="../../Controllers/carro/cadastrarCarro.php">
            <select id="car-brand" name="marca" style="margin-bottom: 2rem">
                <option value="toyota">Toyota</option>
                <option value="volkswagen">Volkswagen</option>
                <option value="ford">Ford</option>
                <option value="fiat">Fiat</option>
                <option value="nissan">Nissan</option>
                <option value="honda">Honda</option>
                <option value="hyundai">Hyundai</option>
                <option value="chevrolet">Chevrolet</option>
                <option value="kia">Kia</option>
                <option value="renault">Renault</option>
                <option value="mercedes-benz">Mercedes-Benz</option>
                <option value="peugeot">Peugeot</option>
                <option value="bmw">BMW</option>
                <option value="audi">Audi</option>
                <option value="mazda">Mazda</option>
                <option value="jeep">Jeep</option>
            </select>
            <input type="text" name="car_model" placeholder="Modelo" required/>
            <input type="number" name="year" placeholder="Ano" required/>
            <input type="number" name="seats_qtd" placeholder="Quantidade de Lugar" required/>
            <input type="number" name="door_qtd" placeholder="Quantidade de Portas" required/>
            <input type="number" name="chassi" placeholder="Chassi" required/>
            <input type="text" name="placa" placeholder="Placa" required/>
            <input type="text" name="valor" placeholder="Valor da Diária R$" required/>

            <label for="status">Status</label>
            <div class="row">
              <div class="col-md-6">  
                <input type="radio" name="status" value="disponivel" checked>Disponível<br>
              </div>
              <div class="col-md-6">
                <input type="radio" name="status" value="revisao">Revisão<br>
              </div>
            </div>
            <label>Adicionais</label>
            <div class="row">
              <div class="col-md-4">
                <input type="checkbox" name="air_cond">Ar condicionado
              </div>
              <div class="col-md-4">
                <input type="checkbox" name="abs">ABS
              </div>
              <div class="col-md-4">
                <input type="checkbox" name="sound">Som
              </div>
            </div>
           
            <button>Cadastrar Carro</button>
          </form>
        </div>
      </div>
</body>
</html> -->


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
                    <a href="../funcionario/dashboard.php">
                        <i class="fa fa-gift fa-lg"></i> Carros Alugados
                    </a>
                </li>
                <li>
                    <a href="../funcionario/listar_usuarios.php">
                        <i class="fa fa-user fa-lg"></i> Usuários
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-user fa-lg"></i> Cadastrar Carro
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <main>
      <div class="rent-header">
        <h2>Cadastrar <span style="color: #d19b3d;">Carro</span></h2>
      </div>
    <form action="../../Controllers/carro/cadastrarCarro.php" method="POST">
    <div class="col-md-6">
    <div class="form-group">
        <label for="brand">Marca</label>
        <select id="car-brand" name="car_brand" style="margin-top: 2rem">
          <option value="toyota">Toyota</option>
          <option value="volkswagen">Volkswagen</option>
          <option value="ford">Ford</option>
          <option value="fiat">Fiat</option>
          <option value="nissan">Nissan</option>
          <option value="honda">Honda</option>
          <option value="hyundai">Hyundai</option>
          <option value="chevrolet">Chevrolet</option>
          <option value="kia">Kia</option>
          <option value="renault">Renault</option>
          <option value="mercedes-benz">Mercedes-Benz</option>
          <option value="peugeot">Peugeot</option>
          <option value="bmw">BMW</option>
          <option value="audi">Audi</option>
          <option value="mazda">Mazda</option>
          <option value="jeep">Jeep</option>
        </select>
      </div>
      <div class="form-group">
        <label for="car_model">Modelo</label>
        <input type="text" name="car_model" required/>
      </div>
      <div class="form-group">
        <label for="year">Ano</label>
        <input type="number" name="year" required/>
      </div>
      <div class="form-group">
        <label for="seat_qtd">Número de Assentos</label>
        <input type="number" name="seat_qtd" required/>
      </div>
      <div class="form-group">
        <label for="door_qtd">Quantidade de Portas</label>
        <input type="number" name="door_qtd" required/>
      </div>
      <div class="form-group">
        <label for="chassi">Chassi</label>
        <input type="text" name="chassi" required/>
      </div>
      <div class="form-group">
        <label for="board">Placa</label>
        <input type="text" name="board" required/>
      </div>
      <div class="form-group">
        <label for="price">Valor da Diária</label>
        <input type="text" name="price" required/>
      </div>
    </div>

    <div class="col-md-6">
    <label for="status">Status</label>
        <div class="row">
          <div class="col-md-2">  
            <input type="radio" name="status" value="disponivel" checked>Disponível<br>
          </div>
          <div class="col-md-2">
            <input type="radio" name="status" value="revisao">Revisão<br>
          </div>
        </div>
      <label style="margin-top: 2rem;">Adicionais</label>
      <div class="checkbox">
        <label>
          <input type="checkbox" name="air_cond">Ar condicionado
        </label>
      </div>
      <div class="checkbox">
        <label>
          <input type="checkbox" name="abs">Freio ABS
        </label>
      </div>
      <div class="checkbox">
        <label>
          <input type="checkbox" name="sound">Som
        </label>
      </div>
    </div>

    <button type="submit" class="btn btn-success" style="margin-top: 11rem">Cadastrar!</button>
    </form>



    <!--<div class="login-page">
        <div class="form">
          <form class="login-form" method="POST" action="../../Controllers/carro/cadastrarCarro.php">
            <select id="car-brand" name="marca" style="margin-bottom: 2rem">
                <option value="toyota">Toyota</option>
                <option value="volkswagen">Volkswagen</option>
                <option value="ford">Ford</option>
                <option value="fiat">Fiat</option>
                <option value="nissan">Nissan</option>
                <option value="honda">Honda</option>
                <option value="hyundai">Hyundai</option>
                <option value="chevrolet">Chevrolet</option>
                <option value="kia">Kia</option>
                <option value="renault">Renault</option>
                <option value="mercedes-benz">Mercedes-Benz</option>
                <option value="peugeot">Peugeot</option>
                <option value="bmw">BMW</option>
                <option value="audi">Audi</option>
                <option value="mazda">Mazda</option>
                <option value="jeep">Jeep</option>
            </select>
            <input type="text" name="car_model" placeholder="Modelo" required/>
            <input type="number" name="year" placeholder="Ano" required/>
            <input type="number" name="seats_qtd" placeholder="Quantidade de Lugar" required/>
            <input type="number" name="door_qtd" placeholder="Quantidade de Portas" required/>
            <input type="number" name="chassi" placeholder="Chassi" required/>
            <input type="text" name="placa" placeholder="Placa" required/>
            <input type="text" name="valor" placeholder="Valor da Diária R$" required/>

            <label for="status">Status</label>
            <div class="row">
              <div class="col-md-6">  
                <input type="radio" name="status" value="disponivel" checked>Disponível<br>
              </div>
              <div class="col-md-6">
                <input type="radio" name="status" value="revisao">Revisão<br>
              </div>
            </div>
            <label>Adicionais</label>
            <div class="row">
              <div class="col-md-4">
                <input type="checkbox" name="air_cond">Ar condicionado
              </div>
              <div class="col-md-4">
                <input type="checkbox" name="abs">ABS
              </div>
              <div class="col-md-4">
                <input type="checkbox" name="sound">Som
              </div>
            </div>
           
            <button>Cadastrar Carro</button>
          </form>
        </div>
      </div>-->
    </main>
</body>

</html>