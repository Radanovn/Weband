<?php
require('connection.php');
include('auth.php');

$sql = "SELECT * FROM messages";
$query = mysqli_query($con, $sql);
$messages = mysqli_fetch_all($query, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Messages</title>
</head>

<body>
    <form action="saveMessage.php?id=<?= $_GET['msg_id'] ?>" method='POST'>
        <?php 

        ?>
        <input type="text" name="title" placeholder="Your title"><br>
        <br><textarea name="content" placeholder="Your text here..."></textarea>
        <button type='submit' name='submit'>POST</button>



    </form>
</body>

</html>