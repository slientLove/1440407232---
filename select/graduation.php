<meta charset="utf-8">
<?php
include 'conn.php';
$user =new graduation();
class graduation
{
	public $GraduationYear;
	public $studentNo;
	public $studentName;
	public $topicName;
	public $score;
	public $topictype;
	public $topicstyle; 
	public $teacher;
	public $major; 
	public function update($year,$id,$name,$topname,$source,$toctype,$tocstyle,$teacher,$major)
	{
		$sql = "update  graduationproject set GraduationYear='$year',StudentName='$name',TopicName='$topname',Score='$source',TopicType='$toctype',TopicStyle='$tocstyle',Teacher='$teacher',Major='$major' where StudentNo='$id'";
		$query = mysql_query($sql)or die('失败'.mysql_errno());
		echo "<script>alert('修改成功！');window.location.href='view.php'</script>";
	}
	public function delete($id)
	{
		$sql = "delete from graduationproject where StudentNo='$id'";
		$query = mysql_query($sql) or die('删除失败!'.mysql_errno());
		echo "<script>alert('删除成功！');window.location.href='view.php'</script>";
	}
	public function add($year,$id,$name,$topname,$source,$toctype,$tocstyle,$teacher,$major)
	{
		$sql = "insert into graduationproject values('$year','$id','$name','$topname','$source','$toctype','$tocstyle','$teacher','$major')";
		$query = mysql_query($sql)or die('失败'.mysql_errno());
		//header('location:view.php');
		echo "<script>alert('添加成功！');window.location.href='view.php'</script>";
	}
	public function select($select){
		$sql = "select * from  graduationproject where GraduationYear ='$select' or StudentNo='$select' or StudentName='$select' or TopicName='$select' or Score ='$select' or TopicType='$select' or TopicStyle ='$select' or Teacher = '$select' or Major or '$select'";
      	$query = mysql_query($sql)or die('查询失败!'.mysql_errno());
      	$row = mysql_fetch_array($query);
      	return $row;
	}
}
?>

