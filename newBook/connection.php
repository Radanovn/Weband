<?php
mb_internal_encoding('UTF-8');

$db = mysqli_connect('localhost', 'root', '', 'books');

if (!$db) {
    echo 'No database';
}

mysqli_set_charset($db, 'utf8');

function getAuthors($db) {
    $sql = "SELECT * FROM authors ";
    $q = mysqli_query($db, $sql);

    if (mysqli_error($db)) {
        return false;
    }

    $ret = [];

    while ($row = mysqli_fetch_assoc($q)) {
        $ret[]=$row;
    }
    return $ret;
}

function isAuthorIdExists($db, $ids) {
   if (!is_array($ids)) {
       return false;
   }
    $sql = 'SELECT * FROM authors WHERE author_id IN(' . implode(',', $ids) . ')';
    $q = mysqli_query($db, $sql);
    if(mysqli_error($db)) {
        return false;
    }
    if(mysqli_num_rows($q) == count($ids)) {
        return true;
    }
    return false;
}