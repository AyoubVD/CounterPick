<?php
include_once 'includes/init.php';
if(isset($_SESSION['user_id']) && isset($_SESSION['email'])){
    $user_data = $user_obj->find_user_by_id($_SESSION['user_id']);
    if($user_data ===  false){
        header('Location: logout.php');
        exit;
    }
    // FETCH ALL USERS WHERE ID IS NOT EQUAL TO MY ID
    $all_users = $user_obj->all_users($_SESSION['user_id']);
}
else{
    header('Location: logout.php');
    exit;
}
// REQUEST NOTIFICATION NUMBER
$get_req_num = $frnd_obj->request_notification($_SESSION['user_id'], false);
// TOTAL FRIENDS
$get_frnd_num = $frnd_obj->get_all_friends($_SESSION['user_id'], false);
?>
<?php include_once "./components/header.php" ?>
<div id="content">       
<?php
if (isset($_GET["error"])) {
   if ($_GET["error"] == "none") {
        echo "<p style='color:green;'>You have signed up!</p>";
    }
    
    if ($_GET["error"] == "emptypassword") {
        echo "<p style='color:red;'>Failed to create no input!</p>";
    }
    if ($_GET["error"] == "passwordnotsame") {
        echo "<p style='color:red;'>Failed to create password not the same!</p>";
    }
}

if (isset($_GET["reset"])) {
    if($_GET["reset"] == "success"){
        echo '<p style="color:green;">Check your e-mail!(check spam) </p>';
    }
}
if (isset($_GET["newpwd"])) {
    if ($_GET["newpwd"] == "passwordupdated") {
        echo '<p style="color:green;">Your password has been reset!</p>';
    }
}
if (isset($_GET["log"])) {
    if ($_GET["log"] == "out") {
        echo '<p style="color:red;">You have been logged out!</p>';
    }
}
if (isset($_GET["log"])) {
    if ($_GET["log"] == "in") {
        echo '<p style="color:green;">You have been logged in!</p>';
    }
}
if (isset($_GET["send"])) {
    if($_GET["send"] == "success"){
        echo "<p style='color:green;'> Mail Sent. Thank you, we will contact you shortly.</p>";
    }
}
?>
</div>      
<?php include_once "./components/footer.php" ?>
</body>
</html>