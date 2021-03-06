<?php
session_start();
if(!isset($_SESSION['user'])){
    header("location: index.php");
}else{
    $user = $_SESSION['user'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
    <?php
    echo $_SESSION['user']['fname'];
    ?>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=0">
    <link rel="manifest" href="manifest.json">
    <style>
        *{
            box-sizing: border-box;
        }

    </style>
</head>
<body>
    <h1>User Logged in</h1>
    <h3><?php echo $user['id']; ?></h3>
    <h3><?php echo $user['fname']; ?></h3>
    <a href="logout.php">Logout</a> </br>
    <input type="email" id="email" placeholder="Enter email">
    <button id="send">Add Friend</button>
    
    <script src="app.js"></script>
    <script>
        let button = getId("send");
        button.onclick = function() {
            console.log("hello world");
            let email = getId("email").value;
            sendRequest(email);
        }
    </script>
</body>
</html>