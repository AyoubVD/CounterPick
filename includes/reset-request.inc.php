<?php 

    
    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);

    $url = "https://counterpick.helpimstuckatschool.be/create-new-password.php?selector=" . $selector."&validator=" . bin2hex($token);

    $expires = date("U") + 1800;

    require 'dbh.inc.php';

    $userEmail = $_POST["email"];

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
    }

    $sql = "INSERT INTO pwdReset(pwdResetEmail,pwdResetSelector,pwdResetToken,pwdResetExpires) VALUES(?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
        echo "There was error!";
        exit();
    }
    else
    {
        $hashedToken = password_hash($token,PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt,"ssss",$userEmail,$selector,$hashedToken,$expires);
        mysqli_stmt_execute($stmt);
    }
    mysqli_stmt_close($stmt);
    mysqli_close();


    $to = $userEmail;

    $subject = 'Reset your password';

    $message = '<p>We recieved a password reset request. The link to reset your password is below.If you did not 
    make this request, you can ignore this email</p>';
    $message .= '<p>Here is your password link:</br>';
    $message .= "<a href='$url'> $url </a></p>";

    $headers = "From:counterpicksupport <r0754504@student.thomasmore.be>\r\n";
    $headers .= "Reply-To: r0754504@student.thomasmore.be\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    mail($to,$subject,$message,$headers);
    header("location:../reset-password.php?reset=success");
