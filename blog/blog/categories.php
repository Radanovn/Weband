<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Category</title>
</head>

<body>

    <?php

    require_once('db.php');

    $sql = "SELECT * FROM category";

    $result = mysqli_query($con, $sql);

    $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);

    ?>

    <ul>
        <?php

        foreach ($categories as $category) { ?>
            <br>
            <li><a href="category.php?cid=<?= $category["cid"] ?>"><?= $category['name'] ?></a></li>
            <a href="deleteCategory.php?id=<?= $category["cid"] ?>">Delete Category</a> <br>


        <?php
        }
        ?>
    </ul>

</body>

</html>