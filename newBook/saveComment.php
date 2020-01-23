<?php

include('connection.php');
session_start();
include('./inc/header.php')

?>

<?php
$author = $_SESSION['user'];
$book_id = $_GET['book_id'];
$content = $_POST['content'];
$date = date('Y-m-d H:i:s');

$comments = "INSERT INTO comments (author_id, content, date, book_id) 
VALUES ('{$author['user_id']}', '{$content}', '{$date}', '{$book_id}')";

mysqli_query($db, $sql);

if(mysqli_query($db, $comments)) {
    header("Location: showBook.php?book_id=$book_id");
} else {
    echo "ERROR: " . $comments . "<br> . mysqli_error($db)";
}




?>
<?php

include('./inc/footer.php');

?>