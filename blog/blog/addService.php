<?php

require_once("db.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div>
        <form method="POST" action="saveService.php">
            <select name="category">
                <?php

                $sql = "SELECT * FROM category";
                $result = mysqli_query($con, $sql);
                $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);

                foreach ($categories as $category) { 
                   
                    ?>
                   
                   <option value="<?=$category['cid']?>"><?=$category['name']?></option>
                <?php } ?>
            
            </select>
            <p>Name:</p>
            <input name="name" type="text">
            <p>Description:</p>
            <textarea name="content" id=""></textarea>
            <button>Submit</button>
        </form>
    </div>
</body>

</html>