<?php
include('auth.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>

<body>
    <div>
        <p>Welcome <? $_SESSION['user']; ?></p>

        <form action="saveMessage.php" method='POST'>
            <input type="text" name="title" placeholder="Your title"><br>
            <br><textarea name="content" placeholder="Your text here..."></textarea>
            <button type='submit' name='submit'>POST</button>
        </form>
        <p><a href="showMessages.php">Messages</a></p>
        <a href="logout.php">Logout</a>
    </div>
</body>

</html>