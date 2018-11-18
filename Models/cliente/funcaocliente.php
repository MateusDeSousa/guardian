<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 


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

    function login($username, $password){
        $sql = $this->conn->prepare("SELECT username, password FROM tb_cliente WHERE username = :username AND password = :password ");
        $sql->bindValue(":username", $username);
        $sql->bindValue(":password", $password);

        $run = $sql->execute();

        $_SESSION['info'] = $sql->fetchAll(PDO::FETCH_ASSOC);

        // se o array tiver vazio (banco não achou registro), redireciona pra login novamente
    }


    function cadastrar($name, $lastName, $userName, $cnh, $emailAddress, $password){
        $sql = $this->conn->prepare("SELECT * FROM tb_cliente WHERE username = :username");        
        $sql->bindValue(":username", $userName);
        $run = $sql->execute();
        $resultado = $sql->fetch(PDO::FETCH_ASSOC);
        // Verifica se o nome de usuario já existe
        if(!$resultado){
            $sql = $this->conn->prepare("SELECT * FROM tb_cliente WHERE cnh = :cnh");
            $sql->bindValue(":cnh", $cnh);
            $run = $sql->execute();        
            $resultado = $sql->fetch(PDO::FETCH_ASSOC);
        // Verifica se a CNH já está registrada no sistema
            if (!$resultado) {
                $sql = $this->conn->prepare("SELECT * FROM tb_cliente WHERE email = :email");
                $sql->bindValue(":email", $emailAddress);
                $run = $sql->execute();        
                $resultado = $sql->fetch(PDO::FETCH_ASSOC);
        // Verifica se o email já está cadastrado no sistema
                if(!$resultado){
                    $newUser = $this->conn->prepare("INSERT INTO tb_cliente(name, lastname, username, cnh, email, password) VALUES ('$name', '$lastName', '$userName', '$cnh', '$emailAddress', '$password')");
                    $_SESSION['infoCadastro'] = $newUser->execute();
                }else{
                    $_SESSION['erroCadastro'] = '<p style="color: red">Email já existe</p>';
                }
            }else{
                $_SESSION['erroCadastro'] = '<p style="color: red">Cnh já existe</p>';
            }
        }else{
            $_SESSION['erroCadastro'] = '<p style="color: red">usuario já existe</p>';
        }
        
        

        

    }


    function excluir($username){
        $delete = $this->conn->prepare("DELETE FROM tb_cliente WHERE username = '{$username}'");
        $_SESSION['infoDelete'] = $delete->execute();
        

        //$_SESSION['infoDelete'] = $delete->fetch(PDO::FETCH_ASSOC);
    }


    function solicitarDados($username){
        $buscar = $this->conn->prepare("SELECT * FROM tb_cliente WHERE username = :username");
        $buscar->bindValue(":username", $username);
        $run = $buscar->execute();

        /*$update = $this->conn->prepare("UPDATE `tb_cliente` SET `name` = '{$name}', `lastname` = '{$lastname}', `cnh`='{$cnh}', `email`='{$email}', `password`= '{$password}' WHERE `tb_cliente`.`username` = '{$username}'");
        $run = $update->execute();
        */
        $user = $buscar->fetch(PDO::FETCH_ASSOC);
        return $user;
      
        
    }

    function editar($username, $name, $lastname, $cnh, $email){
        
        //-------- Executa o if abaixo se o email e a CNH não for modificada-----------//

        if (strcmp($cnh, $_SESSION['cnh']) == 0 && (strcmp($email, $_SESSION['email']) == 0)) {

            $update = $this->conn->prepare("UPDATE `tb_cliente` SET `name` = '{$name}', `lastname` = '{$lastname}', `cnh`='{$cnh}', `email`='{$email}' WHERE `tb_cliente`.`username` = '{$username}'");
            $run = $update->execute();
            return $run;
        }

        //-------------------------------FIM----------------------------------------//

        //-------- Executa o if abaixo se somente email for modificado-----------//

        if (strcmp($cnh, $_SESSION['cnh']) == 0) {
            $sql = $this->conn->prepare("SELECT * FROM tb_cliente WHERE email = :email");
            $sql->bindValue(":email", $email);
            $run = $sql->execute();        
            $user = $sql->fetch(PDO::FETCH_ASSOC);
            
            // Verifica se o email já está cadastrado no sistema
            if($user == false){
                $update = $this->conn->prepare("UPDATE `tb_cliente` SET `name` = '{$name}', `lastname` = '{$lastname}', `cnh`='{$cnh}', `email`='{$email}' WHERE `tb_cliente`.`username` = '{$username}'");
                $run = $update->execute();
                return $run;
                exit();            
            }else{
                $_SESSION['AlterarUser'] = '<p style="color: red">Email já existe</p>';
            }
        }

        //---------------------------------FIM do IF---------------------------------//

        //-------- Executa o if abaixo se somente a CNH for modificada-----------//

        if (strcmp($email, $_SESSION['email']) == 0) {
            $sql = $this->conn->prepare("SELECT * FROM tb_cliente WHERE cnh = :cnh");
            $sql->bindValue(":cnh", $cnh);
            $run = $sql->execute();        
            $user = $sql->fetch(PDO::FETCH_ASSOC);
            
            // Verifica se a CNH já está registrada no sistema
            if($user == false){
                $update = $this->conn->prepare("UPDATE `tb_cliente` SET `name` = '{$name}', `lastname` = '{$lastname}', `cnh`='{$cnh}', `email`='{$email}' WHERE `tb_cliente`.`username` = '{$username}'");
                $run = $update->execute();
                return $run;
                exit();            
            }else{
                $_SESSION['AlterarUser'] = '<p style="color: red">CNH já existe</p>';
            }
        }

        //---------------------------------------FIM do IF----------------------------//

        //-------- Executa o if abaixo se o email e a CNH forem modificados-----------//

        if (strcmp($cnh, $_SESSION['cnh']) != 0 && (strcmp($email, $_SESSION['email']) != 0)) {

            $sql = $this->conn->prepare("SELECT * FROM tb_cliente WHERE cnh = :cnh");
            $sql->bindValue(":cnh", $cnh);
            $run = $sql->execute();        
            $resultado = $sql->fetch(PDO::FETCH_ASSOC);
        // Verifica se a CNH já está registrada no sistema
            if (!$resultado) {
                $sql = $this->conn->prepare("SELECT * FROM tb_cliente WHERE email = :email");
                $sql->bindValue(":email", $email);
                $run = $sql->execute();        
                $resultado = $sql->fetch(PDO::FETCH_ASSOC);
        // Verifica se o email já está cadastrado no sistema
                if(!$resultado){
                    $update = $this->conn->prepare("UPDATE `tb_cliente` SET `name` = '{$name}', `lastname` = '{$lastname}', `cnh`='{$cnh}', `email`='{$email}' WHERE `tb_cliente`.`username` = '{$username}'");
                    $run = $update->execute();
                    return $run;
                    exit();
                }else{
                    $_SESSION['erroCadastro'] = '<p style="color: red">Email já existe</p>';
                }
            }else{
                $_SESSION['erroCadastro'] = '<p style="color: red">Cnh já existe</p>';
            }
        }

        //------------------------------------FIM do IF----------------------------------------------//

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
            echo "<meta HTTP-EQUIV='Refresh' CONTENT='3;URL=../../Views/cliente/login_sucessoclient.html'>";
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