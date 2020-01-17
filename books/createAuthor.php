<?php
require('connection.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Book</title>
</head>

<body>
    <form action="saveAuthor.php" method="POST">
        <h3>Name of author:</h3><input type="text" name='authorName'>
        <button type='submit' name='submit'>Add Author</button>
    </form>
    <?php
    $sql = "SELECT * FROM authors";
    $query = mysqli_query($con, $sql);
    $authors = mysqli_fetch_all($query, MYSQLI_ASSOC);

    echo '<h4>Authors:</h4>';
    foreach ($authors as $author) {
        print_r(
            '<table>
                    <tr>
                        <td> ' . $author['author_name'] . '</td>
                    </tr>
            </table>'
        );
    }
    ?>
</body>

</html>