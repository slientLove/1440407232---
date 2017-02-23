<?php
 include 'connect.php';
 include 'f.php';
 if(isset($_POST["register"])){

 	header('location:register.php');
 	exit();
 }

$user = new user();			//类的时实列化

$users = $_POST["username"];
$password = $_POST["password"];

$user->checkUser($users,$password);  //查询方法
?>

