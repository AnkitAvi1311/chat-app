<?php 

// including the required database file
if(file_exists("../database/connection.php")){
    include_once "../database/connection.php";
}
include_once "../core/checkSession.php";

// class required for login 
class Login {
    private $email;
    private $password;

    // constructor function to login
    public function __construct() {
        $this->getVal();
        $this->login();
    }

    private function getVal() {  // function to get values from the user
        if(isset($_POST['submit'])){
            echo "<br/>Button was pressed";
            $this->email = htmlspecialchars(trim($_POST['email']));
            $this->password = htmlspecialchars(trim($_POST['password']));
        }else{
            echo "<br/>Button was not pressed";
            exit;
        }
    }

    private function login() {
        global $connection;
        $sql = "SELECT id, fname, pwd, email from login WHERE email = '$this->email' LIMIT 1";
        $rows = $connection->getData($sql);
        if($rows !== false) {
            if(password_verify($this->password, $rows['pwd'])){
                $user = array("id"=>$rows['id'], "fname"=>$rows['fname'], "email"=>$rows['email']);
                $_SESSION['user'] = $user;
                header("location: ../profile.php");
                exit;
            }else{
                header("location: ../login.php?error=incorrect password");
                exit;
            }
        }else{
            echo "<br/><b>No users found</b>";
        }
    }

}

$login = new Login();