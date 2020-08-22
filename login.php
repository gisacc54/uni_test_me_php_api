<?php
include_once 'db/db_connection.php';
include_once 'app/User.php';
$email = $_POST['email'];
$password = $_POST['password'];

$user = new User();
$user->login($email,$password,$conn);