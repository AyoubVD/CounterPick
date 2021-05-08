<?php 

if (isset($_POST["reset-request-submit"])) {
    
    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);

    $url = "https://counterpick.helpimstuckatschool.be/forgottenpwd/create-new-password.php?"
}
else{
    header("location:../index.php");
   
}