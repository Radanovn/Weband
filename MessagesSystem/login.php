
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <?php
    require('connection.php');
    session_start();
    
    if(isset($_POST['username'])) {
        $username = mysqli_real_escape_string($con, $_POST['username']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
    
        $sql = "SELECT * FROM users WHERE username = '$username' and password = '". md5($password) ."'";
        $query = mysqli_query($con, $sql);
        $rows = mysqli_num_rows($query);
    
        if($rows==1) {
            $_SESSION['user'] = mysqli_fetch_assoc($query);
    
            header("Location: index.php");
    
        } else {
            echo ' <div>
           <h3>Username/password is incorrect.</h3>
           <br>Click here to <a href="login.php">Try again</a>
            </div>';
        }
    } else {
        ?>
    
        <div>
            <h1>Log In</h1>
            <form method='POST' name='login'>
                <input type="text" name='username' placeholder="username" required />
                <input type="password" name='password' placeholder="passoword" required />
                <button type='submit' name='submit'>Log in</button>
    
            </form>
            <p>Not registered yet? <a href="register.php">Register here</a></p>
        </div>
        <?php } ?>
    
    
</body>
</html>

