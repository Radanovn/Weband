<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
</head>

<body>
    <?php

    require('connection.php');

    if (isset($_POST['username'])) {
        $username = mysqli_real_escape_string($con, $_POST['username']);
        $password = mysqli_real_escape_string($con, $_POST['password']);

        $sql = "SELECT * FROM users WHERE username = '$username'";
        $query = mysqli_query($con, $sql);
        $rows = mysqli_num_rows($query);

        if ($rows > 0) {
            echo '<div>
            <h3>Username already taken</h3>
            <br>Click here to <a href="register.php">Register</a>
                </div>';
        } else {
            $sqlInsert = "INSERT INTO `users` (username, password) VALUES
            ('{$username}', '".md5($password)."')";

            $queryInsert = mysqli_query($con, $sqlInsert);
            if ($queryInsert) {
                echo '<div>
                        <h3>You are rigistered successfully.</h3>
                        <br>Click here to <a href="login.php">Login</a>
                    </div>';
            }
        }
    } else {
    ?>

        <div>
            <h1>Registration</h1>
            <form action="index.php" method='POST'>
                <input type="text" name='username' placeholder="Your Username" required />
                <input type="password" name='password' placeholder="Your Passowrd" required />
                <button type='submit' name='submit'>Sign Up</button>

            </form>
        </div>

    <?php } ?>


</body>

</html>