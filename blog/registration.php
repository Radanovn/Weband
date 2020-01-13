<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Registration</title>
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>
    <?php
    require('db.php');
    // If form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);
        $email = mysqli_real_escape_string($con, $_REQUEST['email']);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);

        $query = "SELECT * FROM `users` WHERE username='$username'";

        $result = mysqli_query($con, $query);

        $rows = mysqli_num_rows($result);
        if ($rows > 0) {
            echo "<h3>Username already taken</h3>
            <br/>Click here to <a href='registration.php'>Retake</a></div>";
        } else {

            $queryInsert = "INSERT into `users` (username, password, email)
     VALUES ('$username', '" . md5($password) . "', '$email')";
            $result = mysqli_query($con, $queryInsert);
            if ($result) {
                echo "<div class='form'>
     <h3>You are registered successfully.</h3>
     <br/>Click here to <a href='login.php'>Login</a></div>";
            }
        }
    } else {
    ?>
        <div class="form">
            <h1>Registration</h1>
            <form name="registration" action="" method="post">
                <input type="text" name="username" placeholder="Username" required />
                <input type="email" name="email" placeholder="Email" required />
                <input type="password" name="password" placeholder="Password" required />
                <input type="submit" name="submit" value="Register" />
            </form>
        </div>
    <?php } ?>
</body>

</html>