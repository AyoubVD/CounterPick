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
    <div class="container-fluid" style="background-image: url('https://i.ytimg.com/vi/QzxSg4EfV60/maxresdefault.jpg');height:200px;"></div>      
    <header>
        <nav class="navbar navbar-inverse navbar-static-top" data-spy="affix" data-offset-top="197">
            <ul class="nav navbar-nav" style="padding-left: 10%;float:right; "> 
                <?php 
                    include_once './includes/init.php';
                    if(isset($_SESSION['user_id']) && isset($_SESSION['email'])){
                        $user_data = $user_obj->find_user_by_id($_SESSION['user_id']);
                        if($user_data ===  false){
                            header('Location: logout.php');
                            exit;
                        }
                        echo "<a href='indexafterlogin.php'><img id='logo' src='img/logo.png'></a>";
                        echo "<li><a href='recruit.php'>Find Team</a></li>";
                        echo "<li><a href='standingafter.php'>Standing</a></li>";
                        echo "<li><a href='play_after_log_in.php'>Play</a></li>";
                        echo "<li><a href='profile.php'>Profile</a></li>";
                        echo "<li><a href='./includes/logout.inc.php'>Log out</a></li>";
                        echo "<li><a href='contact.php'>Contact</a></li>";
                        echo "<li><a href='settings.php'>Settings</a></li>";                     
                        }   
                    else
                    {
                        echo "<a href='index.php'><img id='logo' src='img/logo.png'></a>";
                        echo "<li><a href='login_as.php'>Recruit</a></li>";
                        echo "<li><a href='standing.php'>Standing</a></li>";
                        echo "<li><a href='play.php'>Play</a></li>";
                        echo "<li><a href='signup_as.php'>Sign up</a></li>";
                        echo "<li><a href='login_as.php'>Login</a></li>";
                        echo "<li><a href='contact_login.php'>Contact</a></li>";
                    }           
                ?>
            </ul>
        </nav>
    </header>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
 

