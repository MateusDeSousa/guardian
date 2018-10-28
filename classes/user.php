<?php
@session_start();
include 'password.php';
class User extends Password
{

    private $_db;

    public function __construct($db)
    {
        parent::__construct();

        $this->_db = $db;
    }

    private function get_user_hash($username)
    {

        try {
            $stmt = $this->_db->prepare('SELECT `userkey`, `password`, `username`, `email`, `memberID` FROM members WHERE `username` = :username OR `email`=:email AND `userstatus`="Active" ');
            $stmt->execute(array(':username' => $username, ':email' => $username));

            return $stmt->fetch();

        } catch (PDOException $e) {
            echo '<p>' . $e->getMessage() . '</p>';
        }
    }

    public function isValidUsername($username)
    {
        if (strlen($username) < 3) {
            return false;
        }

        if (strlen($username) > 40) {
            return false;
        }

        //if (!ctype_alnum($username)) return false;
        return true;
    }

    public function login($username, $password)
    {
        if (!$this->isValidUsername($username)) {
            return false;
        }

        if (strlen($password) < 3) {
            return false;
        }

        $row = $this->get_user_hash($username);

        if ($this->password_verify($password, $row['password']) == 1) {
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $row['username'];
            $_SESSION['memberID'] = $row['memberID'];
            $_SESSION['userkey'] = $row['userkey'];
            $_SESSION['currentkey'] = md5(uniqid(rand(), true));

            $stmt = $this->_db->prepare("UPDATE members SET cursession = :newsession WHERE memberID=:memberid");
            $stmt->execute(array(
                ':newsession' => $_SESSION['currentkey'],
                ':memberid' => $_SESSION['memberID'],
            ));

            return true;
        }
    }

    public function is_logged_in()
    {
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
            return true;
        }
    }

    public function logout()
    {
        session_destroy();
        $_SESSION['loggedin'] = false;
        unset($_SESSION['loggedin']);
        unset($_SESSION['currentkey']);
        unset($_SESSION['username']);
        unset($_SESSION['memberID']);
        unset($_SESSION['userkey']);
    }
}
