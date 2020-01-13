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

    include("auth.php");



    function fetchCategoryTree($parent = 0, $spacing = '', $user_tree_array = '')
    {
        require("db.php");
        if (!is_array($user_tree_array))
            $user_tree_array = array();

        $sql = "SELECT `cid`, `name`, `parent` FROM `category` WHERE 1 AND `parent` = $parent ORDER BY cid ASC";
        $query = mysqli_query($con, $sql);
        if (mysqli_num_rows($query) > 0) {
            while ($row = mysqli_fetch_object($query)) {
                $user_tree_array[] = array("id" => $row->cid, "name" => $spacing . $row->name);
                $user_tree_array = fetchCategoryTree($row->cid, $spacing . '&nbsp;&nbsp;', $user_tree_array);
            }
        }
        return $user_tree_array;
    }

    $categoryList = fetchCategoryTree();

    ?>

    <?php
    $categoryList = fetchCategoryTree();
    ?>
    <select>
        <?php foreach ($categoryList as $cl) { ?>
            <option value="<?php echo $cl["id"] ?>"><?php echo $cl["name"]; ?></option>
        <?php } ?>
    </select>

    <?php

    function fetchCategoryTreeList($parent = 0, $user_tree_array = '')
    {

        require("db.php");
        if (!is_array($user_tree_array))
            $user_tree_array = array();

        $sql = "SELECT `cid`, `name`, `parent` FROM `category` WHERE 1 AND `parent` = $parent ORDER BY cid ASC";
        $query = mysqli_query($con, $sql);
        if (mysqli_num_rows($query) > 0) {
            $user_tree_array[] = "<ul>";
            while ($row = mysqli_fetch_object($query)) {
                $user_tree_array[] = "<li>" . $row->name . "</li>";
                $user_tree_array = fetchCategoryTreeList($row->cid, $user_tree_array);
            }
            $user_tree_array[] = "</ul>";
        }
        return $user_tree_array;
    }

    ?>

    <ul>
        <?php
        $res = fetchCategoryTreeList();
        foreach ($res as $r) {
            echo $r;
        }
        ?>
    </ul>
</body>

</html>