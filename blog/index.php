<?php
include("auth.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome Home</title>
</head>

<body>
    <div>
        <p>Welcome <? $_SESSION['username']; ?>!</p>
        <p><a href="dashboard.php">Dashboard</a></p>
        <a href="logout.php">Logout</a>
    </div>
</body>

</html>