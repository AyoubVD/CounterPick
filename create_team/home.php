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
        <div id="content" style='text-align: center;'>
            <h2>What is CounterPick</h2>
            <br>
            <h3>CounterPick is <u>four</u> points</h3>
            <br>
            <p>To help and guide anyone who wants to play competitively at the amateur level.</p>
            <br>
            <p>For everybody who plays competitively comp LOL and is an amateur.</p>
            <br>
            <p>A web application where you can find data on the current state of the tournament.</p>
            <br>
            <p>We are using an API to get the necessary information on the players and using it to match the players on the same skillset.</p>
            <br>
            <h3>
            So you might ask, isn't this a lot. <br>
            For us it is, but for the players it isn't. <br>
            We will list <b>all</b> the requirements below.
            </h3>
            <br>
            <p>LOL installed, updated web browser and a stable network connection.test</p>      
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <p>As you can see this isn't a lot, so what's holding you back? <br>
            Come and join the community to become a better League player!</p>
<?php include_once "footer.php" ?>
</body>
</html>
