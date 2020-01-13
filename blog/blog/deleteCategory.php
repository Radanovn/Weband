<?php
session_start();

require_once('db.php');



$sql = "DELETE FROM category WHERE cid= '{$_GET['id']}'";
    
    $result = mysqli_query($con, $sql);
    
    echo "Category Deleted";

    ?> <br> <a href="dashboard.php">Home</a>

               