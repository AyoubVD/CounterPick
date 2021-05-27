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
 <?php
        if(isset($result['errorMessage'])){
          echo '<p style="color:red; class="errorMsg">'.$result['errorMessage'].'</p>';
        }
        if(isset($result['successMessage'])){
          echo '<p  style="color:green;" class="successMsg">'.$result['successMessage'].'</p>';
        }       
      ?> 
<?php include_once "header.php" ?>
    <div class="profile_container">

        <div class="inner_profile" style = "display: flex;
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
                        background-image: url(https://i.pinimg.com/736x/c1/7f/31/c17f318095085ff32bb7fadbb1f9a89a.jpg);color:white;">
            <div class="img">
                <img width="48" height="48" src="profile_images/<?php echo $user_data->user_image; ?>" alt="Profile image">
                <h1>team:<?php echo  $user_data->teamname;?></h1>
            </div>
            </div>
            <h1>team:<?php echo  $user_data->teamname;?></h1>
            <h1>info:<?php echo  $user_data->bio;?></h1>
            <h1>looking for:<?php echo  $user_data->looking;?></h1>
            <h1>win:<?php echo  $user_data->win;?></h1>
            <h1>loss:<?php echo  $user_data->loss;?></h1>
        <br>
        <nav>
            <ul>
                <li><a href="notifications_team.php" rel="noopener noreferrer">Requests<span class="badge <?php
                if($get_req_num > 0){
                    echo 'redBadge';
                }
                ?>"><?php echo $get_req_num;?></span></a></li>
                <li><a href="friends_team.php" rel="noopener noreferrer">Players<span class="badge"><?php echo $get_frnd_num;?></span></a></li>
                <li><a href='settings.php'>Settings</a></li>
            </ul>
        </nav>   
    </div>
         
<?php include_once "footer.php" ?>
</body>
</html>