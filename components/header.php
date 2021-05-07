<header>
<?php session_start(); ?>
    <a href="index.php"><img id="logo" src="img/logo.png"></a>
    <ul>
        <li>
            <a href="recruit.php" >Recruit</a>
        </li>
        <li>
            <a href="play.php">Play</a>
        </li>
        <li>
            <a href="contact.php">Contact</a>
        </li>
        <li>
            <?php
                if($_SESSION['loggedIn']==false){
                    ?>
                        <a href="signup.php">Sign up</a>
                    <?php
                }else{
                    ?>
                        <a href="login.php">Login</a>
                    <?php
                } 
            ?>
        </li>
    </ul>
</header>