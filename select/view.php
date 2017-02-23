 <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link href="view.css" type="text/css" rel="stylesheet">
	<title></title>
  <style type="text/css">
    /******************************************查找栏*****************************************/
    #main .check{ background: orange; height: 120px;margin-top: -16px;}
    /***********************************************数据栏***********************************/
    #main form .table1{ margin: 10px auto; }
    #main form .table1 td{ padding: 10px; }
    #main .text{height: 600px;margin:40px -10px;width: 1115px;s}
    #main .table2{ width: 1050px; margin: 10px auto; }
    #main .table2 td{font-size: 14px;padding: 8px 0;margin: 30px 0;}
    #bottom{ margin: 80px 100px;}
    #bottom a{border:1px solid black;padding: 5px 10px;margin: 0 5px; text-decoration: none;}
    #bottom .current a{border:1px solid black; background:orange;color: #fff;}
    #bottom a:hover{font-size: 110%;}
    #bottom form{ display: inline;margin: 0 3px; }
    #text{ position: relative;  top: -40px;  left: 10px; }
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
              <li><a href="#">查看信息</a></li>
              <li><a href="add.php">添加信息</a></li>
              <li><a href="../view.php/view2.php">可视化分析</a></li>
          </ul>
        <ul class="ul2">
        <li><a href="view2.php">按条件查找</a></li>
        </ul>
      </div>
      <div class="check">
        <form method="get" action="select.php">
          <table class="table1">
            <tr>
              <td><input type="text" name="select" placeholder="搜索" style="width:200px;height:30px; background:transparent;border:1px solid #fff;"></td>
              <td><input type="submit" name="submit" value="查询" style="width:50px;height:30px;background:transparent;border:1px solid white;"></td>
            </tr>
          </table>
        </form>
      </div>
<div class="text">
		<?php
				include 'conn.php'; 
        session_start();
        if(isset($_SESSION["username"] )){
          echo "<span id='text'>欢迎登陆:".$_SESSION['username']."</span>";  
        }else{
          header("location:../login/index.php");
        }
          
        if(isset($_GET["p"]))
        {
          $page = $_GET["p"];  //取传过来的页面数
        }
        else
        {
          $page =1;
        }
        //$page =$_GET["p"];//$_GET["p"];//出入页面页码
				$sql = "select 
        GraduationYear,StudentNo,StudentName,TopicName,Score,TopicType,TopicStyle,Teacher,Major from
          graduationproject limit ".($page-1)*'10'." ,10";
				$query = mysql_query($sql);
				echo "<table class='table2' border='1' cellspacing='0'>";
		echo "<tr>";
   				echo '<td>'.'年份'.'</td>';
   				echo '<td>'.'学号'.'</td>';
    			echo '<td>'.'姓名'.'</td>';
          echo '<td>'.'课题名称'.'</td>';
          echo '<td>'.'成绩'.'</td>';
          echo '<td>'.'课题类型'.'</td>';
          echo '<td>'.'课题型号'.'</td>';
          echo '<td>'.'指导老师'.'</td>';
          echo '<td>'.'专业'.'</td>';
          echo '<td>'.'删除'.'</td>';
          echo '<td>'.'修改'.'</td>';
   	echo '</tr>';
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
  $showpage = 5;     //一次显示多少条页码
  $page_banner = '';
  $total_page = 117;   //总条数
  $showoff = 2;   //偏移量为两条页码,左右各两个
  if($page>1)
  {
    $page_banner .= "<a href='".$_SERVER['PHP_SELF']."?p=1'>首页</a>";
    $page_banner .= "<a href='".$_SERVER['PHP_SELF']."?p=".($page-1)."'>上一页</a>";
  }
  $start = 1;     //初始化数据
  $end = 117;
  if($total_page>$showpage)
  {     //保证总页数大于显示页数
      if($page>$showoff+1)       //当前页数大于偏移量
      {        
          $page_banner .="...";
      }
      if($page>$showoff)        //如果当前页面大于偏移量
      {
          $start = $page-$showoff;  //最开始的位置页数则为当前页数减去偏移量
          $end = $total_page>$page+$showoff?$page+$showoff:$total_page;
        //判断显示的最后一页是否超出要显示的5页，如果大于当前页数加上偏移量，则加上即可，否则就已经到了最后一页
      }
      else
      {
          $start = 1;
          $end = $total_page>$showpage?$showpage:$total_page;  //如果总页数小于要展示的页数，则最后一页就为总页数，而不是要显示的第五页
      }
      if($page+$showoff>$total_page)
      {
          $start = $start -($page+$showoff-$end); //如果页面到了最后，则起始位置会发生变化
      }
  }

      for($i=$start;$i<$end+1;$i++)
      {
        if($page==$i)
        {
         $page_banner .= "<span class='current'>"."<a href='".$_SERVER['PHP_SELF']."?p=".$i."'>$i</a>"."</span>";
        }
        else
        {
          $page_banner .= "<a href='".$_SERVER['PHP_SELF']."?p=".$i."'>$i</a>";
        }
      }

      if($total_page>$showpage&&$total_page>$page+$showoff)  
                                         //如果最后一页没有达到当前页数加上偏移量，则不必加 ...
      {
          $page_banner .="...";
      }
  if($page<117)
  {
          $page_banner.= "<a href='".$_SERVER['PHP_SELF']."?p=".($page+1)."'>下一页</a>";
          $page_banner.= "<a href='".$_SERVER['PHP_SELF']."?p=117'>尾页</a>";
  }
  
  $page_banner.="总共117页";
          $page_banner .="<form method='get' action='view.php'>";
          $page_banner .="到第<input type='text' name='p' style='padding:5px 0;' size='2'>页";
          $page_banner .="<input type='submit' value='查询' style='padding:5px 10px;'>";
          $page_banner .="</form>";
          echo "<div id='bottom'>".$page_banner."</div>";
?>
  </div>
  <div id="foot"></div>
	</div>
</body>
</html>