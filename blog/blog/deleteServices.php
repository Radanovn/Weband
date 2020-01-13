<?php
session_start();

require_once('db.php');



    $sql = "DELETE FROM services WHERE id=".$_GET['id'];
    
    $result = mysqli_query($con, $sql);
    
    echo "Service deleted!";

    ?> <br> <a href="dashboard.php">Home</a>
