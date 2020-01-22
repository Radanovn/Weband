<?php
$title = 'Register';
include('./inc/header.php');
include('connection.php');

if (isset($_POST['username'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    mysqli_real_escape_string($db, $username);
    mysqli_real_escape_string($db, $password);

    $sql = "SELECT * FROM users WHERE username = '$username'";
    $query = mysqli_query($db, $sql);
    $rows = mysqli_num_rows($query);

    if ($rows > 0) {
        echo '<div>
            <h3>Username already taken</h3>
            <br>Click here to <a href="register.php">Register</a>
        </div>';
    } else {
        $sqlInsert = "INSERT INTO `users` (username, password) 
    VALUES ('{$username}', '".md5($password)."')";

        $queryInsert = mysqli_query($db, $sqlInsert);
        if ($queryInsert) {
            echo ' <div>
                <h3>You are registered successfully</h3>
                <br>Click here to <a href="login.php">Login</a>
            </div> ';
        }
    }
} else {

?>
    <div>
        <h1>Registration</h1>
        <form action="registration.php" method='POST'>
            <input type="text" name="username" placeholder="Your name" required />
            <input type="password" name="password" placeholder="Your pass" required />
            <button type="submit" name='submit'>Sign Up</button>
        </form>
    </div>
<?php } ?>


<?php
include('./inc/footer.php');

?>