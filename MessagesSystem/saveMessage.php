<?php
require('connection.php');
session_start();

$author = $_SESSION['user'];

$title = $_POST['title'];
$content = $_POST['content'];
$date = date('Y-m-d H:i:s');

$messages = "INSERT INTO messages (author_id, title, content, date) 
VALUES ( '{$author['user_id']}',  '{$title}', '{$content}' , '{$date}')";

if(mysqli_query($con, $messages)) {
   header("Location: showMessages.php");

} else {
    echo "Error: ". $messages . "<br>" . mysqli_error($con);
}

?>
