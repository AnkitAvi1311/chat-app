<?php 
include "core/loggedinstatus.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="manifest" href="manifest.json">
    <title>forgot</title>
    <style>
        *{
            box-sizing: border-box;
        }
        .logo{
            font-size: 65px;
            text-align: center;
            font-family: Helvetica, sans-serif;
            color: #11D9AA;
            font-weight: bold;
            padding: 50px 0px 0px;
            text-shadow: 2px 3px 6px rgba(0,0,0,.16);
        }
        #forgot-form{
            font-family: Helvetica, sans-serif;
            font-size: 20px;
            margin-top: 30px;
            padding: 10px 10px;
        }
        #forgot-form .title{
            position: relative;
            z-index: 4;
            margin-bottom: 30px;
        }
        #forgot-form label{
            background: white;
            color: #20C1CC;
            transition: all .2s linear;
            position: absolute;
            top: 15px;
            left: 15px;
            z-index: 0;
            cursor: text;
            padding: 0px 10px;
        }
        #forgot-form input[type="text"],#forgot-form input[type="email"],#forgot-form input[type="password"]{
            padding: 15px 25px;
            width: 100%;
            font-size: 18px;
            border: 1px solid #20C1CC;
            border-radius: 5px;
            color: grey;
        }
        #forgot-form input[type="text"]:focus+label, #forgot-form input[type="text"]:valid+label,#forgot-form input[type="email"]:focus+label, #forgot-form input[type="email"]:valid+label,
        #forgot-form input[type="password"]:focus+label, #forgot-form input[type="password"]:valid+label{
            top: -10px;
            font-size: 15px;
        }
        #forgot-form input[type="text"]:focus,#forgot-form input[type="email"]:focus,#forgot-form input[type="password"]:focus{
            outline: none;
        }
        input[type="submit"] {
            width: 100%;
            width: 100%;
            font-size: 18px;
            background: #00D5CE;
            color: white;
            cursor: pointer;
            border-radius: 5px;
            padding: 15px 25px;
            border: none;
            box-shadow: 2px 3px 6px rgba(0,0,0,.16);
        }
    </style>
</head>
<body>
    
    <div class="logo">
        <span style="text-decoration: overline;">hell</span>o
    </div>
    <form action="models/forgot.php" method="POST" id="forgot-form">
        <div class="title">
            <input type="email" required="required" id="email" name="email">
            <label for="email">Email Address</label>
        </div>
        <div>
            <input type="submit" value="Reset Password" name="submit">
        </div>
        <div style="margin-top: 30px; font-size: 16px;">
            Already have an account? <a href="login.php" style="text-decoration: none;color:dodgerblue;">Login here</a>
        </div>    
    </form>

    
    <script src="app.js"></script>
    <script>
    let form = getId("forgot-form");
    //let email = getId("email");
    form.onsubmit = function(e) {
        e.preventDefault();
        let email = getId("email").value;
        if(!validateEmail(email)){
            alert("invalid email address")
        }else{
            sendForgetEmail();
            form.reset();
        }
    }    
    </script>
</body>
</html>