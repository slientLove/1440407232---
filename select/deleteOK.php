<meta charset="utf-8">
<?php
include 'graduation.php';
$student = new graduation();   //类的实列化

$id = $_POST["stuID"];
echo $id;

$student->delete($id);
?>