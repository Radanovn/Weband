<?php

require('db.php');
include("auth.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
</head>

<body>

        <div>
        <p>Dashboard</p>
        <p><a href="categories.php">Category</a></p>
        <p><a href="addService.php">Add Service</a></p>
        <p><a href="myServices.php">My Services</a></p>

        <a href="logout.php">Logout</a>
        </div>
</body>

</html>