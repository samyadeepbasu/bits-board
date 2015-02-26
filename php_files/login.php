<?php
session_start(); 
$error=''; // error variable
	if (isset($_POST['submit'])) {

		if (empty($_POST['username']) || empty($_POST['password'])) {  //checking whether its an empty request.
		$error = "Username or Password is invalid or empty";
		}

	else
	{
	$username=$_POST['username'];
	$password=$_POST['password'];

$connection = mysqli_connect("localhost", "root", "", "bits-board");
// To protect MySQL injection for Security purpose
// $username = stripslashes($username);
// $password = stripslashes($password);
// $username = mysql_real_escape_string($username);
// $password = mysql_real_escape_string($password);

// SQL query to fetch information of registerd users and finds user match.

$result = mysqli_query($connection, "select * from login where password='$password' AND username='$username'");

$rows = mysqli_num_rows($result);

if ($rows == 1) {
$_SESSION['login_user']=$username; // Initializing Session(setting the session variable)
header("location: profile.php"); // Redirecting To Other Page
} 

else {
$error = "Username or Password is invalid";
}
mysqli_close($connection); // Closing Connection
}
}
?>