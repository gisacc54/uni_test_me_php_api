<?php
$conn = mysqli_connect('localhost','root','','test_me');

//if_fail to connect
if (!$conn){
    die("Not Connected");
}