<?php
    session_start();

include_once '../../config/config.php';

class conectar extends config{
    var $conn;
    //Toda vez q criar um objeto conectar, irá criar uma conexão com o banco na variavel conn
    function __construct()
    {
            try {
            $this->conn = new PDO('mysql:host=localhost;dbname=guardian', $this->usuario, $this->senha);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e) {
                echo 'ERROR: ' . $e->getMessage();
            }
    }


    function cadastrar($marca, $modelo, $ano, $qtdlugares, $ac, $abs, $som, $portas, $status, $chassi, $diaria){
        $newcar = $this->conn->prepare("INSERT INTO tb_veiculo(car_brand, car_model, year, seats_qtd, air_cond, abs, sound, door_qtd, status, chassis, value) VALUES ('$marca', '$modelo', '$ano', '$qtdlugares', '$ac', '$abs', '$som', '$portas', '$status', '$chassi', $preco)");
        $run = $newcar->execute();

        if ($run) {
            //echo "<meta HTTP-EQUIV='Refresh' CONTENT='3;URL=../../views/.html'>";
            echo '<h3>Cadastro efetuado com sucesso!!</h3><br>';
            echo '<p>Redirecionando para página principal...</p>';
        } else {
            //echo "<meta HTTP-EQUIV='Refresh' CONTENT='3;URL=../index.php'>";
            echo '<h3>Ocorreu um erro no cadastro :(</h3><br>';
            echo '<p>Tente novamente...</p>';
            echo '<p>Redirecionando...</p>';
        }

    }


    function excluir($chassi){
        $delete = $this->conn->prepare("DELETE FROM tb_veiculo WHERE chassis = '{$chassi}'");
        $run = $delete->execute();

        if($run){
            //echo '<meta HTTP-EQUIV="Refresh" CONTENT="3;URL=../../index.php">';            
            echo '<h3>Carro deletado com sucesso!!</h3><br>';
            echo '<p>Redirecionando para página principal...</p>';
        } else{
            echo '<h3>Ocorreu um erro ao deletar usuario :(</h3><br>';
            echo '<p>Tente novamente...</p>';
            echo '<p>Redirecionando...</p>';
        }
    }


    function editar($name, $lastname, $username, $cnh, $email, $password){
        $update = $this->conn->prepare("UPDATE `tb_cliente` SET `name` = '{$name}', `lastname` = '{$lastname}', `cnh`='{$cnh}', `email`='{$email}', `password`= '{$password}' WHERE `tb_cliente`.`username` = '{$username}'");
        $run = $update->execute();

        if($run){
            echo "<meta HTTP-EQUIV='Refresh' CONTENT='3;URL=../../views/index.html'>";            
            echo '<h3>Usuario editado com sucesso!!</h3><br>';
            echo '<p>Redirecionando para página principal...</p>';
        } else{
            echo '<h3>Ocorreu um erro ao editar usuario :(</h3><br>';
            echo '<p>Tente novamente...</p>';
            echo '<p>Redirecionando...</p>';
        }
        
    }

    function selecionacarro(){
        
    }
}
?>