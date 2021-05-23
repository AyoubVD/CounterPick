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
    <div class="profile_container">

        <div class="inner_profile">
            <div class="img">
                <img src="profile_images/<?php echo $user_data->user_image; ?>" alt="Profile image">
            </div>
            <h1>team:<?php echo  $user_data->teamname;?></h1>
            <h1>info:<?php echo  $user_data->bio;?></h1>
            <h1>looking:<?php echo  $user_data->looking;?></h1>
            <h1>win:<?php echo  $user_data->win;?></h1>
            <h1>loss:<?php echo  $user_data->loss;?></h1>
        </div>
        <nav>
            <ul>
                <li><a href="notifications_team.php" rel="noopener noreferrer">Requests<span class="badge <?php
                if($get_req_num > 0){
                    echo 'redBadge';
                }
                ?>"><?php echo $get_req_num;?></span></a></li>
                <li><a href="friends_team.php" rel="noopener noreferrer">Players<span class="badge"><?php echo $get_frnd_num;?></span></a></li>
            </ul>
        </nav>   
    </div>      
<?php include_once "footer.php" ?>
</body>
</html>