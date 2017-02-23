<?php
include 'connect.php';
$user = new user();
class user
{
	public $username;
	public $password;
	public function checkUser($user,$password)
	{	
		$user =Trim($user);
		$password=Trim($password);
		$sql = "select * from users where userName='$user' and passWord='$password'";
		$query = mysql_query($sql)or die('查询出错'.mysql_error());
		$row = mysql_fetch_array($query);		
		if($row)
			{
 				echo '欢迎登陆!';
 				session_start();
 				$_SESSION["username"] = $user;
 				header('location:../select/view.php');
 				//$_SESSION["username"] = $user;
    		}
    		else
    		{
    			echo "<script>alert('用户名或密码错误');window.history.back(-1);</script>"; //返回上级页面
    			exit();
    			//header('location:index.php');
    		}
    		mysql_free_result($query);
			mysql_close();
		
	}
	public function check($users)
	{	
		$sql = "select * from users where userName='$users'";    //赋值时，字符串一定要加引号
		$query = mysql_query($sql)or die('失败1！'.mysql_errno());
		$row = mysql_num_rows($query);
		return $row;
	}
	public function insert($username,$password)
	{	$user =Trim($username);
		$password=Trim($password);
		$sql = "insert into users(userName,passWord) values('$username','$password')";
		$query = mysql_query($sql)or die('失败！'.mysql_errno());
		echo "<script>alert('注册成功！');window.location.href='index.php'</script>";
		//header('location:login.php');
	}
}
?>