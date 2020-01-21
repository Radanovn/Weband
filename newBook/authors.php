<?php
include('connection.php');
$title = 'Authors';
include('./inc/header.php');
?>
<a href="index.php">Home</a>
<form action="authors.php" method='POST'>
    Name: <input type="text" name='author_name' />
    <button type='submit' value='submit'>Submit</button>

</form>

<?php
if ($_POST) {
    $author_name = trim($_POST['author_name']);
    if (mb_strlen($author_name) < 2) {
        echo '<p>Invalid name!</p>';
    } else {

        $author_name = mysqli_real_escape_string($db, $author_name);

        $sql = "SELECT * FROM authors WHERE author_name='{$author_name}'";
        $q = mysqli_query($db, $sql);

        if (mysqli_error($db)) {
            echo 'Error!';
        }

        if (mysqli_num_rows($q) > 0) {
            echo 'Author already exists!';
        } else {
            $sqlInsert = "INSERT INTO authors (author_name) 
    VALUES('{$author_name}')";

            mysqli_query($db, $sqlInsert);

            if (mysqli_error($db)) {
                echo 'Error!';
            } else {
                echo 'Successfully';
            }
        }
    }
}
$authors = getAuthors($db);

if(!$authors) {
    echo 'Error';
}

?>

<table>
    <tr>
        <th>Author</th>
    </tr>
    <?php
   foreach ($authors as $row ) {
        echo '<tr><td>' . $row['author_name'] . '</td></tr>';
    }

    ?>



    <?php
    include('./inc/footer.php');
    ?>