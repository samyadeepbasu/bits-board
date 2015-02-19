<?php

$connection = mysqli_connect("localhost", "root", "", "bits-board");

session_start();

$user_check=$_SESSION['login_user'];

$result=mysqli_query($connection, "select username from login where username='$user_check'");

$row = mysqli_fetch_assoc($result);

$login_session =$row['username'];
if(!isset($login_session))
{
mysqli_close($connection); // Closing Connection
header('Location: index.php'); // Redirecting To Home Page
}
?>