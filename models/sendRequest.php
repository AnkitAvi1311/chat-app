<?php 

session_start();
$user = $_SESSION['user'];
$sid = $user['id'];
include_once "../database/connection.php";
$email;
if(isset($_POST['email'])){
    $email = $_POST['email'];
}

// function to get receivers id
function getId() {
    global $connection, $email;
    $sql = "SELECT id from login WHERE email='$email' LIMIT 1";
    $result = $connection->getData($sql);
    if($result!==false){
        return $result['id'];
    }else{
        return 0;
    }
}
$rid = getId();

// procedural programming code for sending request to the desired user
if(($rid!==$sid) && $rid!==0) {
    $sql = "SELECT * from friend WHERE (sid='$sid' AND rid='$rid') OR (sid='$rid' AND rid='$sid')";
    $row = $connection->getData($sql);
    if($row!==false) {
        if($row['status']==1 && $row['notif']==0){
            echo "you are already friends";
        }else if($row['status']==0 && $row['notif']==1){
            if($sid == $row['sid']){
                echo "you have already sent a request";
            }else{
                echo "You have received request from this user";
            }
        }else if($row['status']==0 && $row['notif']==0){
            $sql = "UPDATE friend set notif=1 WHERE (sid='$sid' AND rid='$rid') OR (sid='$rid' AND rid='$sid')";
        }
    }else{
        $sql = "INSERT INTO friend (sid, rid, notif) VALUES ('$sid', '$rid', 1)" ;
        if($connection->insertData($sql)){
            echo "Friend Request Sent";
        }else{
            echo "Error sending friend requesT";
        }
    }
}else if($sid == $rid){
    echo "You can't request to yourself dumbass";
}else{
    echo "user doen't exist";
}