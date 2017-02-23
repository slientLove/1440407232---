 <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link href="view.css" type="text/css" rel="stylesheet">
	<title></title>
  <style type="text/css">
    /******************************************查找栏*****************************************/
    #main{position: relative;}
    #main .check{ background: orange; height: 120px;position: relative;top: -9px;left: 0;}
    #main .check ul{ border:1px solid white;display:block;width: 100px;height:20px;list-style-type: none;position: relative;top: 10px;left: 60px;}
    #main .check ul>li{ width:100px;height:60px;text-align: center;}
    #main .check ul>li>ul{ display: block;width: 100px;height: 65px;list-style-type: none; position: absolute;top: 20px;left: -1px;display: none;}
    #main .check ul>li>ul>li{ width: 100px; height: 20px;border:background:#ccc;font-size: 10px;}
    #main ul>li:hover ul{display:block;} 

    #main ul li>ul>li a{text-decoration:none;display:inline-block;width:80px;height:15px;padding:3px 0;}
    #main ul li>ul li a:hover{ background:green;border:1px solid #ccc;color:#ccc;}
    /*******************************************数据栏****************************************/
    #main form .table1{ margin: 10px auto; }
    #main form .table1 td{ padding: 10px; }
    #main .table2{ width: 700px; margin: 10px auto; }
    #main .table2 td{font-size: 9px;}
    #text{ position: relative;  top: -40px;  left: 10px; }
    #main .table3{margin: 30px auto;}
    #main .foot{ height: 96px;width: auto;position:absolute;top: 800px;left: 0px; }
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
      <div class="check">
        <form method="get" action="view2.php">
          <table class="table1">
            <tr>
              <td><input type="text" name="select" placeholder="搜索" style="width:200px;height:30px; background:transparent;border:1px solid #fff;"></td>
              <td><input type="submit" name="submit" value="查询" style="width:50px;height:30px;background:transparent;border:1px solid white;"></td>
            </tr>
          </table>
        </form>
      </div>    
    <?php 
      include 'conn.php';
      include 'graduation.php';
      $user = new graduation();
      if(isset($_GET["select"])){
         $select = $_GET["select"];
      }else{
      $select='0440407115';
      }
     
       $sql = "select GraduationYear,StudentNo,StudentName,TopicName,Score,TopicType,TopicStyle,Teacher,Major from
          graduationproject where StudentNO like'%$select%' or StudentName like '%$select%' or TopicName like '%$select%' limit 10"; 
       $query = mysql_query($sql)or die('查询失败!'.mysql_errno());
       echo "<table border='1' cellspacing='0' class='table3'>";
      while($row = mysql_fetch_array($query))
{
  echo "<tr>";
  for($i = 1;$i<mysql_num_fields($query);$i++)
  { 
    echo '<td>'.$row[$i].'</td>';
  }
  echo "<td>"."<a href='delete.php?id=$row[2]'>删除</a>"."</td>"."<td>"."<a href='update.php?id=$row[2]'>修改</a>"."</td>";
  echo "</tr>";
}
echo "</table>";

mysql_free_result($query);
mysql_close();
?>
  <div class="foot"><img src="bottom1.png"></div>
	</div>
</body>
</html>