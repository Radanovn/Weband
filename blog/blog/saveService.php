<?php 
session_start();

$user = $_SESSION['user']['id'];
$name = $_POST['content'];
$content = $_POST['name'];
$category = $_POST['category'];

require_once('db.php');


$saveServices = "INSERT INTO services (user_id, name, description, c_id) 
                VALUES('{$user}' ,'{$name}' , '{$content}', '{$category}')";


if (mysqli_query($con, $saveServices)) {
    header("Location: dashboard.php");

}

?>