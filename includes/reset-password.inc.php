<?php 

if (isset($_POST["reset-password-submit"])) {
    
    

    $selector = $_POST["selector"];
    $validator = $_POST["validator"];
    $Password = $_POST["pwds"];
    $passwordRepeat = $_POST["pwd-repeat"];
    
   
    if (empty($Password) || empty($passwordRepeat)) {
        header("location:../error_succeshandels.php?error=emptypassword");
        exit();
    }
    else if ($Password != $passwordRepeat) {
        header("location:../error_succeshandels.php?error=passwordnotsame");
        exit();
    }

    $currentDate = date("U");
    
    require 'dbh.inc.php';

    $sql = "SELECT * FROM pwdReset WHERE pwdResetSelector=? AND pwdResetExpires >= ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
        echo "There was error1!";
        exit();
    }
    else
    {
        mysqli_stmt_bind_param($stmt,"ss",$selector,$currentDate);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if (!$row = mysqli_fetch_assoc($result)) {
        echo "You need to re-submit your reset request1";
        exit();
        }
        else
        {
            $tokenBin = hex2bin($validator);
            $tokenCheck = password_verify($tokenBin,$row["pwdResetToken"]);


            if ($tokenCheck === false) {
                echo "You need to re-submit your reset request2";
                exit();
            }
            elseif ($tokenCheck === true) {
                $tokenEmail = $row["pwdResetEmail"];
                $sql = "SELECT * FROM users WHERE user_email=?;";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt,$sql)) {
                    echo "There was error2!";
                    exit();
                }
                else
                {
                    mysqli_stmt_bind_param($stmt,"s",$tokenEmail);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    if (!$row = mysqli_fetch_assoc($result)) {
                        echo "There was an error!3";
                        exit();
                    }
                    else
                    {
                        $sql ="UPDATE users SET user_password=? WHERE user_email=?";
                        $stmt = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($stmt,$sql)) {
                        echo "There was error!4";
                        exit();
                        }
                        else
                        {
                        $newPwdHash = password_hash($Password,PASSWORD_DEFAULT);
                        mysqli_stmt_bind_param($stmt,"ss",$newPwdHash,$tokenEmail);
                        mysqli_stmt_execute($stmt);

                        $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?";
                        $stmt = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($stmt,$sql)) {
                            echo "There was error!5";
                            exit();
                        }
                        else
                        {
                            mysqli_stmt_bind_param($stmt,"s",$userEmail);
                            mysqli_stmt_execute($stmt);
                            header("location:../error_succeshandels.php?newpwd=passwordupdated");
                        }

                        }

                    }
                }
            }

        }
    }


}
else{
    header("location:../index.php");
   
}