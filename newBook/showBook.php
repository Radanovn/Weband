<?php
include('connection.php');
$title = 'Show book';
include('./inc/header.php');

require("auth.php")
?>

<?php

$sql = "SELECT * FROM books WHERE book_id = " . $_GET['book_id'];

$q = mysqli_query($db, $sql);
$book = mysqli_fetch_assoc($q);

$authorsSql = "SELECT * FROM books_authors INNER JOIN authors ON books_authors.author_id = authors.author_id WHERE books_authors.book_id = " . $_GET['book_id'];

$authorsQ = mysqli_query($db, $authorsSql);
$authors = mysqli_fetch_all($authorsQ, MYSQLI_ASSOC);

?>

<h1>Book name:</h1>
<h2><?= $book['book_title'] ?></h2><br>

<strong>Authors:</strong>
<ul>
    <?php
    foreach ($authors as $author) { ?>
        <li><?= $author['author_name'] ?></li>
    <?php
    }
    ?>
</ul>
<div>
    <p><strong>Comment book</strong></p>
    <form method='POST' action="saveComment.php?book_id=<?= $_GET['book_id'] ?>">
        <textarea type="text" name='content' placeholder="Your comment..."></textarea><br>
        <button type='submit' name='submit'>comment</button>
    </form>
</div>



<p><strong>Comments:</strong></p>


<?php
$sqlComment = "SELECT * FROM comments WHERE book_id = " . $_GET['book_id'];

$qComment = mysqli_query($db, $sqlComment);
$comments = mysqli_fetch_all($qComment, MYSQLI_ASSOC);

foreach ($comments as $comment) {
    $sql = "SELECT * FROM comments";
    $q = mysqli_query($db, $sql);
    $username = mysqli_fetch_assoc($q);
?>


    <div>
        <p><strong>Date: </strong><?= $comment['date'] ?></p>
        <p><strong>Author:</strong><a href="userComments.php"><?= $_SESSION['user']['username'] ?></p></a>
        <p><strong>Comment: </strong><?= $comment['content'] ?></p>
        <br>
    </div>
<?php
}
?>


<?php
include('./inc/footer.php')
?>