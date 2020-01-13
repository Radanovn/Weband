<?php

require_once('db.php');
session_start();


$sql = "SELECT * FROM reservation WHERE service_id = '{$_GET['service_id']}'";

$result = mysqli_query($con, $sql);

$reservations = mysqli_fetch_all($result, MYSQLI_ASSOC);

foreach ($reservations as $reservation) {
    ?>

    <p>Name: <?=$reservation['name']?></p>
    <p>Email: <?=$reservation['email']?></p>
    <p>Telephone: <?=$reservation['tel']?></p>
    <hr>

<?php } ?>



