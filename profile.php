<?php
        include_once './includes/init.php';
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
    <div class="profile_container ">
        <div class="inner_profile">
            <div class="img">
                <img src="profile_images/<?php echo $user_data->user_image; ?>" alt="Profile image">
            </div>
            <h1>ign:<?php echo  $user_data->username;?></h1>
            <h1>info:<?php echo  $user_data->bio;?></h1>
            <h1>looking for:<?php echo  $user_data->looking;?></h1>
            <h1>role:<?php echo  $user_data->role;?></h1>
        </div>
        <br>
        <nav   style="text-align: center;
                        margin-left: auto;
                        margin-right: auto;">
            <ul>
                <li><a href="notifications.php" rel="noopener noreferrer">Requests<span class="badge <?php
                if($get_req_num > 0){
                    echo 'redBadge';
                }
                ?>"><?php echo $get_req_num;?></span></a></li>
                <li><a href="friends.php" rel="noopener noreferrer">Team<span class="badge"><?php echo $get_frnd_num;?></span></a></li>
            </ul>
        </nav>   
    </div>      
<?php include_once "./components/footer.php" ?>
</body>
</html>