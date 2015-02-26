<?php
require 'Slim/Slim.php';
// require 'RedBean/rb.php';
\Slim\Slim::registerAutoloader();
session_cache_limiter(false);
session_start();
$connection = mysqli_connect("localhost", "root", "", "instaconsult");

$app = new \Slim\Slim();                    // pass an associative array to this if you want to configure the settings

$app->post('/login', function () use ($app,$connection) {

$body = $app->request->getBody();
$result=  json_decode($body);
$username=$result->username;
$password=$result->password;

$result = mysqli_query($connection, "select * from login_client where password='$password' AND username='$username'");

$rows = mysqli_num_rows($result);

if ($rows == 1) {
  $_SESSION['login_client']=$username; // after the user logs the session variable is assigned.
  $app->redirect('profile');
}

else {
  echo json_encode("Username or Password is invalid");
}
mysqli_close($connection);


  $app->response()->header('Content-Type', 'application/json');
});

$app->get('/profile',function () use ($app,$connection) {
  include('session.php');
  $body = $app->request->getBody();
  $result=  json_decode($body);


  $result = mysqli_query($connection, "select * from client_data where username='$login_session_user'");
echo json_encode(mysqli_fetch_array($result));




  $app->response()->header('Content-Type', 'application/json');
});



$app->run();
?>
