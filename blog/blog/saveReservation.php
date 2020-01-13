<?php 

require_once('db.php');

$name = $_POST['name'];
$email = $_POST['email'];
$tel = $_POST['tel'];



$saveServices = "INSERT INTO reservation (name, email, tel, service_id )
                VALUES('{$name}' , '{$email}', '{$tel}', '{$_GET['service_id']}')";


if (mysqli_query($con, $saveServices)) {
    header("Location: showService.php?cid={$_GET['service_id']}");


}
