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
    <script src="./header.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./css/index.css">
    <link rel="stylesheet" type="text/css" href="./css/general.css" >
    <link rel="shortcut icon" type="image/png" href="./img/logowhite.jpg">
</head>
<body>
<div class="container-fluid" style="background-color:#F44336;color:#fff;height:200px;">
  <h1>Bootstrap Affix Example</h1>
  <h3>Fixed (sticky) navbar on scroll</h3>
  <p>Scroll this page to see how the navbar behaves with data-spy="affix".</p>
  <p>The navbar is attached to the top of the page after you have scrolled a specified amount of pixels.</p>
</div>

    <div id="container">
        
<header>
<nav class="navbar navbar-inverse navbar-static-top" data-spy="affix" data-offset-top="197">
  
    
    <ul class="nav navbar-nav" style="padding-left: 10%;float:right;"> 
    <a href="index.php"><img id="logo" src="img/logo.png"></a>
      <?php    
            if (isset($_SESSION["useruid"])) {
                echo "<li><a href='recruit.php'>Recruit</a></li>";
                echo "<li><a href='playafterlogin.php'>Play</a></li>";
                echo "<li><a href='profile.php'>Profile</a></li>";
                echo "<li><a href='createteam.php'>Create Team</a></li>";
                echo "<li><a href='./includes/logout.inc.php'>Log out</a></li>";
                echo "<li><a href='contact.php'>Contact</a></li>"; 
            }
            else
            {
                echo "<li><a href='login.php'>Recruit</a></li>";
                echo "<li><a href='play.php'>Play</a></li>";
                echo "<li><a href='signup.php'>Sign up</a></li>";
                echo "<li><a href='login.php'>Login</a></li>";
                echo "<li><a href='contact.php'>Contact</a></li>";              
            }     
      ?>
    </ul>
</nav>
</header>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

