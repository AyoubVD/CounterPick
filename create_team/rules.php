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
<div class="contain" style = "display: flex;
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
                        background-image: url(https://lolstatic-a.akamaihd.net/frontpage/apps/prod/clash-2018/en_GB/a46e742ae82f9d4f9db8e34ba57873e513e727b7/assets/static/img/backgrounds/brackets-bg.jpg);color:white;">
        <h1>Tournement rules</h1>
        <br>
        <h1>How to play?</h1>
        <h6> play all teams in  every round and every round you win against a team you get 1 point and you can only play the same team once every round and the Winner of the tournement can choose an icon and a team background.</h6>
        <h1>How to find a team to play against?</h1>
        <h6>There is a chat room where you can find a team to play against.</h6>
        <h1>How to submit win?</h1>
        <h6>Go to contact page and send link to vod or give us a link to the vod also very important send which round you played the team example: round 1: your team vs your opponent team</h6>
        <h1>How to report?</h1>
        <h6>Go to contact page and give us the reason exampl:toxic player, cheating team, smurfing team/player etc. </h6>
        </div>
        <footer style="color:white;">
    <a style="color:white;" href="https://counterpick123.wordpress.com/">About us</a>
    <a style="color:white;" href="#">Teaser</a>
    <br>
    © 2021 - Counterpick - Thomas More
</footer>
</body>
</html>
