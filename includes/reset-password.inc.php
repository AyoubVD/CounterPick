<?php 

if (isset($_POST["reset-password-submit"])) {
    


    $selector = $_POST["selector"];
    $validator = $_POST["validator"];
    $Password = $_POST["pwds"];
    $passwordRepeat = $_POST["pwd-repeat"];

    if (empty($Password) || empty($passwordRepeat)) {
        header("location:../signup.php?newpwd=empty");
        exit();
    }
    else if ($Password != $passwordRepeat) {
        header("location:../signup.php?newpwd=pwdnotsame");
        exit();
    }

    $currentDate = date("U");

    require 'dbh.inc.php';

    $sql = "SELECT* FROM pwdReset WHERE pwdResetSelector=? AND pwdResetExpires >= ";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
        echo "There was error!";
        exit();
    }
    else
    {
        mysqli_stmt_bind_param($stmt,"ss",$selector,$currentDate);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        if (!$row = mysqli_fetch_assoc($result)) {
        echo "You need to re-submit your reset request.";
        exit();
        }
        else
        {
            $tokenBin = hex2bin($validator);
            $tokenCheck = password_verify($tokenBin,$row["pwdResetToken"]);


            if ($tokenCheck == false) {
                echo "You need to re-submit your reset request.";
        exit();
            }
            elseif ($tokenCheck == true) {
                $tokenEmail = $row['pwdResetEmail'];


                $sql = "SELECT * FROM users WHERE emailUseres=?;";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt,$sql)) {
                    echo "There was error!";
                    exit();
                }
                else
                {
                    mysqli_stmt_bind_param($stmt,"s",$tokenEmail);
                    mysqli_stmt_execute($stmt);
                    if (!$row = mysqli_fetch_assoc($result)) {
                        echo "There was an error!";
                        exit();
                    }
                    else
                    {
                        $sql ="UPDATE users SET usersPwd=? WHERE usersEmail=?";
                        $stmt = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($stmt,$sql)) {
                        echo "There was error!";
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
                            echo "There was error!";
                            exit();
                        }
                        else
                        {
                            mysqli_stmt_bind_param($stmt,"s",$userEmail);
                            mysqli_stmt_execute($stmt);
                            header("location:../signup.php?newpwd=passwordupdated");
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