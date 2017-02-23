<?php

include 'conn.php';

$sql = "SELECT count(*) as rs,teacher,GraduationYear from graduationproject GROUP BY Teacher,GraduationYear";
$result = mysql_query($sql) or die('错误'.mysql_errno());
$arr = array();
while($row = mysql_fetch_array($result)){
	$arr[] = $row;
}
$strJson = json_encode($arr);//,JSON_NUMERIC_CHECK
//json_encode编码，参数类型一般是class，或者array，用于生成json格式的字符串
//JSON_NUMERIC_CHECK，一般是将纯数字转换成数字输出
mysql_free_result($result);
mysql_close();



?>