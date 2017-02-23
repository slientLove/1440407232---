<?php
include 'conn.php';
$sql = "SELECT count(*) as rs, Major from graduationproject GROUP BY Major ORDER BY rs";

$result = mysql_query($sql);

$arr = array();
while($row = mysql_fetch_array($result,MYSQL_ASSOC)){
	$arr[] = $row;
}

$strJson = json_encode($arr,JSON_NUMERIC_CHECK);

mysql_free_result($result);

mysql_close();
?>