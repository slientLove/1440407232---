<?php
$coon = mysql_connect("localhost", "root","root") or die("失败！");
mysql_query("set names 'utf8'");
mysql_select_db("test");
$year = $_POST["year"];
$sql3 = sprintf("select Score,count(*) as count from graduationproject where GraduationYear = %d and Score<>'缓答辩'group by Score ORDER BY COUNT ", $year);
$result3 = mysql_query($sql3)or die("失败！".mysql_errno());
$arr3 = array();
while ($row3 = mysql_fetch_array($result3))
{
    $testCl = new TestClass();
    $testCl -> Score = $row3["Score"];
    $testCl -> count = $row3["count"];
    $arr3[] = $testCl;
}
class TestClass
{
    public $Score;
    public $count;
}
$strJson3 =json_encode($arr3,JSON_NUMERIC_CHECK);
echo $strJson3;
?>