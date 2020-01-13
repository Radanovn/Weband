<?php

require_once('db.php');
session_start();


$sql = "SELECT * FROM services WHERE user_id = '{$_SESSION['user']['id']}'";

$result = mysqli_query($con, $sql);

$services = mysqli_fetch_all($result, MYSQLI_ASSOC);



?>
<?php
foreach ($services as $service) {
   
  ?>  <p>
      <a href="oneService.php?service_id=<?=$service['id']?>"><?=$service["name"]?></a>
    </p> 
  <p><?= $service['description']?></p>
  <hr>

<?php }
 ?>
        

