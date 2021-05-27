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
<?php
include_once 'includes/init.php';
if(isset($_SESSION['user_id']) && isset($_SESSION['email'])){
    if(isset($_GET['id'])){
        $user_data = $user_obj->find_user_by_id($_GET['id']);
        if($user_data ===  false){
            header('Location: profile.php');
            exit;
        }
        else{
            if($user_data->id == $_SESSION['user_id']){
                header('Location: profile.php');
                exit;
            }
        }
    }
}
else{
    header('Location: logout.php');
    exit;
}
// CHECK FRIENDS
$is_already_friends = $frnd_obj->is_already_friends($_SESSION['user_id'], $user_data->id);
//  IF I AM THE REQUEST SENDER
$check_req_sender = $frnd_obj->am_i_the_req_sender($_SESSION['user_id'], $user_data->id);
// IF I AM THE REQUEST RECEIVER
$check_req_receiver = $frnd_obj->am_i_the_req_receiver($_SESSION['user_id'], $user_data->id);
// TOTAL REQUESTS
$get_req_num = $frnd_obj->request_notification($_SESSION['user_id'], false);
// TOTAL FRIENDS
$get_frnd_num = $frnd_obj->get_all_friends($_SESSION['user_id'], false);
?>
    <div class="profile_container" style = "display: flex;
                        flex-wrap: wrap;
                        align-items: center;
                        border: 1px solid rgba(23,23,23, .2);
                        margin: 5px;
                        padding: 5px;
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
                        background-image: url(https://i.pinimg.com/736x/c1/7f/31/c17f318095085ff32bb7fadbb1f9a89a.jpg);color:white;">
        
        <div class="inner_profile">
            <div class="img">
                <img src="profile_images/<?php echo $user_data->user_image; ?>" alt="Profile image">
            </div>
            <h1>ign:<?php echo  $user_data->username;?></h1>
            <h1>info:<?php echo  $user_data->bio;?></h1>
            <h1>role:<?php echo  $user_data->role;?></h1>
            <div class="actions">
                <?php
                if($is_already_friends){
                    echo '<a style="color:white;" href="functions.php?action=unfriend_req&id='.$user_data->id.'" class="req_actionBtn unfriend">kick player</a>';
                }
                elseif($check_req_sender){
                    echo '<a style="color:white;" href="functions.php?action=cancel_req&id='.$user_data->id.'" class="req_actionBtn cancleRequest">Cancel invite</a>';
                }
                elseif($check_req_receiver){
                    echo '<a style="color:white;" href="functions.php?action=ignore_req&id='.$user_data->id.'" class="req_actionBtn ignoreRequest">Ignore</a>&nbsp;
                    <a style="color:white;" href="functions.php?action=accept_req&id='.$user_data->id.'" class="req_actionBtn acceptRequest">Accept</a>';
                }
                else{
                    echo '<a style="color:white;" href="functions.php?action=send_req&id='.$user_data->id.'" class="req_actionBtn sendRequest">Send invite</a>';
                }
                echo '<br>';
                echo '<a style="color:white;" href="profile_team.php">Go back to Profile</a>';
                echo '<br>';
                echo '<a style="color:white;" href="recruit.php">Go back to Recruit</a>';
                ?>  
            </div>
        </div>
    </div>
<?php include_once "footer.php" ?>
</body>
</html>