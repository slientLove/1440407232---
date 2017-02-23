<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link href="view.css" type="text/css" rel="stylesheet">
	<title></title>
	<style type="text/css">
		#main table{
			width: 400px;
			margin: 30px auto;
			text-align: center;
		}
		#main table td{
			padding: 8px;
			margin: 10px auto;
		}
		#main input{
			float: left;
			width: 150px;
		}
	</style>
</head>
<body>
	<div id="header">
		<img src="beijing4.png">
	</div>
	<div id="nav">
	</div>
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
			<form method='post' action='deleteOK.php' style="text-align:center">
						<table>
				<tr>
					<td>年份：</td>
					<td><input type='text' name='year'  readonly="readonly" value=<?php echo $row[1];?>></td>		
				</tr>
				<tr>
					<td>学号：</td>
					<td><input type='text' name='stuID'  readonly="readonly" value=<?php echo $row[2];?>></td>
				</tr>
				<tr>
					<td>姓名：</td>
					<td><input type='text' name='stuName'  readonly="readonly" value=<?php echo $row[3];?>></td>
				</tr>
				<tr>
					<td>课题：</td>
					<td><input type='text' name='topName'  readonly="readonly" value=<?php echo $row[4];?>></td>
				</tr>
				<tr>
					<td>成绩：</td>
					<td><input type='text' name='source'  readonly="readonly" value=<?php echo $row[5];?>></td>
				</tr>
				<tr>
					<td>课题类：</td>
					<td><input type='text' name='toctype'  readonly="readonly" value=<?php echo $row[6];?>></td>
				</tr>
				<tr>
					<td class="text">课题型：</td>
					<td><input type='text' name='tocstyle'  readonly="readonly" value=<?php echo $row[7];?>></td>
				</tr>
				<tr>
					<td>指导教师：</td>
					<td><input type='text' name='teacher'  readonly="readonly" value=<?php echo $row[8];?>></td>
				</tr>
				<tr>
					<td>专业：</td>
					<td><input type'text' name='major'  readonly="readonly" value=<?php echo $row[9];?>></td>
				</tr>
				<tr>
					<td></td>
					<td><input type='submit' name='submit' value='确定删除！'></td>
				</tr>
		</table>
			</form>

	</div>
</body>
</html>