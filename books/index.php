<?php
require('connection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>

<body>
    <div>
        <p>
            <a href="createBook.php">Add book</a>
            <a href="createAuthor.php">Add author</a>
        </p>
    </div>

    <?php
    
    $sql = "SELECT * FROM books LEFT JOIN books_authors ON books.book_id = books_authors.book_id LEFT JOIN authors ON books_authors.author_id = authors.author_id";
    $query = mysqli_query($con, $sql);

    $books = [];

    while ($row = mysqli_fetch_assoc($query)) {
        $books[$row['book_id']]['book_title'] = $row['book_title'];
        $books[$row['book_id']]['authors'][$row['author_id']]['author_name'] = $row['author_name'];
        $books[$row['book_id']]['authors'][$row['author_id']]['author_id'] = $row['author_id'];
    }
    // $books = mysqli_fetch_all($query);

    echo '<table border="1">
    <tr>
        <td>Books</td>
        <td>Authors</td>
    </tr>';
    foreach ($books as $book) { ?>
    <tr>
        <td><?= $book['book_title'] ?></td>
        <td>
            <?php foreach ($book['authors'] as $author) { ?>
                <a href="authorsBooks.php?author_id=<?= $author['author_id'] ?>"><?= $author['author_name'] ?></a>
    <?php    } ?>
        </td>
    </tr>
  <?php  }
    echo '</table>';
    ?>
</body>

</html>