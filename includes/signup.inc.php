<?php
if (isset($_POST["submit"])) {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $userName = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $repeatpwd = $_POST["repeatpwd"];


    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';
  

    if (emptyInputSignup($name,$email,$userName,$pwd,$repeatpwd) !== false ) {
        header("location:../signup.php?error=emptyinput");
        exit();
    }
    if (invalidUid($userName) !== false) {
        header("location:../signup.php?error=invaliduid");
        exit();
    }
    if (invalidEmail($email) !== false) {
        header("location:../signup.php?error=invalidemail");
        exit();
    }
    if (pwdMatch($pwd,$repeatpwd) !== false) {
        header("location:../signup.php?error=passwordnotthesame");
        exit();
    }
    if (uidExists($conn,$userName,$email) !== false) {
        header("location:../signup.php?error=usernametaken");
        exit();
    }
    if (EmailExists($conn,$email) !== false) {
        header("location:../signup.php?error=Emailtaken");
        exit();
    }

    createUser($conn,$name,$email,$userName,$pwd);
}
else{
    header("location:../signup.php");
}
