<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link href="view.css" type="text/css" rel="stylesheet">
	<title></title>
	<style type="text/css">
		#main table{width: 400px;height: 400px;margin: 10px auto;position: relative;}
		#main table td{text-align: right;width: 150px;}
		#main table select{width: 155px;float: left;}
		#main table td input{float: left;width: 150px;}
		#main .foot1{height:96px;width:1115px;position:absolute;top: 903px;left:230px; }
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
			<form method='post' action='addOK.php' style="text-align:center">
					<table>
						<tr>
							<td>年份:</td>
							<td>
								<select name="year">
									<option>2008</option>
									<option>2009</option>
									<option>2010</option>
									<option>2011</option>
									<option>2012</option>
									<option>2013</option>
									<option>2014</option>
									<option>2015</option>
									<option>2016</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>学号:</td>
							<td><input type='text' name='stuID'></td>
						</tr>
						<tr>
							<td>姓名:</td>
							<td><input type='text' name='stuName'></td>
						</tr>
						<tr>
							<td>课题:</td>
							<td><input type='text' name='topName'></td>
						</tr>
						<tr>
							<td>成绩:</td>
							<td><select name="source">
									<option>A</option>
									<option>B</option>
									<option>C</option>
									<option>D</option>
									<option>E</option>
									<option>F</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>课题类:</td>
							<td>
								<select name="toctype">
									<option>A</option>
									<option>B</option>
									<option>C</option>
									<option>D</option>
									<option>E</option>
									<option>F</option>
								</select>
							</td>
						</tr>
						<tr>
							<td> 课题型:</td>
							<td><select name="tocstyle">
									<option>A</option>
									<option>B</option>
									<option>C</option>
									<option>D</option>
									<option>E</option>
									<option>F</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>指导教师:</td>
							<td><input type='text' name='teacher' ></td>
						</tr>
						<tr>
							<td>专业:</td>
							<td>
								<select name="major">
									<option>信息管理与信息系统</option>
									<option>电子商务</option>
									<option>信息管理与信息系统(电子商务)</option>
									<option>信息管理与信息系统(网络营销)</option>
								</select>
							</td>
						</tr>
						<tr>
							<td></td>
							<td><input type='submit' name='submit' style='margin: 0px 5px;' value='提交'></td>
						</tr>
					</table>
			</form>
		<div class="foot1"><img src="bottom1.png"></div>
	</div>
	<script type="text/javascript" src="form.js/yanzheng.js"></script>
</body>
</html>