<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Categories</title>
</head>

<body>

    <?php

    require_once('db.php');

    $sql = "SELECT * FROM category WHERE cid = " . $_GET['cid'];

    $result = mysqli_query($con, $sql);

    $category = mysqli_fetch_assoc($result);
    ?>
     <div>
       <h2><?= $category['name']?></h2>

<?php 

       $sql = "SELECT * FROM services WHERE c_id='" . $_GET['cid'] . "'";
    
            $result = mysqli_query($con, $sql);
            $services = mysqli_fetch_all($result, MYSQLI_ASSOC);
            
            ?>
    </div>

    <ul>
        <?php 
        foreach ($services as $service) {
            ?>
            <li><a href="showService.php?cid=<?=$service['id']?>"><?=$service['name']?></a></li>
            <a href="deleteServices.php?id=<?=$service['id'] ?>">Delete Service</a>
            <a href="editForm.php?cid=<?= $service['id'] ?>">Edit Service</a>
            

           
       <?php } ?>
    </ul>

</body>

</html>