<?php
  session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar</title>
    <link rel="stylesheet" href="../../Assets/css/style.css" type="text/css">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>

</head>
<body>
    <div class="login-page">
        <div class="form">
          <img src="../../Assets/img/logo_bg_white.png" style="width: 15rem; margin-bottom: 1rem;"/>
          <form class="login-form" method="POST" action="../../Controllers/cliente/editarcliente.php">
            <?php
              if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);  
              }
            ?>
            <input type="text" value="<?php echo $_SESSION['nome']; ?>" name="name"/>
            <input type="text" value="<?php echo $_SESSION['sobrenome']; ?>" name="lastname"/>
            <input type="text" placeholder="<?php echo $_SESSION['cnh']; ?>" name="cnh"/>            
            <input type="text" placeholder="<?php echo $_SESSION['email']; ?>" name="email"/>         
            <button>Alterar</button>
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