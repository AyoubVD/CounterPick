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
<?php include_once "header.php" ?>
    <form action="Profile_update.php" method="post">
           <h1>Change goal or looking for</h1>
           <h2>Team goal:</h2>
    <textarea rows="5" type="text" name="bio"  cols="30"></textarea><br>
    <input type="submit" name="bio_update" value="edit">
    <br>
    <br>
    <h2>looking for:</h2>
    <textarea rows="5" type="text" name="looking"  cols="30"></textarea><br>
    <input type="submit" name="looking_update" value="edit">
   
</form>      
<?php include_once "footer.php" ?>
</body>
</html>