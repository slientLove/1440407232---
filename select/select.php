<!DOCTYPE html>
<html>
<head>
  <title></title>
  <style type="text/css">
      body{
        height: 700px;
      }
      h5{
        display: block;
        width: 400px;
        height: 20px;
        margin:0 auto;
        text-align: center;
      }
      h5 a{
        float: right;
        text-decoration: none;
      }
      #text{
        width: 700px;
        height: 300px;
        margin: 10px auto;
      }
      #text table td{
        height: 5px;
        padding: -10px;
        font-size: 12px;
      }
      span{
        display: block;
        width: 200px;
        margin: 100px auto;
      }
      span a{
        margin: 0 auto;
      }
  </style>
</head>
<body>
<h5>信息查询<a href="view.php">返回</a></h5>
<meta charset="utf-8">
<?php
include 'conn.php';
include 'graduation.php';
//$page = $_GET["p"];       //接受页面传过来的页码
 if(isset($_GET["p"]))
        {
          $page = $_GET["p"];  //取传过来的页面数
        }
        else
        {
          $page =1;
        }
$page_load = ($page-1)*'10';
$user = new graduation();
$select = $_GET["select"];
$sql = "select GraduationYear,StudentNo,StudentName,TopicName,Score,TopicType,TopicStyle,Teacher,Major from
          graduationproject where GraduationYear like '%$select%' or StudentNo ='$select' or StudentName like '%$select%' or TopicName like '%$select%' or Score  like '%$select%' or TopicType like '%$select%' or TopicStyle like '%$select%' or Teacher like '%$select%' or Major like '%$select%' limit $page_load,10";
        $query = mysql_query($sql)or die('查询失败!'.mysql_errno());
        $row = mysql_fetch_array($query);
        echo "<div id='text'>";
           echo "<table border='1' cellspacing='0'>";
          echo "<tr>";
          echo '<th>'.'年份'.'</th>';
          echo '<th>'.'学号'.'</th>';
          echo '<th>'.'姓名'.'</th>';
          echo '<th>'.'课题名称'.'</th>';
          echo '<th>'.'成绩'.'</th>';
          echo '<th>'.'课题类型'.'</th>';
          echo '<th>'.'课题型号'.'</th>';
          echo '<th>'.'指导老师'.'</th>';
          echo '<th>'.'专业'.'</th>';
      echo '</tr>';
      echo '<tr>';
      while($row = mysql_fetch_row($query)){ 
          for($i=1;$i<mysql_num_fields($query);$i++){   
          echo '<td>';
          echo $row[$i];                    
          echo '</td>';
      }
          echo '</tr>';
      }
      echo "</table>";
      echo "</div>";
      ?>
    <span>
      <a href="?p=1&select=<?php echo $select;?>">首页</a>
      <a href="?p=<?php echo $page-1;?>&select=<?php echo $select;?>">上一页</a>
      <a href="?p=<?php echo $page+1;?>&select=<?php echo $select;?>">下一页</a>
    </span>
</body>
</html>