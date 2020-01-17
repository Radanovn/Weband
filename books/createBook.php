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
    <form action="saveBook.php" method="POST">
        <h3>Name of book:</h3><input type="text" name='bookName'>
        <button type='submit' name='submit'>Add Book</button>
    
    <?php
    $sql = "SELECT * FROM authors";
    $query = mysqli_query($con, $sql);
    $authors = mysqli_fetch_all($query, MYSQLI_ASSOC);

    echo '<h4>Authors:</h4>';
    
    ?>
        <select name="authors[]" multiple>
            <?php foreach ($authors as $author) { ?>
            <option value="<?=$author['author_name']?>"><?=$author['author_name']?></option>
           
            <?php }
        ?>
        </select>
    </form>
</body>

</html>