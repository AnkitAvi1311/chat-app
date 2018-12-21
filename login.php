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
    <title>Login</title>
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
        #login-form{
            font-family: Helvetica, sans-serif;
            font-size: 20px;
            margin-top: 30px;
            padding: 10px 10px;
        }
        #login-form .title{
            position: relative;
            z-index: 4;
            margin-bottom: 30px;
        }
        #login-form label{
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
        #login-form input[type="text"],#login-form input[type="email"],#login-form input[type="password"]{
            padding: 15px 25px;
            width: 100%;
            font-size: 18px;
            border: 1px solid #20C1CC;
            border-radius: 5px;
            color: grey;
        }
        #login-form input[type="text"]:focus+label, #login-form input[type="text"]:valid+label,#login-form input[type="email"]:focus+label, #login-form input[type="email"]:valid+label,
        #login-form input[type="password"]:focus+label, #login-form input[type="password"]:valid+label{
            top: -10px;
            font-size: 15px;
        }
        #login-form input[type="text"]:focus,#login-form input[type="email"]:focus,#login-form input[type="password"]:focus{
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
    <form action="models/login.php" method="POST" id="login-form">
        <div class="title">
            <input type="email" required="required" id="email" name="email">
            <label for="email">Email Address</label>
        </div>
        <div class="title">
            <input type="password" required="required" id="password" name="password">
            <label for="password">Password</label>
        </div>
        <div>
            <div style="margin-top: 10px; font-size: 16px;margin-bottom: 20px;text-align:right">
                <a href="forget.php" style="text-decoration: none;color:dodgerblue;">Forgot Password?</a>
            </div>
            <input type="submit" value="Login" name="submit">
        </div>
        <div style="margin-top: 30px; font-size: 16px;">
            Don't have an account? <a href="signup.php" style="text-decoration: none;color:dodgerblue;">Create here</a>
        </div>    
    </form>

    
    <script src="app.js"></script>
    <script>
    let form = getId("login-form");
    //let email = getId("email");
    form.onsubmit = function(e) {
        let email = getId("email").value;
        if(!validateEmail(email)){
            alert("invalid email address")
            e.preventDefault();
        }
    }    
    
    </script>
</body>
</html>