<?php
require('connection.php');

$authorName = $_POST['authorName'];

$authors = "INSERT INTO authors (author_name) VALUES ('{$authorName}')";

if(mysqli_query($con, $authors)) {
    header("Location: index.php");
 
 } else {
     echo "Error: ". $authors . "<br>" . mysqli_error($con);
 }
 