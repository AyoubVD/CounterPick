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
<div class="all_users">
            <h3>All Teams</h3>
            <div class="usersWrapper">
                <?php
                if($all_users){
                    foreach($all_users as $row){
                        echo '<div class="user_box" 
                        style = "display: flex;
                        flex-wrap: wrap;
                        align-items: center;
                        border: 1px solid rgba(23,23,23, .2);
                        margin: 5px;
                        padding: 5px;
                        width: 50%;
                        background-color: #FFF;
                        align-items: stretch;
                        display: flex;
                        flex-wrap: wrap;
                        justify-content: center;
                        text-align: center;
                        align-content: center;
                        margin-left: auto;
                        margin-right: auto;
                        background-image: url(https://i.pinimg.com/736x/c1/7f/31/c17f318095085ff32bb7fadbb1f9a89a.jpg);color:white;"
                        >
                               <h2><a style="color:black;"href="user_profile.php?id='.$row->id.'" class="see_profileBtn">join team</a></h2>
                                <div class="user_img"><img width="48" height="48" style="border-radius: 50%;" src="profile_images/'.$row->user_image.'" alt="Profile image"></div>
                                <h3>team:<div class="user_info"><span>'.$row->teamname.'</span></h3>
                                <h3 style="width: 40%;" >Join if:<div class="user_info"><span>'.$row->looking.'</span></h3>
                                <h3>win<div class="user_info"><span>'.$row->win.'</span></h3>
                                <h3>/loss:<div class="user_info"><span>'.$row->loss.'</span></h3>
                               
                            </div>';
                            
                    }
                }
                else{
                    echo '<h4>There is no user!</h4>';
                }
                ?>
            </div>
        </div>
<?php include_once "./components/footer.php" ?>
</body>
</html>