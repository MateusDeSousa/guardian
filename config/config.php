<?php
ob_start();

// configura fuso horario padrao
date_default_timezone_set('America/Sao_Paulo');

// credenciais do banco
define('DBHOST', 'localhost');
define('DBUSER', 'root');
define('DBPASS', '');
define('DBNAME', 'db_guardian'); //define('DBNAME', 'nome_do_banco');


try {
    //cria conexão PDO
    $db = new PDO("mysql:host=" . DBHOST . ";charset=utf8mb4;dbname=" . DBNAME, DBUSER, DBPASS);
    //$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);// descomentar em produção
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // comentar em produção
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

} catch (PDOException $e) {
    // mostra erro
    echo '<p class="bg-danger">' . $e->getMessage() . '</p>';
    exit;
}
/**
 * Cria token CSRF para sessão
 */

// Inclui classe do usuario e passa na conexao do banco
include 'classes/user.php';
include 'classes/phpmailer/mail.php';
$user = new User($db);
?>