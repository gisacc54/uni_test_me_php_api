<?php
include_once 'db/db_connection.php';
include_once 'app/User.php';
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

$user = new User();
$response = $user->createUser($name,$email,$password,$conn);

echo $response;
