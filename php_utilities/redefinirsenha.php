<?php
session_start();
include_once '../config/config.php';
include_once 'funcaocliente.php';

$emailAddress = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);

$result = $conex->gerachaveacesso($emailAddress);
?>