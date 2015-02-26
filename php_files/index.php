
<?php
include('login.php'); // Includes Login Script

if(isset($_SESSION['login_user'])){
header("location: profile.php");
}
?>
<!DOCTYPE html>
<html>

<head>

<title>Department/Club/Assoc Login</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="main">
<h1>Departments, Clubs, Assocs login here</h1>
<div id="login">
	<h2>Login Form</h2>
	
	<form action="" method="post">
	
	<label>UserName :</label>
	<input id="name" name="username" placeholder="Username" type="text">
	
	<label>Password :</label>
	<input id="password" name="password" placeholder="Password" type="password">
	
	<input name="submit" type="submit" value=" Login ">
	
<span><?php echo $error; ?></span>
</form>
</div>
</div>
</body>
</html>