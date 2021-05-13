<?php 


if(isset($_POST['submit'])){
    $to = "laserblazerx@gmail.com"; // this is your Email address
    $from = $_POST['email']; // this is the sender's Email address
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    
    require_once 'functions.inc.php';

    if (emptyInputcontact($first_name,$last_name, $from) !== false ) {
        header("location:../contact.php?error=emptyinput");
        exit();
    }
    if (invalidSender($from) !== false) {
        header("location:../contact.php?error=invalidemail");
        exit();
    }
    $subject = "Form submission";
    $subject2 = "Copy of your form submission";
    $message1 = $first_name . " " . $last_name . " wrote the following:" . "\n\n" . $_POST['message'];
    $message2 = "Here is a copy of your message " . $first_name . "\n\n" . $_POST['message'];

    $headers1 = "From:" . $from;
    $headers2 = "From:" . $to;
    mail($to,$subject,$message1,$headers1);
    mail($from,$subject2,$message2,$header2); // sends a copy of the message to the sender
    // You can also use header('Location: thank_you.php'); to redirect to another page.
    header("location:../error_succeshandels.php?send=success");
}
else{
    header("location:../contact.php");
    }