<?php

// class required to establish connection with the database
class Connection {
    private $conn;
    
    // setting up the connection
    public function __construct($servername = "localhost", $username = "root", $password = "", $dbname = "hello-chat"){
        @$this->conn = new mysqli($servername, $username, $password, $dbname);
        if($this->conn->connect_error) {
            echo "Connection failed : <b>".$this->conn->connect_error."</b>";
        }
    }

    // function to getdata from the database
    public function getData($sql) {
        $results = $this->conn->query($sql);
        if($results->num_rows > 0) {
            return $results->fetch_assoc();
        }else{
            return false;
        }
    }

    // function to insert data into the database
    public function insertData($sql) {
        if($this->conn->query($sql)){
            return true;
        }else{
            return false;
        }
    }

    // function to close the connection 
    public function __get($name) {
        return $this->$name;
    }
    public function __destruct() {  // destructor for the class
        $this->conn->close();
    }

    // function make prepared statement and execute them 
    

    public static function checkEmail ($email) { // validating the email address
        $reg = "/^[a-zA-Z0-9\.\-_]+\@[a-zA-Z0-9\.\-_]+\.[a-zA-Z]+$/";
        if(preg_match($reg, $email) === 0) {
            return false;
        }else{
            return true;
        }
    }

}


// opening the connection to the database
$connection = new Connection();