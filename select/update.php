<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link href="view.css" type="text/css" rel="stylesheet">
	<style type="text/css">

		#main table {
			width: 400px;
			height: 500px;
			margin:20px auto;
			font-size: 10px;
		}
		#main table td{margin:10px 0;}
		#main input{
			width: 150px;
			font-size: 10px;
		}
		#main #foot1{height: 96px;background: url("bottom1.png") no-repeat;margin-top: 225px;}
	</style>
	<title></title>
</head>
<body>
	<div id="header">
		<img src="beijing4.png">
	</div>
	<div id="nav"></div>
	<div id="main">
	 <div id="img">
          <ul class="ul1">
              <li><a href="view.php">查看信息</a></li>
              <li><a href="add.php">添加信息</a></li>
              <li><a href="../view.php/view2.php">可视化分析</a></li>
          </ul>
        <ul class="ul2">
        <li><a href="view2.php">按条件查找</a></li>
        </ul>
      </div>
			<?php
			include 'conn.php';
			$id = $_GET["id"];
			$sql = "select GraduationYear,StudentNo,StudentName,TopicName,Score,TopicType,TopicStyle,Teacher,Major
 from graduationproject where StudentNo=$id";
			$query = mysql_query($sql)or die('失败'.mysql_errno());
			$row = mysql_fetch_array($query);
			?>
		<form method='post' action='updateOK.php' style="text-align:center">
			<table>
				<tr>
					<td>年份：</td>
					<td><input type='text' name='year' value=<?php echo $row[1];?>></td>
					<td></td>		
				</tr>
				<tr>
					<td>学号：</td>
					<td><input type='text'  readonly="readonly" name='stuID' value=<?php echo $row[2];?>></td>
					<td>*不可编辑</td>
				</tr>
				<tr>
					<td>姓名：</td>
					<td><input type='text'  readonly="readonly" name='stuName' value=<?php echo $row[3];?>></td>
					<td>*不可编辑</td>
				</tr>
				<tr>
					<td>课题：</td>
					<td><input type='text' name='topName' value=<?php echo $row[4];?>></td>
					<td></td>
				</tr>
				<tr>
					<td>成绩：</td>
					<td><input type='text' name='source' value=<?php echo $row[5];?>></td>
					<td></td>
				</tr>
				<tr>
					<td>课题类：</td>
					<td><input type='text' name='toctype' value=<?php echo $row[6];?>></td>
					<td></td>
				</tr>
				<tr>
					<td class="text">课题型：</td>
					<td><input type='text' name='tocstyle' value=<?php echo $row[7];?>></td>
					<td></td>
				</tr>
				<tr>
					<td>指导教师：</td>
					<td><input type='text'  readonly="readonly" name='teacher' value=<?php echo $row[8];?>></td>
					<td>*不可编辑</td>
				</tr>
				<tr>
					<td>专业：</td>
					<td><input type'text' name='major' value=<?php echo $row[9];?>></td>
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td><input type='submit' name='submit' value='提交'></td>
					<td></td>
				</tr>
		</table>
			</form>
	 <div id="foot1"></div>
	</div>
</body>
</html>