<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Author's books</title>
</head>

<body>
    <?php

    require('connection.php');
    $sql = "SELECT * FROM books INNER JOIN books_authors ON books.book_id=books_authors.book_id 
    WHERE books_authors.author_id = '" . $_GET['author_id'] . "'";
    $query = mysqli_query($con, $sql);
    $rows = mysqli_fetch_assoc($query);

    while ($row = mysqli_fetch_assoc($query)) {
       
        print_r($row['book_title']);
    }
    

    ?>

</body>

</html>