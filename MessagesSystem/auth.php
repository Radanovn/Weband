<?php
session_start();

if(!isset($_SESSION['user'])) {
    echo '<p>You are not logged in!</p>
  <a href="login.php">Log In</a> ';
  exit;

}


