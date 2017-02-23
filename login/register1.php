<?php
include 'f.php';

$user = new user();			//类的时实列化

$users = $_POST["username"];
$password = $_POST["password"];

if($user->check($users)>0){      #判断用户名是否存在
	echo "<script>alert('该用户名已经被使用！');window.history.back(-1);</script>";
	//header('location:register.php');
} 
else{
		$user->insert($users,$password);
	}









?>