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
<?php include_once "header.php"?>
    <table class="table table-striped">
    <thead>
        <tr>
            <th>Team name</th>
            <th>wins</th>
            <th>loss</th>
        </tr>
    </thead>
    <?php
include_once './etc/dbh.inc.php';
$records = mysqli_query($conn,"select teamname,win,loss from users where team_or_player = 'team' order by win  DESC"); // fetch data from database

while($data = mysqli_fetch_assoc($records))
{
?>
  <tr>
    <td><?php echo $data['teamname']; ?></td>
    <td><?php echo $data['win']; ?></td>
    <td><?php echo $data['loss']; ?></td>
  </tr>	
<?php
}
?>
</table>
    </tbody>
</table>
<?php include_once "footer.php" ?>
</body>
</html>
