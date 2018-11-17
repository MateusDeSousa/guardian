<?php
session_start();
$_SESSION['loggedin'] = false;
unset($_SESSION['loggedin']);
unset($_SESSION['currentkey']);
unset($_SESSION['usuario']);
header('location: ../../index.php' );

?>