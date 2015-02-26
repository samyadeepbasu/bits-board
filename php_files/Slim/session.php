<?php

// session_start();

$connection = mysqli_connect("localhost", "root", "", "instaconsult");

$login_client = $_SESSION['login_client'];

$result=mysqli_query($connection, "select username from login_client where username= '$login_client'");

$row = mysqli_fetch_assoc($result);

$login_session_user  = $row['username']; // this extra time reassigning and search happens for safety

$data=mysqli_query($connection, "select * from client_data where username= '$login_client'");



if(!isset($login_session_user))
{
mysqli_close($connection); // Closing Connection
header('Location: index.php'); // Redirecting To Home Page
}

?>
