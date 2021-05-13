<?php 
function emptyInputContact($from,$last_name,$first_name) {
    $result;
    if (empty($from)|| empty($last_name)|| empty($first_name)) {
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function emptyInputSignup($name,$email,$userName,$pwd,$repeatpwd) {
    $result;
    if (empty($name) || empty($email) || empty($userName) || empty($pwd) || empty($repeatpwd)) {
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}
function invalidUid($userName) {
    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/",$userName )) {
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}
function invalidEmail($email) {
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}
function invalidSender($from) {
    $result;
    if (!filter_var($from, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}
function pwdMatch($pwd,$repeatpwd) {
    $result;
    if ($pwd !== $repeatpwd) {
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}
function uidExists($conn,$userName) {
   $sql ="SELECT * FROM users WHERE usersUid = ?;";
   $stmt = mysqli_stmt_init($conn);
   if (!mysqli_stmt_prepare($stmt,$sql)) {
    header("location:../signup.php?error=failedexist");
    exit();
   }

   mysqli_stmt_bind_param($stmt,"s",$userName);
   mysqli_stmt_execute($stmt);

   $resultData = mysqli_stmt_get_result($stmt);

   if ($row = mysqli_fetch_assoc($resultData)) {
      return $row;
   }
   else{
       $result = false;
       return $result;
   }

   mysqli_stmt_close($stmt);
}
function EmailExists($conn,$email) {
    $sql ="SELECT * FROM users WHERE usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
     header("location:../signup.php?error=failedexist");
     exit();
    }
 
    mysqli_stmt_bind_param($stmt,"s",$email);
    mysqli_stmt_execute($stmt);
 
    $resultData = mysqli_stmt_get_result($stmt);
 
    if ($row = mysqli_fetch_assoc($resultData)) {
       return $row;
    }
    else{
        $result = false;
        return $result;
    }
 
    mysqli_stmt_close($stmt);
 }

function createUser($conn,$name,$email,$userName,$pwd) {
    $sql ="INSERT INTO users (userName, usersEmail, usersUid , usersPwd) VALUES(?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
     header("location:../signup.php?error=failedtocreate");
     exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
 
    mysqli_stmt_bind_param($stmt,"ssss",$name,$email,$userName,$hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location:../error_succeshandels.php?error=none");
     exit();
 }

 function emptyInputLogin($userName,$pwd) {
    $result;
    if (empty($userName) || empty($pwd)) {
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function loginUser($conn,$userName,$pwd){
    $uidExists = uidExists($conn,$userName,$userName);

    if ($uidExists == false) {
     header("location:../login.php?error=wronglogin");
     exit();
    }

    $pwdHashed = $uidExists["usersPwd"];
    $checkPwd = password_verify($pwd,$pwdHashed);

    if ($checkPwd == false) {
     header("location:../login.php?error=wronglogin");
     exit();
    }
    else if ($checkPwd == true){
        session_start();
        $_SESSION["userid"] = $uidExists["usersId"];
        $_SESSION["useruid"] = $uidExists["usersUid"];
        header("location:../error_succeshandels.php?log=in");
        exit();
    }

}