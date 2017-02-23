<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<script type="text/javascript" src="js/index.js"></script>
	<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
</head>
	<body>	
			<span style="position:relative;top:10px;left:20px;">2008年至2016年各专业毕业生总人数占比情况</span>
		<?php
			include 'view6OK.php';
		?>
		<div id="g6"></div>
	<script type="text/javascript">
		var Stat = G2.Stat;
      var chart = new G2.Chart({
        id: 'g6',
        width: 800,
        height: 300
      });
      var data = <?php echo $strJson;?>;
      chart.source(data);
      // 重要：绘制饼图时，必须声明 theta 坐标系
      chart.coord('theta', {
        radius: 0.6 // 设置饼图的大小
      });
      chart.legend('bottom');
      chart.intervalStack()
        .position(Stat.summary.percent('rs')).color('Major')
        .label('Major*..percent',function(name, percent){
        percent = (percent * 100).toFixed(2) + '%';
        return name + ' ' + percent;
      });
      chart.render();
      // 设置默认选中
      var geom = chart.getGeoms()[0]; // 获取所有的图形
      var items = geom.getData(); // 获取图形对应的数据
      geom.setSelected(items[2]); 
	</script>
</body>
</html>