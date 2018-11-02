<?php
include_once '../config/config.php';

$username = $_POST['username'];
$password = $_POST['password'];
$passwordMD5 = md5($password); // md5 do password pra comparar no banco

$sql = "SELECT username, password FROM tb_cliente WHERE username = '{$username}' AND password = '{$passwordMD5}' ";
$query = mysqli_query($conex, $sql);

// array de informação do banco
$info = mysqli_fetch_assoc($query);

// se o array tiver vazio (banco não achou registro), redireciona pra login novamente
if(empty($info)) {
  echo 'Login sem sucesso, verifique os campos e tente novamente.';
  echo '<meta HTTP-EQUIV="Refresh" CONTENT="3;URL=../index.php">';
} else {
  header('location:../views/index.html'); // se o array não estiver vazio (banco encontrou registro), redireciona pra index
}






/*
// Checa se já está logado para mover para pagina home

if ($user->is_logged_in() && !empty($_SESSION['currentkey'])) {
    header('Location: ../views/index.html');
    exit();
}


// Processa login se o formulario for enviado
if (isset($_POST['submit'])) {

    if (!isset($_POST['username'])) {
        $error[] = "Favor completar todos os campos";
    }

    if (!isset($_POST['password'])) {
        $error[] = "Favor completar todos os campos";
    }

    $username = $_POST['username'];
    if ($user->isValidUsername($username)) {
        if (!isset($_POST['password'])) {
            $error[] = 'Você deve inserir sua senha.';
        }
        $password = $_POST['password'];

        if ($user->login($username, $password)) {

            $_SESSION['username'] = $username;
            $_SESSION['loggedin'] = true;
            $curdatetime = date("Y-m-d H:i:s");
            $cursessionval = $_SESSION['currentkey'];
            $userkey = $_SESSION['memberID'];
            $stmt = $db->prepare("UPDATE members SET lastlogin =:currentdatetime, cursession=:sessionval WHERE memberID=:memberid");
            $stmt->execute(array(
                ':currentdatetime' => $curdatetime,
                ':sessionval' => $cursessionval,
                ':memberid' => $_SESSION['memberID'],
            ));

            //header('Location: dashboard/src/views/index.php');
            exit;

        } else {
            $error[] = 'Usuario ou senha errados, ou sua conta ainda não está ativa.';
        }
    } else {
        $error[] = 'Usuários só podem conter letras ou números e conter entre 3 e 16 caracteres.';
    }

}*/



?>