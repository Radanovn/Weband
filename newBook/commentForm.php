<?php
include_once('connection.php');
include('auth.php');

$sql = "SELECT * FROM messages";
$q = mysqli_query($db, $sql);
$comments = mysqli_fetch_all($q, MYSQLI_ASSOC);


include('./inc/header.php');
$title = 'comments';
include('auth.php');
?>


<div>
<form action="saveComment.php?>">
    <textarea type="text" name='content' placeholder="Your comment..."></textarea><br>
    <button type='submit' name='submit'>comment</button>
</form>
</div>


<?php
include('./inc/footer.php');
?>