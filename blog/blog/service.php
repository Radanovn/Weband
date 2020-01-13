<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Service</title>
</head>

<body>

    <?php

    require_once('db.php');

    $sql = "SELECT * FROM services";

    $result = mysqli_query($con, $sql);

    $services = mysqli_fetch_all($result, MYSQLI_ASSOC);


    foreach ($services as $service) {
        $sql = "SELECT username FROM users WHERE id = " . $_GET['id'];

        $result = mysqli_query($con, $sql);

        $username = mysqli_fetch_assoc($result);
    ?>
        <div>
            <p>User: <?= $username['username'] ?></p>
            
        

        </div>
    <?php
    }
    ?>



</body>

</html>