<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    <?php

    require('db.php');

    $sql = "SELECT * FROM services WHERE id='" . $_GET['cid'] . "'";

    $result = mysqli_query($con, $sql);
    $service = mysqli_fetch_assoc($result);

    ?>

    <div>
            <form method='POST' action="editService.php?id=<?= $service['id'] ?>">

                <p>Name:</p>
                <input name="name" type="text">
                <p>Description:</p>
                <textarea name="content" id=""></textarea>


                <button type='submit'>Edit</button>
            </form>
        </div>



</body>

</html>