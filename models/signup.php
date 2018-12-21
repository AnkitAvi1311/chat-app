<?php 

// including the required database file
if(file_exists("../database/connection.php")){
    include_once "../database/connection.php";
}
include_once "../core/checkSession.php";

function getVal($name){
    $val = htmlspecialchars(trim($_POST[$name]));
    return $val;
}

// class required to signup the user
class Signup {
    private $fname;
    private $email;
    private $password;

    // constructor for the class
    public function __construct() {
        $this->formData();
        $this->singup();
    }

    // function to take the form data via POST
    private function formData() {
        if(isset($_POST['submit'])){
            $this->fname = getVal("fname");
            $this->email = getVal("email");
            $this->password = password_hash(getVal("password"), PASSWORD_DEFAULT);
            echo "<br/>".$this->fname;
            echo "<br/>".$this->email;
            echo "<br/>".$this->password;
            if(Connection::checkEmail($this->email) == true) {
                echo "<br/>Valid Email address";
            }else{
                echo "<br/>Invalid Email Address";
            }
        }else{
            header("location: ../signup.php");   
        }
    }

    private function singup() {
        global $connection;
        $sql = "INSERT INTO login (fname, email, pwd) VALUES ('$this->fname', '$this->email', '$this->password')";
        if($connection->insertData($sql)){
            echo "<br/> Signup Succesful";
            exit;
        }else{
            echo "<br/>user already exists";
            exit;
        }
    }
}

$signup = new Signup();