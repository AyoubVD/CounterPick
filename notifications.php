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
<?php
include_once 'includes/init.php';

if(isset($_SESSION['user_id']) && isset($_SESSION['email'])){
    $user_data = $user_obj->find_user_by_id($_SESSION['user_id']);
    if($user_data ===  false){
        header('Location: logout.php');
        exit;
    }
}
else{
    header('Location: logout.php');
    exit;
}
// TOTAL REQUESTS
$get_req_num = $frnd_obj->request_notification($_SESSION['user_id'], false);
// TOTAL FRIENDS
$get_frnd_num = $frnd_obj->get_all_friends($_SESSION['user_id'], false);
$get_all_req_sender = $frnd_obj->request_notification($_SESSION['user_id'], true);
?>

    <div class="profile_container">
        
        <div class="inner_profile">
            <div class="img">
                <img src="profile_images/<?php echo $user_data->user_image; ?>" alt="Profile image">
            </div>
            <h1>ign:<?php echo  $user_data->username;?></h1>
            <h1>info:<?php echo  $user_data->bio;?></h1>
            <h1>looking for:<?php echo  $user_data->looking;?></h1>
            <h1>role:<?php echo  $user_data->role;?></h1>
        </div>
        <nav>
            <ul>
                <li><a href="notifications.php" rel="noopener noreferrer" class="active">Requests<span class="badge <?php
                if($get_req_num > 0){
                    echo 'redBadge';
                }
                ?>"><?php echo $get_req_num;?></span></a></li>
                <li><a href="friends.php" rel="noopener noreferrer">Team<span class="badge"><?php echo $get_frnd_num;?></span></a></li>
            </ul>
        </nav>
        <div class="all_users">
            <div class="usersWrapper">
                <?php
                if($get_req_num > 0){
                    foreach($get_all_req_sender as $row){
                        echo '<div class="user_box" style = "display: flex;
                        flex-wrap: wrap;
                        align-items: center;
                        border: 1px solid rgba(23,23,23, .2);
                        margin: 5px;
                        padding: 5px;
                        width: 5%;
                        background-color: #FFF;
                        align-items: stretch;
                        display: flex;
                        flex-wrap: wrap;
                        justify-content: center;
                        text-align: center;
                        align-content: center;
                        margin-left: auto;
                        margin-right: auto;
                        ">
                                <div class="user_img"><img width="30" height="30"  src="profile_images/'.$row->user_image.'" alt="Profile image"></div>
                                <h6>team:<div class="user_info"><span>'.$row->teamname.'</span></h6>
                                <span><a style ="text-align: center;" href="user_profile.php?id='.$row->sender.'" class="see_profileBtn">See profile</a></div>
                            </div>';
                    }
                }
                else{
                    echo '<h4>You have no team requests!</h4>';
                }
                ?>
            </div>
        </div>
       
    </div>
 
<?php include_once "./components/footer.php" ?>
</body>
</html>