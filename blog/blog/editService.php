<?php
session_start();
require_once('db.php');

$name = $_POST['name'];
$content = $_POST['content'];


$update = "UPDATE services SET name = '{$name}', description = '{$content}' WHERE id=".$_GET['id'];

$result = mysqli_query($con, $update);
               
echo "Category Edited";

?> <br> <a href="dashboard.php">Home</a>