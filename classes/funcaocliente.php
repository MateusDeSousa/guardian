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

    function login($username, $password){
        $sql = $this->conn->prepare("SELECT username, password FROM tb_cliente WHERE username = :username AND password = :password ");
        $sql->bindValue(":username", $username);
        $sql->bindValue(":password", $password);

        $run = $sql->execute();

        $info = $sql->fetchAll(PDO::FETCH_ASSOC);

        // se o array tiver vazio (banco não achou registro), redireciona pra login novamente
        if(empty($info)) {
            header('location:../../index.php'); // se o array não estiver vazio (banco encontrou registro), redireciona pra index            
            $_SESSION['msn'] = '<p style="color: red">Login não efetuado</p><br>';
        } else {
            header('location:../../views/index.html'); // se o array não estiver vazio (banco encontrou registro), redireciona pra index
        }
    }


    function cadastrar($name, $lastName, $userName, $cnh, $emailAddress, $password){
        $newUser = $this->conn->prepare("INSERT INTO tb_cliente(name, lastname, username, cnh, email, password) VALUES ('$name', '$lastName', '$userName', '$cnh', '$emailAddress', '$password')");
        $run = $newUser->execute();

        if ($run) {
            $_SESSION['msg'] = "<p style='color: green'>Seu cadastro foi realizado com sucesso</p>";
            echo "<meta HTTP-EQUIV='Refresh' CONTENT='3;URL=../../views/index.html'>";
            echo '<h3>Cadastro efetuado com sucesso!!</h3><br>';
            echo '<p>Redirecionando para página principal...</p>';
        } else {
            $_SESSION['msg'] = "<p style='color: red'>ops!! cadstro não realizado</p>";
            echo "<meta HTTP-EQUIV='Refresh' CONTENT='3;URL=../index.php'>";
            echo '<h3>Ocorreu um erro no cadastro :(</h3><br>';
            echo '<p>Tente novamente...</p>';
            echo '<p>Redirecionando...</p>';
        }

    }


    function excluir($username){
        $delete = $this->conn->prepare("DELETE FROM tb_cliente WHERE username = '{$username}'");
        $run = $delete->execute();

        if($run){
            echo '<meta HTTP-EQUIV="Refresh" CONTENT="3;URL=../../index.php">';            
            echo '<h3>Usuario deletado com sucesso!!</h3><br>';
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



    function gerarchave($email){
        $query = $this->conn->prepare("SELECT * FROM tb_cliente WHERE email = :email");        
        $query->bindValue(":email", $email);
        $run = $query->execute();

        $info = $query->fetch(PDO::FETCH_ASSOC);

        if ($info) {
            $chave = md5($info["username"].$info["password"]);
            return $chave;
        } else {
            echo '<h1>Erro ao gerar chave</h1>';   
        }
        
    }


    function validarchave($email, $chave){
        $query = $this->conn->prepare("SELECT * FROM tb_cliente WHERE email = :email");        
        $query->bindValue(":email", $email);
        $run = $query->execute();

        $info = $query->fetch(PDO::FETCH_ASSOC);

        if ($info) {
            $chaveoriginal = md5($info["username"].$info["password"]);
            if ($chave == $chaveoriginal) {
                return $info["username"];

            } 
        }
    }


    function novasenha($password, $username){
        $update = $this->conn->prepare("UPDATE `tb_cliente` SET `password`= '{$password}' WHERE `tb_cliente`.`username` = '{$username}'");
        $run = $update->execute();
        if($run){
            echo "<meta HTTP-EQUIV='Refresh' CONTENT='3;URL=../../views/index.html'>";
            echo '<h3>Senha alterada com sucesso!!</h3><br>';
            echo '<p>Redirecionando para página principal...</p>';
        } else{
            echo '<h3>Ocorreu um erro ao alterar senha :(</h3><br>';
            echo '<p>Tente novamente mais tarde</p>';
            echo '<p>Redirecionando...</p>';
        }
    }
}
?>