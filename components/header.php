<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Counter Pick</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--
        Pas de naam aan van JS
        <script src="index.js"></script>
    -->
    <link rel="stylesheet" type="text/css" href="./css/index.css">
    <link rel="stylesheet" type="text/css" href="./css/general.css" >
    <link rel="shortcut icon" type="image/png" href="./img/logowhite.jpg">
</head>
<body>
    <div id="container">
        
<header>
<nav class="nk-navbar nk-navbar-top nk-navbar-sticky nk-navbar-autohide">
    <a href="index.php"><img id="logo" src="img/logo.png"></a>
    <ul>
      <?php
        
            if (isset($_SESSION["useruid"])) {
                echo "<li><a href='recruit.php'>Recruit</a></li>";
                echo "<li><a href='playafterlogin.php'>Play</a></li>";
                echo "<li><a href='profile.php'>Profile</a></li>";
                echo "<li><a href='createteam.php'>Create Team</a></li>";
                echo "<li><a href='./includes/logout.inc.php'>Log out</a></li>";
               
            }
            else
            {
                echo "<li><a href='login.php'>Recruit</a></li>";
                echo "<li><a href='play.php'>Play</a></li>";
                echo "<li><a href='signup.php'>Sign up</a></li>";
                echo "<li><a href='login.php'>Login</a></li>";
                               
            }     
      ?>
    <li><a href="contact.php">Contact</a></li>
        
    </ul>
    </nav>
</header>