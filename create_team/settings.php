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
    <form action="Profile_update.php" method="post"  style = "display: flex; 
                        flex-wrap: wrap;
                        align-items: center;
                        border: 1px solid rgba(23,23,23, .2);
                        margin: 5px;
                        padding: 50px;
                        width: 20%;
                        background-color: #FFF;
                        align-items: stretch;
                        display: flex;
                        flex-wrap: wrap;
                        justify-content: center;
                        text-align: center;
                        align-content: center;
                        margin-left: auto;
                        margin-right: auto;
                        background-image: url(https://images2.minutemediacdn.com/image/upload/c_fill,w_1200,h_630,f_auto,q_auto,g_auto/shape/cover/sport/5c2cd98abb4b87834e000001.jpeg);color:white;">
           <h1>Change goal or looking for</h1>
           <h2>Team goal:</h2>
    <textarea style="color:black;" rows="5" type="text" name="bio"  cols="30"></textarea><br>
    <input style="color:black;" type="submit" name="bio_update" value="edit">
    <br>
    <br>
    <h2>looking for:</h2>
    <textarea style="color:black;" rows="5" type="text" name="looking"  cols="30"></textarea><br>
    <input style="color:black;" type="submit" name="looking_update" value="edit">
   
</form>      
<?php include_once "footer.php" ?>
</body>
</html>