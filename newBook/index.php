<?php
$title = 'Home';
include_once('./inc/header.php');
include_once('connection.php');
include('auth.php');

?>

<div>
    <p>Welcome <?= $_SESSION['user']['username']; ?> </p>
</div>

<a href="authors.php">Authors</a>
<a href="addBook.php">Add book</a>

<?php
if (isset($_GET['author_id'])) {
    $author_id = $_GET['author_id'];
     
     $sql = 'SELECT * FROM authors as a LEFT JOIN
   books_authors as ba ON a.author_id=ba.author_id LEFT JOIN
    books as b ON b.book_id=ba.book_id WHERE a.author_id=' . $author_id;
    $q = mysqli_query($db, $sql);
} else {
    $sql = 'SELECT * FROM books as b INNER JOIN
    books_authors as ba ON b.book_id=ba.book_id INNER JOIN
     authors as a ON a.author_id=ba.author_id';
    $q = mysqli_query($db, $sql);
}

$result = [];
while ($row = mysqli_fetch_assoc($q)) {
    $result[$row['book_id']]['book_title'] = $row['book_title'];
    $result[$row['book_id']]['authors'][$row['author_id']] = $row['author_name'];
}

echo '<table border="1"><tr><td>Book</td><td>Authors</td></tr>';
foreach ($result as $book_id => $row) {
    echo '<tr><td><a href="showBook.php?book_id=' . $book_id . '">' .  $row['book_title'] . '</a></td>
    <td>';

    $ar = [];

    foreach ($row['authors'] as $k => $va) {
        $ar[] = '<a href="index.php?author_id=' . $k . '"> ' . $va . '</a>';
    }

    echo implode(',', $ar) . '</td></tr>';
}
echo '</table>';


?>
<br><a href="logout.php">Logout</a>

<?php
include('./inc/footer.php');
?>