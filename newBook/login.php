<?php
$title = 'Login';
include('connection.php');
include('./inc/header.php');
session_start();

if (isset($_POST['username'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    $sql = "SELECT * FROM users WHERE username = '$username' and
    '" . md5($password) . "'";
    $query = mysqli_query($db, $sql);

    if (mysqli_num_rows($query) == 1) {
        $_SESSION['user'] = mysqli_fetch_assoc($query);

        header("Location: index.php");
    } else {
       echo ' <div> 
        <h3>Username/password is incorrect.</h3>
        <br>Click here to <a href="login.php">try again</a>
        </div> ';
    }

} else {
?>

    <div>
        <h1>Log In</h1>
        <form method='POST' name='login'>
            <input type="text" name='username' placeholder="Username" required />
            <input type="password" name='password' placeholder="Password" required />
            <button type='submit' name='submit'>Log In</button>
        </form>
        <p>Not registered yet? <a href="registration.php">Register</a></p>
    </div>

<?php } ?>


<?php
include_once('./inc/footer.php')
?>