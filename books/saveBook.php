<?php
require('connection.php');

$bookName = $_POST['bookName'];
$lastValue = mysqli_insert_id($con);


$books = "INSERT INTO books (book_title) VALUES ('{$bookName}')";
$booksAndAuthors = "INSERT INTO books_authors (book_id, author_id) VALUES ('{$lastValue}')";



if(mysqli_query($con, $books)) {
    header("Location: index.php");
 
 } else {
     echo "Error: ". $books . "<br>" . mysqli_error($con);
 }
 