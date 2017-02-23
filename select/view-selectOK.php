<?php
include 'conn.php';
include 'graduation.php';
$user = new graduation();
$select = $_GET["select"];
$sql = "select * from graduationproject where StudentNO='$select' or StudentName='$select' or TopicName='$select';
 $query = mysql_query($sql)or die('查询失败!'.mysql_errno());
 $row = mysql_fetch_array($query);

?>
