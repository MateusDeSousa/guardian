<?php
  session_start();
  // Checa se já está logado para mover para pagina home
  if (isset($_SESSION['usuario'])) {
    header('location: Views/cliente/login_sucessoclient.html');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Guardian - Login</title>
    <link rel="stylesheet" href="Assets/css/style.css" type="text/css">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>

</head>
<body>
    <div class="login-page">
        <div class="form">
          <img src="Assets/img/logo_bg_white.png" style="width: 15rem; margin-bottom: 1rem;"/>

          <form class="login-form" method="POST" action="Controllers/cliente/login.php">
            <?php
              if(isset($_SESSION['msn'])){
                echo $_SESSION['msn'];
                unset($_SESSION['msn']);  
              }
            ?>
            <input type="text" name="username" placeholder="Nome de Usuário"/>
            <input type="password" name="password" placeholder="Senha"/>
            <button>Login</button>
            <p class="message">Não é cadastrado? <a href="indexCadastro.php">Criar uma Conta</a></p>
            <p class="message">Esqueceu a Senha? <a href="Views/cliente/solicitarnovasenhacliente.html">Clique Aqui</a></p>
          </form>
        </div>
      </div>

      <script>
          $('.message').click(function(){
             $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
            });
      </script>
</body>
</html>