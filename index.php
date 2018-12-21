<?php
include_once "core/loggedinstatus.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="main.css">
    <link rel="manifest" href="manifest.json">
    <style>
        *{
            box-sizing : border-box;
        }
        .logo{
            font-size: 60px;
            text-align: center;
            font-family: Arial;
            color: dodgerblue;
        }
    </style>
</head>
<body>
    <div class="center">
        <div class="logo">
            <span style="text-decoration: overline;">hell</span>o
        </div>
        <div class="content" style="width: 80%;text-align:center;margin: 50px auto;font-family: arial">
            hello is a community of over 1000s of communities.
            <br/>
            <img src = "http://www.clker.com/cliparts/X/f/p/f/b/l/community.svg" style="width:100%;margin-top: 50px;">
        </div>
        <div class="getstarted">
            <a href="signup.php" id="start">GET STARTED</a>
        </div>
    </div>
    <script src="app.js"></script>
</body>
</html>