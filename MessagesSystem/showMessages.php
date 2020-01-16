<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Messages</title>
</head>

<body>

    <?php
    require('connection.php');
    ?>
   
   <a href="showMessages.php?sort=date-asc">Sort by date asc</a>
   <a href="showMessages.php?sort=title-asc">Sort by title asc</a>

    <?php
    if (isset($_GET['sort'])) {
        $sort = $_GET['sort'];
        $sort = explode('-', $sort);

        $sql = "SELECT * FROM messages ORDER by {$sort[0]} {$sort[1]}";
    } else {
        $sql = "SELECT * FROM messages ORDER by date DESC";
    }

     
     $query = mysqli_query($con, $sql);
     $messages = mysqli_fetch_all($query, MYSQLI_ASSOC);
    
     foreach ($messages as $message) {
        //  print_r($message);
        //  exit;
         $sql = "SELECT username FROM users WHERE user_id = ".$message['author_id'];
         $query = mysqli_query($con, $sql);
         $username = mysqli_fetch_assoc($query);      
     
    ?>
    <div>
        <p>Date: <?= $message['date'] ?></p>
        <p>Author: <?=$username['username'] ?></p>
        <p>Title: <?=$message['title'] ?></p>
        <p>Message: <?=$message['content'] ?></p>

    </div>

    <?php } ?>
</body>

</html>