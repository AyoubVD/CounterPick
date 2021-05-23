<?php 
if(isset($_POST['submit'])){
    $to = "arno946.lombaerts@hotmail.com"; // this is your Email address
    $from = $_POST['email']; // this is the sender's Email address
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    
    require_once 'functions.inc.php';

    if (emptyInputContact($first_name,$last_name, $from) !== false ) {
        header("location:../contact.php?error=emptyinput");
        exit();
    }
    if (invalidSender($from) !== false) {
        header("location:../contact.php?error=invalidemail");
        exit();
    }  
    $subject1 = "Copy of your form submission";

    $message1 = "copy of your message:" . $first_name . "\n\n" . $_POST['message'];
    $headers1 = "From:counterpicksupport\r\n";
    $headers1 .= "Content-type: text/html\r\n";

    mail($from,$subject1,$message1,$headers1);

    $subject = "Form submission";

    $message = $first_name . " " . $last_name . " wrote the following:" . "\n\n" . $_POST['message'];
    $headers = "From:counterpicksupport\r\n";
    $headers .= "Content-type: text/html\r\n";

    mail($to,$subject,$message,$headers);
    header("location:../error_succeshandels.php?send=success");
}
else{
    header("location:../contact.php");
    }