<?php
// configura fuso horario padrao
//date_default_timezone_set('America/Sao_Paulo');

//conexão simples com o banco
class config {
    var $servidor = "localhost";
    var $usuario = "root";
    var $senha = "";
    var $dbname = "guardian";
}

$server = 'localhost';
$user = 'root';
$pass = '';
$db = 'guardian';

$CON = mysqli_connect($server, $user, $pass, $db);

?>