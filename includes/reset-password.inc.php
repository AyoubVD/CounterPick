<?php 

if (isset($_POST["reset-password-submit"])) {
    


 $selector = $_POST["selector"];
 $validator = $_POST["validator"];
 $password = $_POST["pwds"];
 $passwordRepeat = $_POST["pwd-repeat"];

 if (empty($password) || empty($passwordRepeat)) {
    header("location:../signup.php?newpwd=empty");
    exit();
 }
 elseif ($password != $passwordRepeat) {
    header("location:../signup.php?newpwd=pwdnotsame");
    exit();
 }

 $currentDate = date("U");

 require 'dbh.inc.php';

 $sql = "SELECT* FROM pwdReset WHERE pwdResetSelector=? AND pwdResetExpires >= ?";
 $stmt = mysqli_stmt_init($conn);
 if (!mysqli_stmt_prepare($stmt,$sql)) {
    echo "There was error!"
    exit();
}
else
{
    mysqli_stmt_bind_param($stmt,"s",$selector);
    mysqli_stmt_execute($stmt);
}


}
else{
    header("location:../index.php");
   
}