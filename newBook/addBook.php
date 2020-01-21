<?php
include('connection.php');
$title = 'Ad Book';
include('./inc/header.php');
?>
<a href="index.php">Home</a>
<form action="addBook.php" method='POST'>
    Name: <input type="text" name='book_name' />

    <?php
    $authors = getAuthors($db);
    if ($authors === false) {
        header('Location: 500.php');
        exit;
    }


    ?>
    <div>Authors:
        <select name="authors[]" multiple>
            <?php

            foreach ($authors as $row) {
                echo '<option value="' . $row['author_id'] . '">' . $row['author_name'] . '</option>';
            }
            ?>
        </select>
    </div>
    <button type='submit' value='submit'>Submit</button>
</form>
<?php
if ($_POST) {
    $book_name = trim($_POST['book_name']);
    if (!isset($_POST['authors'])) {
        $_POST['authors'] = '';
    }
    $authors = $_POST['authors'];
    $errors = [];
    if (mb_strlen($book_name) < 2) {
        $errors[] = '<p>Invalid name!</p>';
    }

    if (!is_array($authors) || count($authors) == 0) {
        $errors[] = '<p>Invalid authors!</p>';
    }

    if (!isAuthorIdExists($db, $authors)) {
        $errors[] = '<p>Invalid author!</p>';
    }


    if (count($errors) > 0) {
        foreach ($errors as $er) {
            echo '<p>' . $er . '</p>';
        }
    } else {
        $sql = 'INSERT INTO books (book_title) VALUES ("' .
            mysqli_real_escape_string($db, $book_name) . '")';
        mysqli_query($db, $sql);
        if (mysqli_error($db)) {
            echo 'Error';
            exit;
        }
        $id = mysqli_insert_id($db);

        foreach ($authors as $authorId) {
            $sql = 'INSERT INTO books_authors (book_id, author_id)
            VALUES (' . $id . ', ' . $authorId . ')';
            mysqli_query($db, $sql);

            if (mysqli_error($db)) {
                echo 'Error';
                exit;
            }
        }
        echo 'Book added!';
    }
}

?>

<?php
include('./inc/footer.php');
?>