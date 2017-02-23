<meta charset="utf-8">
<?php
include 'graduation.php';
	$student = new graduation();
	$year =	$_POST["year"];
	$id = $_POST["stuID"];
	$stuName = $_POST["stuName"];
	$topName = $_POST["topName"];
	$source = $_POST["source"];
	$toctype = $_POST["toctype"];
	$tocstyle = $_POST["tocstyle"];
	$teacher = 	$_POST["teacher"];
	$major = $_POST["major"];
	// if(empty($id)||empty($stuName)){
	// 	echo "<script>alert('都不能为空！');window.location.href='add.php'</script>";
	// }
 $student->add($year,$id,$stuName,$topName,$source,$toctype,$tocstyle,$teacher,$major);

?>