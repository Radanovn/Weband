<?php 
session_start();


$author = $_SESSION['user'];

$title = $_POST['title'];
$content = $_POST['content'];


require_once('db.php');


$categories = "INSERT INTO category (author_id, title, body) 
  			  VALUES('".$author['cid']."', '".$title."', '".$content."')";

if (mysqli_query($con, $categories)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $categories . "<br>" . mysqli_error($con);
}




?>
