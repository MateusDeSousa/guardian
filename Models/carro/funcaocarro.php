<?php
    session_start();

    include_once '../../Config/config.php';

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


    function cadastrar($car_brand, $car_model, $year, $seat_qtd, $air_cond, $abs, $sound, $door_qtd, $status, $chassis, $board, $price){
        $erro;

        $buscarChassi = $this->conn->prepare("SELECT * FROM tb_carro WHERE chassis = :chassis");        
        $buscarChassi->bindValue(":chassis", $chassis);
        $executar = $buscarChassi->execute();
        $resultado = $buscarChassi->fetch(PDO::FETCH_ASSOC);
        // Verifica se o chassi já existe
        if(!$resultado){
            $buscarPlaca = $this->conn->prepare("SELECT * FROM tb_carro WHERE board = :board");
            $buscarPlaca->bindValue(":board", $board);
            $executar = $buscarPlaca->execute();        
            $resultado = $buscarPlaca->fetch(PDO::FETCH_ASSOC);
        // Verifica se a placa já está registrada no sistema
            if (!$resultado) {
                //insere carro no banco
                $newcar = $this->conn->prepare("INSERT INTO tb_veiculo(car_brand, car_model, year, seats_qtd, air_cond, abs, sound, door_qtd, status, chassis, board, price) VALUES ('$car_brand', '$car_model', '$year', '$seat_qtd', '$air_cond', '$abs', '$sound', '$door_qtd', '$status', '$chassis', '$price')");
                $executar = $newcar->execute();
                return $executar;
                exit();
            }else{
                $erro = '<p style="color: red">Placa já existe no sistema</p>';
                return $erro;
                exit();
            }            
        }else{
            $erro = '<p style="color: red">Chassi já existe no sistema</p>';
            return $erro;
            exit();
        }
    }


    function excluir($chassis){
        $erro;
        $buscarveiculo = $this->conn->prepare("SELECT * FROM tb_carro WHERE cassis = :chassis ");
        $buscarveiculo->bindValue(":chassis", $chassis)
        $retorno = $buscarveiculo->execute();
        if (!empty($retorno)) {
            $delete = $this->conn->prepare("DELETE FROM tb_carro WHERE chassis = '{$chassis}'");
            $executar = $delete->execute();
            return $executar;    
        }else {
            $erro = '<p style="color: red">Veiculo não encontrado</p>';
            return $erro;
        }
        

        //$_SESSION['infoDelete'] = $delete->fetch(PDO::FETCH_ASSOC);
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