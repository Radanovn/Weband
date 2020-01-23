<?php
include('connection.php');
$title = "personal comments";
include('./inc/header.php');
include('auth.php');
?>
<div>
    <p>User "<?= $_SESSION['user']['username'] ?>" comments:</p>
</div>

<?php
$sql = "SELECT * FROM comments WHERE author_id = '{$_SESSION['user']['user_id']}'";
$q = mysqli_query($db, $sql);
$comments = mysqli_fetch_all($q, MYSQLI_ASSOC);

foreach ($comments as $comment) {
   ?>
   <div>
       <ul><?=$comment['content']?></ul>
   </div>



<?php } ?>

<?php
include('./inc/footer.php');
?>