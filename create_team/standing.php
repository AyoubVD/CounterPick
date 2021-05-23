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
