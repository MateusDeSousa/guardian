<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GTela de redefinição</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>

</head>
<body>
  <?php
  $chave = "";
  if($_GET["chave"]){
    $chave = $_GET["chave"];
  

  ?>
    <div class="login-page">
        <div class="form">
          <form class="login-form" method="POST" action="php_utilities/cliente/novasenhacliente.php">
            <input type="hidden" name="chave" value="<?php echo $chave; ?>">
            <input type="email" name="email" placeholder="Confirme seu email"/>            
            <input type="password" name="password1" placeholder="Digite a nova senha"/>
            <input type="password" name="password2" placeholder="Digite a senha novamente"/>
            <button>Alterar</button>
          </form>
        </div>
      </div>

      <script>
          $('.message').click(function(){
             $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
            });
      </script>
  <?php
  } else{
    echo '<h1 style="color: white", align="center">Pagina não encontrada</h1>';
  }
  ?>
</body>
</html>